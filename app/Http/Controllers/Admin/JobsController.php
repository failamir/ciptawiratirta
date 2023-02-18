<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyJobRequest;
use App\Http\Requests\StoreJobRequest;
use App\Http\Requests\UpdateJobRequest;
use App\Models\Department;
use App\Models\Job;
use App\Models\Principal;
use App\Models\Ship;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class JobsController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('job_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jobs = Job::with(['category', 'company', 'job_type', 'media'])->get();

        return view('admin.jobs.index', compact('jobs'));
    }

    public function create()
    {
        abort_if(Gate::denies('job_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = Department::pluck('department_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $companies = Principal::pluck('principal_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $job_types = Ship::pluck('ship_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.jobs.create', compact('categories', 'companies', 'job_types'));
    }

    public function store(StoreJobRequest $request)
    {
        $job = Job::create($request->all());

        if ($request->input('video_cover', false)) {
            $job->addMedia(storage_path('tmp/uploads/' . basename($request->input('video_cover'))))->toMediaCollection('video_cover');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $job->id]);
        }

        return redirect()->route('admin.jobs.index');
    }

    public function edit(Job $job)
    {
        abort_if(Gate::denies('job_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = Department::pluck('department_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $companies = Principal::pluck('principal_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $job_types = Ship::pluck('ship_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $job->load('category', 'company', 'job_type');

        return view('admin.jobs.edit', compact('categories', 'companies', 'job', 'job_types'));
    }

    public function update(UpdateJobRequest $request, Job $job)
    {
        $job->update($request->all());

        if ($request->input('video_cover', false)) {
            if (!$job->video_cover || $request->input('video_cover') !== $job->video_cover->file_name) {
                if ($job->video_cover) {
                    $job->video_cover->delete();
                }
                $job->addMedia(storage_path('tmp/uploads/' . basename($request->input('video_cover'))))->toMediaCollection('video_cover');
            }
        } elseif ($job->video_cover) {
            $job->video_cover->delete();
        }

        return redirect()->route('admin.jobs.index');
    }

    public function show(Job $job)
    {
        abort_if(Gate::denies('job_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $job->load('category', 'company', 'job_type', 'appliedPositionSgps', 'approvedAsSgps');

        return view('admin.jobs.show', compact('job'));
    }

    public function destroy(Job $job)
    {
        abort_if(Gate::denies('job_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $job->delete();

        return back();
    }

    public function massDestroy(MassDestroyJobRequest $request)
    {
        Job::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('job_create') && Gate::denies('job_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Job();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
