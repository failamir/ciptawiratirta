<?php
namespace Modules\Company\Controllers;

use App\Helpers\ReCaptchaEngine;
use App\Notifications\PrivateChannelServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Matrix\Exception;
use Modules\Candidate\Emails\NotificationCandidateContact;
use Modules\Candidate\Models\CandidateContact;
use Modules\Company\Models\CompanyTranslation;
use Modules\FrontendController;
use Modules\Language\Models\Language;
use Modules\Company\Models\Company;
use Modules\Company\Models\CompanyCategory as Category;
use Illuminate\Database\Eloquent\Builder;
use Modules\Location\Models\Location;
use Modules\Job\Models\Job;
use Modules\Core\Models\Attributes;
use Modules\User\Models\User;
use Modules\User\Models\UserViews;

class CompanyController extends FrontendController
{
    protected $category;
    protected $language;
    protected $job;
    protected $attributes;
    protected $location;
    /**
     * @var Company
     */
    private $company;

    public function __construct(Company $company,Category $category,Language $language,Job $job,Attributes $attributes,Location $location)
    {
        parent::__construct();
        $this->company = $company;
        $this->category = $category;
        $this->language = $language;
        $this->job = $job;
        $this->attributes = $attributes;
        $this->location = $location;
    }
    public function index(Request $request)
    {
        $maxLimit = 100;
        $query = $this->company::search($request);
        $limit = min($maxLimit,$request->query("limit",10));
        $list = $query->paginate($limit);

        $layout = setting_item('company_list_layout','company-list-v1');
        $all_layouts = array_keys(config('company.list_layouts'));

        $demo_layout = $request->get('_layout');
        if(!empty($demo_layout)){
            $layout = 'company-list-'.$demo_layout;
        }
        if(!in_array($layout,$all_layouts) or !$layout ) $layout = $all_layouts[0];
        $need_marker = false;
        if(in_array($layout,['company-list-half-map','company-list-full-map'])) $need_marker = true;

        $markers = [];
        if (!empty($list) and $need_marker) {
            foreach ($list as $row) {
                $markers[] = [
                    "id"      => $row->id,
                    "title"   => $row->title,
                    "lat"     => (float)$row->map_lat,
                    "lng"     => (float)$row->map_lng,
                    "infobox" => view('Company::frontend.layouts.elements.map-infobox', ['row' => $row, 'disable_lazyload' => 1, 'wrap_class' => 'infobox-item'])->render(),
                    'customMarker' => view('Company::frontend.layouts.elements.map-marker', ['row' => $row,'disable_lazyload'=>1])->render()
                ];
            }
        }
        $_display = $request->query('_display','list');
        if(!in_array($_display,['list','grid'])) $_display = 'list';

        if($request->query('_ajax')){
            return [
                'fragments'=>[
                    '.ajax-search-result'=>view('Company::frontend.layouts.search.ajax.search-result', [
                        'rows'=>$list,
                        '_display'=>$_display,
                        'style'=>$layout,
                    ])->render(),
                    '.result-count'=> $list->total() ? __("Showing :from - :to of :total",["from"=>$list->firstItem(),"to"=>$list->lastItem(),"total"=>$list->total()]) : ""
                ],
                'markers'=>$markers
            ];
        }

        $limit_location = 1000;
        $title_page = setting_item_with_lang('company_page_search_title');
        $data = [
            'rows'              => $list,
            'list_locations'=> $this->location::where('status', 'publish')->limit($limit_location)->get()->toTree(),
            'categories'    => $this->category::query()->where("status", "publish")->with('translations')->get()->toTree(),
            'attributes'     => $this->attributes::where('service', 'company')->get(),
            'model_tag'         => [],
            'page_title' => $title_page ?? "",
            'breadcrumbs'       => [
                [
                    'name'  => __('Companies'),
                    'url'  => route('companies.index'),
                    'class' => 'active'
                ],
            ],
            "body_class"=>'company-search',
            "seo_meta"   => $this->company::getSeoMetaForPageList(),
            "languages"=>$this->language::getActive(false),
            "locale"=> app()->getLocale(),
            'markers'            => $markers,
            '_display'=>$_display
        ];

        $data['style'] = $layout;

        return view('Company::frontend.index', $data);
    }
    public function detail(Request $request, $slug)
    {
        $row = $this->company::where('slug', $slug)->with(["category","location","companyTerm","getAuthor"])
            ->withCount(['jobs' => function (Builder $query) {
                $query->where('status', 'publish');
            }])
            ->where('status','publish')->first();

        if (empty($row)) {
            return redirect('/');
        }
        $translation = $row->translateOrOrigin(app()->getLocale());
        if($row && !empty($row->email) && setting_item('enable_hide_email_company'))
        {
            $email_e = explode("@",$row->email);
            if(isset($email_e[0]) && isset($email_e[1]))
            {
                $row->email = '****@'.$email_e[1];
            }
        }
        if($row && !empty($row->phone) && setting_item('enable_hide_email_company'))
        {
            $row->phone = "****".substr($row->phone, -3);
        }
        $company_jobs_query = $this->job::with(['location','translations', 'category', 'jobType'])
            ->where('company_id',$row->id)
            ->where("status","publish");
        if(setting_item('job_hide_expired_jobs') == 1) {
            $company_jobs_query->where('expiration_date', '>=', date('Y-m-d H:s:i'));
        }
        $company_jobs = $company_jobs_query->paginate(5);

        if($request->query('_ajax')){
            $html = [
                '.ajax-jobs-list' => '',
                '.ajax-pagination'=>$company_jobs->links()->toHtml()
            ];
            foreach ($company_jobs as $job){
                $html['.ajax-jobs-list'].= view('Job::frontend.layouts.loop.job-item-1',['row'=>$job])->render();
            }
            return $html;
        }

        $review_list = $row->getReviewList();
        $review_list->setPageName('comment-page');
        $data = [
            'row'               => $row,
            'jobs'              => $company_jobs,
            'translation'       => $translation,
            'seo_meta' => $row->getSeoMetaWithTranslation(app()->getLocale(), $translation),
            'custom_title_page' => $row->name,
            'review_list'  => $review_list,
            'breadcrumbs'       =>$this->getDetailBreadcrumbs($row,$translation),
            'header_transparent'=>true,
            'body_class'=>'single-company'
        ];
        $attributes     = $this->attributes::where('service', 'company')->get();
        $companyTerm = $row->companyTerm;
        if($companyTerm)
        {
            foreach ($attributes as $attribute)
            {
                $terms = [];
                foreach ($companyTerm as $company_term)
                {
                    if($company_term->term)
                    {
                        if($company_term->term->attr_id == $attribute->id)
                        {
                            $company_term_trans = $company_term->term->translateOrOrigin(app()->getLocale());
                            $terms[] = $company_term_trans->name;
                        }
                    }
                }
                if(count($terms) > 0)
                {
                    $attribute->company_term = $terms;
                }
            }
        }
        $author = $row->getAuthor;
        if ($author) get_user_view($author->id);
        $data['attributes'] = $attributes;
        $this->setActiveMenu($row);
        $view_layouts = ['v1', 'v2','v3'];
        $layout = (setting_item('single_company_layout') && !empty(setting_item('single_company_layout'))) ? setting_item('single_company_layout') : 'company-single-v1';
        $demo_layout = $request->get('_layout');
        if(!empty($demo_layout) && in_array($demo_layout, $view_layouts)){
            $layout = 'company-single-'.$demo_layout;
        }
        $data['style'] = $layout;
        return view('Company::frontend.detail', $data);
    }

