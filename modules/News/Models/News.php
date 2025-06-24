<?php
namespace Modules\News\Models;

use App\BaseModel;
use App\Traits\HasReview;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Review\Models\Review;

class News extends BaseModel
{
    use SoftDeletes;
    use HasReview;
    protected $table = 'core_news';
    protected $fillable = [
        'title',
        'content',
        'status',
        'cat_id',
        'image_id',
        'banner_id'
    ];
    protected $slugField     = 'slug';
    protected $slugFromField = 'title';
    protected $seo_type = 'news';

    public function getDetailUrlAttribute()
    {
        return url('news-' . $this->slug);
    }

    public function geCategorylink()
    {
        return route('news.category.index',['slug'=>$this->slug]);
    }

    public function cat()
    {
        return $this->belongsTo('Modules\News\Models\NewsCategory');
    }

    public static function getAll()
    {
        return self::with('cat')->get();
    }

    public function getDetailUrl($locale = false)
    {
        return url(app_get_locale(false,false,'/'). config('news.news_route_prefix')."/".$this->slug);
    }

    public function getCategory()
    {
        $catename = $this->belongsTo("Modules\News\Models\NewsCategory", "cat_id", "id");
        return $catename;
    }

    public function getTags()
    {
        $tags = NewsTag::where('news_id', $this->id)->get();
        $tag_ids = [];
        if (!empty($tags)) {
            foreach ($tags as $key => $value) {
                $tag_ids[] = $value->tag_id;
            }
        }
        return Tag::whereIn('id', $tag_ids)->with('translations')->get();
    }

    public static function searchForMenu($q = false)
    {
        $query = static::select('id', 'title as name');
        if (strlen($q)) {

            $query->where('title', 'like', "%" . $q . "%");
        }
        $a = $query->limit(30)->get();
        return $a;
    }

    public function saveTag($tags_name, $tag_ids)
    {

        if (empty($tag_ids))
            $tag_ids = [];
        $tag_ids = array_merge(Tag::saveTagByName($tags_name), $tag_ids);
        $tag_ids = array_filter(array_unique($tag_ids));
        // Delete unused
        NewsTag::whereNotIn('tag_id', $tag_ids)->where('news_id', $this->id)->delete();
        //Add
        NewsTag::addTag($tag_ids, $this->id);
    }

    static public function getSeoMetaForPageList()
    {
        $meta['seo_title'] = setting_item_with_lang("news_page_list_seo_title", false,null) ?? setting_item_with_lang("news_page_list_title",false, null) ?? __("News");
        $meta['seo_desc'] = setting_item_with_lang("news_page_list_seo_desc");
        $meta['seo_image'] = setting_item("news_page_list_seo_image", null) ?? setting_item("news_page_list_banner", null);
        $meta['seo_share'] = setting_item_with_lang("news_page_list_seo_share");
        $meta['full_url'] = url(config('news.news_route_prefix'));
        return $meta;
    }

    public function getEditUrl()
    {
        $lang = $this->lang ?? setting_item("site_locale");
        return route('news.admin.edit',['id'=>$this->id , "lang"=> $lang]);
    }

    public function dataForApi($forSingle = false){
        $translation = $this->translateOrOrigin(app()->getLocale());
        $data = [
            'id'=>$this->id,
            'slug'=>$this->slug,
            'title'=>$translation->title,
            'content'=>$translation->content,
            'image_id'=>$this->image_id,
            'image_url'=>get_file_url($this->image_id,'full'),
            'category'=>NewsCategory::selectRaw("id,name,slug")->find($this->cat_id) ?? null,
            'created_at'=>display_date($this->created_at),
            'author'=>[
                'display_name'=>$this->getAuthor->getDisplayName(),
                'avatar_url'=>$this->getAuthor->getAvatarUrl()
            ],
            'url'=>$this->getDetailUrl()
        ];
        return $data;
    }

    public function near_post(){
        $near_post = [$this->id - 1, $this->id + 1];
        return $this->query()->whereIn('id', $near_post)->get();
    }

    public function relatedPosts($limit){
        if(!empty($this->cat_id)){
            return $this->query()
                ->whereNot('id', $this->id)
                ->where('cat_id', $this->cat_id)
                ->limit($limit)
                ->get();
        }
        return false;
    }

    public static function search($filters = []){
        $query = parent::query();
        if(!empty($filters['category_id'])){
            $query->where('category_id',$filters['category_id']);
        }
        return $query->where('status','publish');
    }

    public function check_owner_service(){
        return true;
    }

    public function getReviewEnable()
    {
        return 1;
    }

    public function count_remain_review(){
        return true;
    }

    public function getReviewStats() : array
    {
        return [];
    }

    public function update_service_rate(){
        return true;
    }

    public static function getModelName()
    {
        return __("News");
    }

    public function reviewsCount($with_text = false){
        $count = Review::query()->where('object_id', $this->id)
            ->where('object_model', 'news')
            ->where("status", "approved")
            ->orderBy("id", "desc")->count();
        if($with_text){
            return $count .' ' . ($count == 1 ? __("review") : __("reviews"));
        }else{
            return $count;
        }
    }
}
