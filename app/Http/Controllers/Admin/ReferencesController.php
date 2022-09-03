<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyReferenceRequest;
use App\Http\Requests\StoreReferenceRequest;
use App\Http\Requests\UpdateReferenceRequest;
use App\Models\Reference;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ReferencesController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('reference_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $references = Reference::with(['candidate'])->get();

        return view('admin.references.index', compact('references'));
    }

    public function create()
    {
        abort_if(Gate::denies('reference_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $candidates = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.references.create', compact('candidates'));
    }

    public function store(StoreReferenceRequest $request)
    {
        $reference = Reference::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $reference->id]);
        }

        return redirect()->route('admin.references.index');
    }

    public function edit(Reference $reference)
    {
        abort_if(Gate::denies('reference_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $candidates = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $reference->load('candidate');

        return view('admin.references.edit', compact('candidates', 'reference'));
    }

    public function update(UpdateReferenceRequest $request, Reference $reference)
    {
        $reference->update($request->all());

        return redirect()->route('admin.references.index');
    }

    public function show(Reference $reference)
    {
        abort_if(Gate::denies('reference_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reference->load('candidate');

        return view('admin.references.show', compact('reference'));
    }

    public function destroy(Reference $reference)
    {
        abort_if(Gate::denies('reference_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reference->delete();

        return back();
    }

    public function massDestroy(MassDestroyReferenceRequest $request)
    {
        Reference::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('reference_create') && Gate::denies('reference_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Reference();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