    protected function getDetailBreadcrumbs(Company $company,CompanyTranslation $translation){
        return [
            [
                'name' => __('Companies'),
                'url'  => route('companies.index')
            ],
            [
                'name'  => $translation->name,
                'class' => 'active'
            ],
        ];
    }

    public function storeContact(Request $request)
    {
        $request->validate([
            'email'   => [
                'required',
                'max:255',
                'email'
            ],
            'name'    => ['required'],
            'message' => ['required']
        ]);
        /**
         * Google ReCapcha
         */
        if(ReCaptchaEngine::isEnable()){
            $codeCapcha = $request->input('g-recaptcha-response');
            if(!$codeCapcha or !ReCaptchaEngine::verify($codeCapcha)){
                $data = [
                    'status'    => 0,
                    'message'    => __('Please verify the captcha'),
                ];
                return response()->json($data, 200);
            }
        }
        $row = new CandidateContact($request->input());
        $row->status = 'sent';
        if ($row->save()) {
            $this->sendEmail($row);
            $data = [
                'status'    => 1,
                'message'    => __('Thank you for contacting us! We will get back to you soon'),
            ];
            return response()->json($data, 200);
        }
    }

    protected function sendEmail($contact){
        $userNotify = User::query()->where('id', $contact->origin_id)->first();
        if($userNotify){
            try {
                Mail::to($userNotify->email)->send(new NotificationCandidateContact($contact));

                $data = [
                    'id' => $contact->id,
                    'event'   => 'ContactToCandidate',
                    'to'      => 'company',
                    'name' => $contact->name ?? '',
                    'avatar' => '',
                    'link' => route("company.admin.myContact"),
                    'type' => 'contact_form',
                    'message' => __(':name have sent a contact to you', ['name' => $contact->name ?? ''])
                ];

                $userNotify->notify(new PrivateChannelServices($data));
            }catch (Exception $exception){
                Log::warning("Contact Company Send Mail: ".$exception->getMessage());
            }
        }
    }
}
