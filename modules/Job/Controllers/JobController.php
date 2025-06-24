<?php
namespace Modules\Job\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Candidate\Models\Candidate;
use Modules\Candidate\Models\CandidateCvs;
use Modules\Job\Models\JobCategory as Category;
use Modules\Job\Events\CandidateApplyJobSubmit;
use Modules\Job\Models\Job;
use Modules\Job\Models\JobCandidate;
use Modules\Job\Models\JobType;
use Modules\Location\Models\Location;
use Modules\Media\Models\MediaFile;
use Modules\Media\Traits\HasUpload;
use Modules\Skill\Models\Skill;
use Modules\User\Models\User;

class JobController extends Controller{

    use HasUpload;
    /**
     * @var Job
     */
    public $job;

    public function __construct(Job $job){

        $this->job = $job;
    }

    public function index(Request $request)
    {

        if($request->query('_ajax')){
            return $this->searchResult($request);
        }
        $data = $this->searchResult($request);
        $data['seo_meta'] = Job::getSeoMetaForPageList();
        return view('Job::frontend.index', $data);

    }

    public function detail(Request $request, $slug)
    {

        $row = Job::with(['location','translations', 'category', 'company', 'company.jobs', 'company.category', 'company.companyTerm', 'jobType', 'skills', 'wishlist'])->where('slug', $slug);
        if(setting_item("job_need_approve")) {
            $row = $row->where('is_approved', '=', 'approved');
        }
        $row = $row->first();
        if(empty($row)){
            abort('404');
        }
        $translation = $row->translateOrOrigin(app()->getLocale());
        $job_related = [];
        $category_id = $row->category_id;
        if (!empty($category_id)) {
            $job_related_query = Job::with(['location','translations', 'company', 'category', 'jobType'])
                ->where('category_id', $category_id)
                ->where("status","publish")
                ->whereNotIn('id', [$row->id])->take(3);
            if(setting_item('job_hide_expired_jobs') == 1){
                $job_related_query->where('expiration_date', '>=',  date('Y-m-d H:s:i'));
            }
            $job_related = $job_related_query->get();
        }
        $candidate = Auth::check() ? Candidate::with('cvs')->where('id', Auth::id())->first() : false;
        $applied = false;
        if ($candidate){
            $job_candidate = JobCandidate::query()
                ->where('job_id', $row->id)
                ->where('candidate_id', Auth::id())
                ->first();
            if($job_candidate) $applied = true;
        }

        $breadcrumbs_cat = [];
        if ($row->category){
            $category_translation = $row->category->translateOrOrigin(app()->getLocale());
            $breadcrumbs_cat = [
                'name' => $category_translation->name,
                'url'  => route('job.category.index', ['slug' => $row->category->slug])
            ];
        }

        $data = [
            'row' => $row,
            'translation' => $translation,
            'job_related' => $job_related,
            'candidate' => $candidate,
            'applied' => $applied,
            'disable_header_shadow' => true,
            'seo_meta' => $row->getSeoMetaWithTranslation(app()->getLocale(), $translation),
            'body_class' => "single-jobs",
            'breadcrumbs'       => [
                [
                    'name' => __('Jobs'),
                    'url'  => route('job.search')
                ],
                $breadcrumbs_cat,
                [
                    'name'  => $translation->title,
                    'class' => 'active'
                ]
            ]
        ];

        $view_layouts = ['v1', 'v2', 'v3', 'v4', 'v5'];
        $layout = setting_item('job_single_layout', 'job-single-v1');
        $demo_layout = $request->get('_layout');
        if(!empty($demo_layout) && in_array($demo_layout, $view_layouts)){
            $layout = 'job-single-'.$demo_layout;
        }
        $data['style'] = $layout;

        $this->setActiveMenu($row);
        return view('Job::frontend.detail', $data);
    }

    public function applyJob(Request $request){
        $cv_file = $request->file('cv_file');
        $apply_cv_id = $request->input('apply_cv_id');
        $message = $request->input('message');
        $job_id = $request->input('job_id');
        $company_id = $request->input('company_id');
        if(empty($apply_cv_id) && empty($cv_file)){
            return $this->sendError(__("Choose a cv"));
        }
        if(empty($apply_cv_id)) {
            try {
                $fileObj = $this->uploadFile($request, 'cv_file', 'cvs');
                $file_id = $fileObj->id;
            } catch (\Exception $exception) {
                return $this->sendError($exception->getMessage());
            }

            $candidateCv = new CandidateCvs();
            $candidateCv->file_id = $file_id;
            $candidateCv->origin_id = Auth::id();
            $candidateCv->save();
            $apply_cv_id = $candidateCv->id;
        }

        $row = JobCandidate::query()
            ->where('job_id', $job_id)
            ->where('candidate_id', Auth::id())
            ->first();
        if ($row){
            return $this->sendError(__("You have applied this job already"));
        }
        $row = new JobCandidate();
        $row->job_id = $job_id;
        $row->candidate_id = Auth::id();
        $row->cv_id = $apply_cv_id;
        $row->message = $message;
        $row->status = 'pending';
        $row->company_id = $company_id;
        $row->save();
        $row->load('jobInfo', 'jobInfo.user', 'candidateInfo', 'company', 'company.getAuthor');
        //
        event(new CandidateApplyJobSubmit($row));

        return $this->sendSuccess([
            'message' => __("Apply successfully!")
        ]);
    }

