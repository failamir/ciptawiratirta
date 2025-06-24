<?php
namespace Modules\Company\Models;

use App\BaseModel;
use App\Traits\HasReview;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Modules\Core\Models\SEO;
use Modules\Company\Models\CompanyCategory as Category;
use Modules\Core\Models\Terms;
use Modules\Job\Models\Job;
use Modules\Job\Models\JobCandidate;
use Modules\Location\Models\Location;
use Modules\Core\Models\Attributes;
use Modules\Company\Models\CompanyTerm;
use Modules\Media\Helpers\FileHelper;
use Modules\Order\Models\OrderItem;
use Modules\Review\Models\Review;

class Company extends BaseModel
{
    use HasReview;
    use SoftDeletes;
    protected $table = 'bc_companies';
    protected $fillable = [
        'name',
        'email',
        'phone',
        'website',
        'avatar_id',
        'cover_id',
        'founded_in',
        'allow_search',
        'owner_id',
        'category_id',
        'about',
        'social_media',
        'city',
        'state',
        'country',
        'zip_code',
        'address',
        'slug',
        'status',
        'location_id',
        'map_lat',
        'map_lng',
        'is_featured'
    ];
    protected $slugField     = 'slug';
    protected $slugFromField = 'name';
    protected $seo_type = 'companies';
    public $type = 'company';
    protected $casts = [
        'social_media' => 'array'
    ];

