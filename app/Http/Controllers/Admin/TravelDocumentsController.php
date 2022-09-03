<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyTravelDocumentRequest;
use App\Http\Requests\StoreTravelDocumentRequest;
use App\Http\Requests\UpdateTravelDocumentRequest;
use App\Models\TravelDocument;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class TravelDocumentsController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('travel_document_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $travelDocuments = TravelDocument::with(['candidate', 'media'])->get();

        return view('admin.travelDocuments.index', compact('travelDocuments'));
    }

    public function create()
    {
        abort_if(Gate::denies('travel_document_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $candidates = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.travelDocuments.create', compact('candidates'));
    }

    public function store(StoreTravelDocumentRequest $request)
    {
        $travelDocument = TravelDocument::create($request->all());

        if ($request->input('file', false)) {
            $travelDocument->addMedia(storage_path('tmp/uploads/' . basename($request->input('file'))))->toMediaCollection('file');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $travelDocument->id]);
        }

        return redirect()->route('admin.travel-documents.index');
    }

    public function edit(TravelDocument $travelDocument)
    {
        abort_if(Gate::denies('travel_document_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $candidates = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $travelDocument->load('candidate');

        return view('admin.travelDocuments.edit', compact('candidates', 'travelDocument'));
    }

    public function update(UpdateTravelDocumentRequest $request, TravelDocument $travelDocument)
    {
        $travelDocument->update($request->all());

        if ($request->input('file', false)) {
            if (!$travelDocument->file || $request->input('file') !== $travelDocument->file->file_name) {
                if ($travelDocument->file) {
                    $travelDocument->file->delete();
                }
                $travelDocument->addMedia(storage_path('tmp/uploads/' . basename($request->input('file'))))->toMediaCollection('file');
            }
        } elseif ($travelDocument->file) {
            $travelDocument->file->delete();
        }

        return redirect()->route('admin.travel-documents.index');
    }

    public function show(TravelDocument $travelDocument)
    {
        abort_if(Gate::denies('travel_document_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $travelDocument->load('candidate');

        return view('admin.travelDocuments.show', compact('travelDocument'));
    }

    public function destroy(TravelDocument $travelDocument)
    {
        abort_if(Gate::denies('travel_document_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $travelDocument->delete();

        return back();
    }

    public function massDestroy(MassDestroyTravelDocumentRequest $request)
    {
        TravelDocument::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('travel_document_create') && Gate::denies('travel_document_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new TravelDocument();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