    public function categoryIndex(Request $request, $slug){

        $cat = Category::where('slug', $slug)->first();
        if (empty($cat)) {
            return redirect(route('job.search'));
        }
        $translation = $cat->translateOrOrigin(app()->getLocale());
        $request->merge(['category' => $cat->id]);

        if($request->query('_ajax')){
            return $this->searchResult($request);
        }
        $data = $this->searchResult($request);
        $data['seo_meta'] = $cat->getSeoMetaWithTranslation(app()->getLocale(), $translation);
        return view('Job::frontend.index', $data);
    }

    public function locationIndex(Request $request, $slug){

        $location = Location::query()->where('slug', $slug)->first();
        if (empty($location)) {
            return redirect(route('job.search'));
        }
        $translation = $location->translateOrOrigin(app()->getLocale());
        $request->merge(['location' => $location->id]);

        if($request->query('_ajax')){
            return $this->searchResult($request);
        }
        $data = $this->searchResult($request);
        $data['seo_meta'] = $location->getSeoMetaWithTranslation(app()->getLocale(), $translation);
        return view('Job::frontend.index', $data);

    }

    public function categoryLocationIndex(Request $request, $cat_slug, $location_slug){

        $cat = Category::where('slug', $cat_slug)->first();
        $location = Location::query()->where('slug', $location_slug)->first();
        if(empty($cat) || empty($location)){
            return redirect(route('job.search'));
        }
        $translation = $cat->translateOrOrigin(app()->getLocale());
        $request->merge(['category' => $cat->id]);
        $request->merge(['location' => $location->id]);

        if($request->query('_ajax')){
            return $this->searchResult($request);
        }
        $data = $this->searchResult($request);
        $data['seo_meta'] = $cat->getSeoMetaWithTranslation(app()->getLocale(), $translation);
        return view('Job::frontend.index', $data);
    }

    public function searchResult(Request $request){

        //Request and query
        $limit = (int)$request->query('limit',10);
        $limit = $limit > 50 ? 50 : $limit;
        $query = $this->job::search($request->query());
        $list = $query->paginate($limit);

        //Layout
        $layout = setting_item('jobs_list_layout', 'job-list-v1');
        $demo_layout = $request->get('_layout');
        if(!empty($demo_layout)){
            $layout = 'job-list-'.$demo_layout;
        }
        $_display = $request->query('_display','');
        if(!in_array($_display,['list','grid'])){
            if($layout == 'job-list-v2'){
                $_display = 'grid';
            }else{
                $_display = 'list';
            }
        }

        $need_marker = false;
        if(in_array($layout,config('job.for_map_layouts'))) $need_marker = true;

        //Markers for layout 8 || layout 9 || half map || full map
        $markers = [];
        if (!empty($list) && $need_marker ) {
            foreach ($list as $row) {
                if(!empty($row->map_lat) && !empty($row->map_lng)) {
                    $markers[] = [
                        "id" => $row->id,
                        "title" => $row->title,
                        "lat" => (float)$row->map_lat,
                        "lng" => (float)$row->map_lng,
                        "infobox" => view('Job::frontend.layouts.elements.map-infobox', ['row' => $row, 'disable_lazyload' => 1, 'wrap_class' => 'infobox-item'])->render(),
                        'customMarker' => view('Job::frontend.layouts.elements.map-marker', ['row' => $row,'disable_lazyload'=>1])->render()
                    ];
                }
            }
        }

        //Return for ajax
        if($request->query('_ajax')){
            return [
                'fragments'=>[
                    '.ajax-search-result'=>view('Job::frontend.layouts.search.ajax.search-result', [
                        'rows'=>$list,
                        '_display'=>$_display,
                        'style'=>$layout,
                    ])->render(),
                    '.result-count'=> $list->total() ? __("Showing :from - :to of :total",["from"=>$list->firstItem(),"to"=>$list->lastItem(),"total"=>$list->total()]) : ''
                ],
                'markers'=>$markers
            ];
        }

        //data
        return [
            'rows'               => $list,
            'list_locations'      => Location::where('status', 'publish')->limit(1000)->get()->toTree(),
            'list_categories'      => Category::where('status', 'publish')->get()->toTree(),
            'category' => $cat ?? null,
            'location' => $location ?? null,
            'job_types'      => JobType::where('status', 'publish')->get(),
            'skills'      => Skill::query()->where('status', 'publish')->get(),
            'min_max_price' => Job::getMinMaxPrice(),
            'markers' => $markers,
            "filter"             => $request->query('filter'),
            'style' => $layout,
            '_display' => $_display,
            'disable_header_shadow' => $layout == 'job-list-v7',
            'footer_null' => $layout == 'job-list-v9'
        ];

    }

}