    protected $reviewClass;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->reviewClass = Review::class;
    }

    public function getDetailUrlAttribute()
    {
        return url('companies-' . $this->slug);
    }
    public function getDetailUrl($locale = false)
    {
        return url(app_get_locale(false,false,'/'). config('company.companies_route_prefix')."/".$this->slug);
    }
    public function companyTerm()
    {
        return $this->hasMany(CompanyTerm::class, "company_id");
    }
    public function terms()
    {
        return $this->belongsToMany(Terms::class, "bc_company_term",'company_id','term_id');
    }
    public function category()
    {
        return $this->belongsTo(CompanyCategory::class,  "category_id");
    }
    public function jobsPublish()
    {
        return $this->hasMany(Job::class,'company_id')->where('bc_jobs.status', 'publish');
    }
    public function jobs()
    {
        return $this->hasMany(Job::class,'company_id');
    }
    public function getAuthor()
    {
        return $this->belongsTo("App\User", "owner_id" )->withDefault();
    }
    public function location(){
        return $this->belongsTo(Location::class,'location_id');
    }

    public static function search(Request $request)
    {
        $model_companies = parent::query()->select("bc_companies.*")
            ->where("bc_companies.status", "publish")
            ->where('allow_search',1);
        if (!empty($search = $request->query("s"))) {
            if( setting_item('site_enable_multi_lang') && setting_item('site_locale') != app()->getLocale() ){
                $model_companies->leftJoin('bc_company_translations', function ($join) use ($search) {
                    $join->on('bc_companies.id', '=', 'bc_company_translations.origin_id');
                });
                $model_companies->where(function($query) use ($search) {
                    $query->where('bc_company_translations.name', 'LIKE', '%' . $search . '%');
                    $query->orWhere('bc_company_translations.about', 'LIKE', '%' . $search . '%');
                });
            }else{
                $model_companies->where(function($query) use ($search) {
                    $query->where('bc_companies.name', 'LIKE', '%' . $search . '%');
                    $query->orWhere('bc_companies.about', 'LIKE', '%' . $search . '%');
                });
            }

            $title_page = __('Search results : ":s"', ["s" => $search]);
        }
        if(!empty($category_id = $request->query("category")))
        {
            $category = Category::query()->where('id', $category_id)->where("status","publish")->first();
            if(!empty($category)){
                $model_companies->join('bc_company_categories', function ($join) use ($category) {
                    $join->on('bc_company_categories.id', '=', 'bc_companies.category_id')
                        ->where('bc_company_categories._lft', '>=', $category->_lft)
                        ->where('bc_company_categories._rgt', '<=', $category->_rgt);
                });
            }
        }
        if(!empty($location_id = $request->query("location")))
        {
            $location = Location::query()->where('id', $location_id)->where("status","publish")->first();
            if(!empty($location)){
                $model_companies->join('bc_locations', function ($join) use ($location) {
                    $join->on('bc_locations.id', '=', 'bc_companies.location_id')
                        ->where('bc_locations._lft', '>=', $location->_lft)
                        ->where('bc_locations._rgt', '<=', $location->_rgt);
                });
            }
        }

        if (!empty($zipcode = $request->query('zipcode'))) {
            $model_companies->join('bc_locations', function ($join) use ($zipcode){
                $join->on('bc_locations.id', '=', 'bc_companies.location_id')
                    ->where('bc_locations.zipcode', $zipcode);
            }) ;
        }

        if(!empty($from_date = $request->query("from_date")) && !empty($to_date = $request->query("to_date")))
        {
            $day_last_month = date("t", strtotime($to_date . "-12-01"));

            $model_companies->whereBetween('founded_in',[$from_date.'-01-01',$to_date.'-12-'.$day_last_month]);
        }
        $terms = $request->query('terms');
        if(is_array($terms))
        {
            $terms = array_filter($terms);
        }
        if (is_array($terms) && !empty($terms)) {
            $model_companies->join('bc_company_term as ct', 'ct.company_id', "bc_companies.id")->whereIn('ct.term_id', $terms);
        }
        $orderby = $request->query("orderby",'newest');
        switch ($orderby) {
            case "random":
                $model_companies->inRandomOrder();
                break;
            case "oldest":
                $model_companies->orderBy('bc_companies.id','ASC');
                break;
            case "newest":
                $model_companies->orderBy('bc_companies.id','DESC');
                break;
        }
        $model_companies->withCount(['jobs' => function (Builder $query) {
            $query->where('status', 'publish');
        }]);

        if(!empty(setting_item_array('company_loop_attrs'))){
            $model_companies->with(['terms']);
        }
        return $model_companies->with(["category","location",'wishlist'])->groupBy("bc_companies.id");
    }

    public function getEditUrl()
    {
        $lang = $this->lang ?? setting_item("site_locale");
        return route('company.admin.edit',['id'=>$this->id , "lang"=> $lang]);
    }

    static public function getSeoMetaForPageList()
    {
        $meta['seo_title'] = setting_item_with_lang("company_page_list_seo_title", false, setting_item_with_lang("company_page_search_title", false, __("Companies")));
        $meta['seo_desc'] = setting_item_with_lang("company_page_list_seo_desc");
        $meta['seo_image'] = setting_item("company_page_list_seo_image", false);
        $meta['seo_share'] = setting_item_with_lang("company_page_list_seo_share");
        $meta['full_url'] = url(config('company.companies_route_prefix'));
        return $meta;
    }

    public function getLogoUrl(){
        if(!empty($this->avatar_id)){
            return FileHelper::url($this->avatar_id);
        }
        return false;
    }

    public function check_owner_service(){
        //Cannot review your service
        if($this->owner_id == Auth::id()){
            return false;
        }
        return true;
    }

    public function count_remain_review()
    {
        return 1;
    }

    public function getGallery()
    {
        if (empty($this->gallery))
            return $this->gallery;
        $list_item = [];
        $items = explode(",", $this->gallery);
        foreach ($items as $k => $item) {
            if(!$item) continue;
            $large = FileHelper::url($item, 'full');
            $thumb = FileHelper::url($item, 'thumb');
            $list_item[] = [
                'large' => $large,
                'thumb' => $thumb
            ];
        }
        return $list_item;
    }

    public function getAttrsInLoop(){
        $attrs = setting_item_array('company_loop_attrs',[]);
        if(empty($attrs)) return [];

        $res = [];

        foreach ($attrs as $id){
            $res[] = [
                'terms'=>$this->terms->where('attr_id',$id)->all()
            ];
        }
        return $res;

    }
}
