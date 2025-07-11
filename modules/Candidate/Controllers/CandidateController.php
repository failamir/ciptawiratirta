<?php
namespace Modules\Candidate\Controllers;

use App\Helpers\ReCaptchaEngine;
use App\Notifications\PrivateChannelServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;
use Matrix\Exception;
use Modules\Candidate\Models\CandidateContact;
use Modules\Candidate\Models\CandidateCvs;
use Modules\Candidate\Emails\NotificationCandidateContact;
use Modules\Contact\Models\Contact;
use Modules\FrontendController;
use Modules\Job\Models\JobCandidate;
use Modules\Language\Models\Language;
use Modules\Candidate\Models\Candidate;
use Modules\Candidate\Models\Category;
use Modules\Candidate\Models\CandidateTranslation;
use Modules\Location\Models\Location;
use Modules\Skill\Models\Skill;
use Modules\User\Models\User;
use Modules\User\Models\UserViews;

class CandidateController extends FrontendController
{


    /**
     * @var Candidate
     */
    private $candidate;

    public function __construct(Candidate $candidate)
    {
        parent::__construct();
        $this->candidate = $candidate;
    }

    public function index(Request $request)
    {
        if((setting_item('candidate_public_policy') == "employer" || setting_item('candidate_public_policy') == "employer_applied") && !is_employer()) {
            return redirect('/');
        }

        $maxLimit = 100;
        $query = $this->candidate::search($request);
        $limit = min($maxLimit,$request->query("limit",10));
        $list = $query->paginate($limit);

        $layout = setting_item('candidate_list_layout','v1');
        $all_layouts = array_keys(config('candidate.list_layouts'));

        $demo_layout = $request->get('_layout');
        if(!empty($demo_layout)){
            $layout = $demo_layout;
        }
        if(!in_array($layout,$all_layouts) or !$layout ) $layout = $all_layouts[0];
        $need_marker = false;
        if(in_array($layout,config('candidate.for_map_layouts'))) $need_marker = true;

        $markers = [];
        if (!empty($list) and $need_marker) {
            foreach ($list as $row) {
                $markers[] = [
                    "id"      => $row->id,
                    "title"   => $row->title,
                    "lat"     => (float)$row->map_lat,
                    "lng"     => (float)$row->map_lng,
//                    "gallery" => $row->getGallery(true),
                    "infobox" => view('Candidate::frontend.layouts.details.candidate-marker-infobox', ['row' => $row,'disable_lazyload'=>1,'wrap_class'=>'infobox-item'])->render(),
//                    'marker'  => asset('images/icons/png/pin.png'),
                    'customMarker' => view('Candidate::frontend.layouts.details.candidate-marker-avatar', ['row' => $row,'disable_lazyload'=>1])->render(),
                ];
            }
        }
        $_display = $request->query('_display','list');
        if(!in_array($_display,['list','grid'])) $_display = 'list';

        if($request->query('_ajax')){
            return view('Candidate::frontend.layouts.search.ajax.search-result', [
                'rows'=>$list,
                '_display'=>$_display
            ]);
        }

        $limit_location = 1000;
        $data = [
            'rows'               => $list,
            'list_locations'      => Location::where('status', 'publish')->limit($limit_location)->get()->toTree(),
            'list_categories'      => Category::where('status', 'publish')->get()->toTree(),
            'list_skills'      => Skill::where('status', 'publish')->get(),
            'min_max_price' => $this->candidate::getMinMaxPrice(),
            "filter"             => $request->query('filter'),
            "seo_meta"           => $this->candidate::getSeoMetaForPageList(),
            'markers'            => $markers,
            '_display'           =>$_display
        ];

        $data['style'] = 'candidate-list-'.$layout;
        $data['layout'] = $layout;
        if ($data['layout'] == 'v5') $data['footer_null'] = true;
        return view('Candidate::frontend.index', $data);
    }

    public function detail(Request $request, $slug)
    {
        if((setting_item('candidate_public_policy') == "employer" || setting_item('candidate_public_policy') == "employer_applied") && !is_employer()) {
            return redirect('/');
        }


        if(setting_item('candidate_public_policy') == "employer_applied") {

            $user = User::with("company")->where("id", Auth::id())->first();
            if(empty($user->company->id)) {
                return redirect('/');
            }

            $row = $this->candidate::with(['skills', 'categories', 'user', "jobs" => function ($query) use ($user) {
                $query->where("bc_jobs.company_id", "=", $user->company->id);
            }])->where('slug', $slug)->first();

            if($row->jobs->count() == 0) {
                return redirect('/');
            }
        } else {
            $row = $this->candidate::with(['skills', 'categories', 'user'])->where('slug', $slug)->first();
        }

        if(!$row){
            $row = $this->candidate::find($slug);
        }

        if (empty($row)) {
            return redirect('/');
        }else{
            $apply_id = $request->get('apply_id');
            $job_candidate = JobCandidate::query()->where('candidate_id', $row->id)->find($apply_id);
            if(empty($job_candidate)) {
                if ($row->allow_search == 'hide' && $row->id != Auth::id()) {
                    return redirect('/');
                }
            }
        }

        $translation = $row->translateOrOrigin(app()->getLocale());

        $data = [
            'row'               => $row,
            'translation'       => $translation,
            'model_category'    => Category::where("status", "publish"),
            'cv'                => CandidateCvs::query()->where('origin_id', $row->id)->where('is_default', 1)->first(),
            'custom_title_page' => $title_page ?? "",
            "gallery"           => $row->getGallery(true),
            'header_transparent'=>true,
            'seo_meta'          => $row->getSeoMetaWithTranslation(app()->getLocale(),$translation),
            'breadcrumbs' => [
                [
                    'name' => __('Candidate'),
                    'url'  => route('candidate.index')
                ],
                [
                    'name'  => $translation->title,
                    'class' => 'active'
                ],
            ],
        ];

        $all_layouts = array_keys(config('candidate.detail_layouts'));
        $layout = setting_item('candidate_single_layout', 'v1');
        $demo_layout = $request->get('_layout');

        if(!empty($demo_layout) and View::exists("Candidate::frontend.layouts.detail-ver.candidate-single-$demo_layout")){
            $layout = $demo_layout;
        }
        if(!in_array($layout,$all_layouts) or !$layout ) $layout = $all_layouts[0];

        $data['style'] = "candidate-single-".$layout;
        $this->setActiveMenu($row);

        get_user_view($row->id);

        return view('Candidate::frontend.detail', $data);
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
                    'to'      => 'candidate',
                    'name' => $contact->name ?? '',
                    'avatar' => '',
                    'link' => route("candidate.admin.myContact"),
                    'type' => 'apply_job',
                    'message' => __(':name have sent a contact to you', ['name' => $contact->name ?? ''])
                ];

                $userNotify->notify(new PrivateChannelServices($data));
            }catch (Exception $exception){
                Log::warning("Contact Candidate Send Mail: ".$exception->getMessage());
            }
        }
    }
}
