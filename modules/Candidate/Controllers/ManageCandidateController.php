<?php


namespace Modules\Candidate\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Modules\Candidate\Models\CandidateCvs;
use Modules\FrontendController;
use Modules\Job\Events\CandidateDeleteApplied;
use Modules\Job\Models\JobCandidate;
use Modules\Media\Models\MediaFile;
use Modules\Media\Traits\HasUpload;

class ManageCandidateController extends FrontendController
{
    use HasUpload;

    public function appliedJobs(Request $request){
        $this->checkPermission('candidate_manage');
        $query = JobCandidate::with(['jobInfo', 'candidateInfo', 'cvInfo'])->where('candidate_id', Auth::id());
        if($s = $request->get('s')){
            $query->whereHas('jobInfo', function ($q) use ($s){
                $q->where("title", 'like', '%'.$s.'%');
            });
        }
        if($status = $request->get('status')){
            $query->where('status', $status);
        }
        if($orderby = $request->get('orderby')){
            switch ($orderby){
                case 'oldest':
                    $query->orderBy('id', 'asc');
                    break;
                default:
                    $query->orderBy('id', 'desc');
                    break;
            }
        }else{
            $query->orderBy('id', 'desc');
        }

        $rows = $query->paginate(20);
        $data = [
            'rows' => $rows,
            'menu_active' => 'user_profile',
            'page_title' => __("Applied Jobs")
        ];
        return view('Candidate::frontend.layouts.user.applied-jobs', $data);
    }

    public function deleteJobApplied(Request $request, $id){
        $this->checkPermission('candidate_manage');
        $row = JobCandidate::query()
            ->where('candidate_id', Auth::id())
            ->where('id', $id)
            ->first();
        if (empty($row)) {
            return redirect()->back()->with('error', __('Job not found!'));
        }
        if($row->status != 'pending') {
            return redirect()->back()->with('error', __("Can't delete this item"));
        }
        //Send Email and Notify
        event(new CandidateDeleteApplied($row));

        $row->delete();

        return back()->with('success',  __('Delete successfully!') );
    }

    public function cvManager(Request $request){

        $rows = CandidateCvs::with('media')
            ->where('origin_id', Auth::id())
            ->get();

        $data = [
            'rows' => $rows,
            'menu_active' => 'user_profile',
            'page_title' => __("CV Manager"),
            'is_user_page' => true
        ];
        return view('Candidate::frontend.layouts.user.cv-manager', $data);
    }

    public function uploadCv(Request $request){
        try {
            $fileObj = $this->uploadFile($request,'cv_file','cvs');
            $file_id = $fileObj->id;

        } catch (\Exception $exception) {
            return $this->sendError($exception->getMessage());
        }

        $is_default = CandidateCvs::query()->where('origin_id', Auth::id())->get()->count() == 0;
        $candidateCv = new CandidateCvs();
        $candidateCv->file_id = $file_id;
        $candidateCv->origin_id = Auth::id();
        if($is_default) $candidateCv->is_default = 1;
        $candidateCv->save();
        $candidateCv->load('media');

        return $this->sendSuccess([
            'file_name' => $candidateCv->media->file_name.'.'.$candidateCv->media->file_extension,
            'cv_id' => $candidateCv->id,
            'is_default' => $is_default
        ]);
    }

    public function setDefaultCv(Request $request){
        $cv_id = $request->get('cv_id');
        if($cv_id){
            $cv = CandidateCvs::query()->where("origin_id", Auth::id())->where('id', $cv_id)->first();
            if ($cv) {
                CandidateCvs::query()->where("origin_id", Auth::id())->update(['is_default' => 0]);
                $cv->is_default = 1;
                $cv->save();
            }

        }
        return $this->sendSuccess();
    }

    public function deleteCv(Request $request){
        $cv_id = $request->get('cv_id');
        if($cv_id){
            $cv = CandidateCvs::with('media')->where("origin_id", Auth::id())->where('id', $cv_id)->first();
            if ($cv && !empty($cv->media)) {
                //delete file from disk
                $storage = Storage::disk('uploads');
                if($storage->exists($cv->media->file_path)){
                    $storage->delete($cv->media->file_path);
                }
                //delete file from db
                $cv->media->delete();
                $cv->delete();
                return $this->sendSuccess();
            }
        }
        return $this->sendError(__("An error occurred!"));
    }

}
