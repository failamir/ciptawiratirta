<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyNextOfKinRequest;
use App\Http\Requests\StoreNextOfKinRequest;
use App\Http\Requests\UpdateNextOfKinRequest;
use App\Models\NextOfKin;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class NextOfKinController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('next_of_kin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $nextOfKins = NextOfKin::with(['candidate', 'media'])->get();

        return view('admin.nextOfKins.index', compact('nextOfKins'));
    }

    public function create()
    {
        abort_if(Gate::denies('next_of_kin_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $candidates = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.nextOfKins.create', compact('candidates'));
    }

    public function store(StoreNextOfKinRequest $request)
    {
        $nextOfKin = NextOfKin::create($request->all());

        if ($request->input('signature', false)) {
            $nextOfKin->addMedia(storage_path('tmp/uploads/' . basename($request->input('signature'))))->toMediaCollection('signature');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $nextOfKin->id]);
        }

        return redirect()->route('admin.next-of-kins.index');
    }

    public function edit(NextOfKin $nextOfKin)
    {
        abort_if(Gate::denies('next_of_kin_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $candidates = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $nextOfKin->load('candidate');

        return view('admin.nextOfKins.edit', compact('candidates', 'nextOfKin'));
    }

    public function update(UpdateNextOfKinRequest $request, NextOfKin $nextOfKin)
    {
        $nextOfKin->update($request->all());

        if ($request->input('signature', false)) {
            if (!$nextOfKin->signature || $request->input('signature') !== $nextOfKin->signature->file_name) {
                if ($nextOfKin->signature) {
                    $nextOfKin->signature->delete();
                }
                $nextOfKin->addMedia(storage_path('tmp/uploads/' . basename($request->input('signature'))))->toMediaCollection('signature');
            }
        } elseif ($nextOfKin->signature) {
            $nextOfKin->signature->delete();
        }

        return redirect()->route('admin.next-of-kins.index');
    }

    public function show(NextOfKin $nextOfKin)
    {
        abort_if(Gate::denies('next_of_kin_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $nextOfKin->load('candidate');

        return view('admin.nextOfKins.show', compact('nextOfKin'));
    }

    public function destroy(NextOfKin $nextOfKin)
    {
        abort_if(Gate::denies('next_of_kin_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $nextOfKin->delete();

        return back();
    }

    public function massDestroy(MassDestroyNextOfKinRequest $request)
    {
        NextOfKin::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('next_of_kin_create') && Gate::denies('next_of_kin_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new NextOfKin();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
