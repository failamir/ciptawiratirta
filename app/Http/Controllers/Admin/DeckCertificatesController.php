<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyDeckCertificateRequest;
use App\Http\Requests\StoreDeckCertificateRequest;
use App\Http\Requests\UpdateDeckCertificateRequest;
use App\Models\DeckCertificate;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class DeckCertificatesController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('deck_certificate_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $deckCertificates = DeckCertificate::with(['candidate', 'media'])->get();

        return view('admin.deckCertificates.index', compact('deckCertificates'));
    }

    public function create()
    {
        abort_if(Gate::denies('deck_certificate_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $candidates = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.deckCertificates.create', compact('candidates'));
    }

    public function store(StoreDeckCertificateRequest $request)
    {
        $deckCertificate = DeckCertificate::create($request->all());

        if ($request->input('file', false)) {
            $deckCertificate->addMedia(storage_path('tmp/uploads/' . basename($request->input('file'))))->toMediaCollection('file');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $deckCertificate->id]);
        }

        return redirect()->route('admin.deck-certificates.index');
    }

    public function edit(DeckCertificate $deckCertificate)
    {
        abort_if(Gate::denies('deck_certificate_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $candidates = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $deckCertificate->load('candidate');

        return view('admin.deckCertificates.edit', compact('candidates', 'deckCertificate'));
    }

    public function update(UpdateDeckCertificateRequest $request, DeckCertificate $deckCertificate)
    {
        $deckCertificate->update($request->all());

        if ($request->input('file', false)) {
            if (!$deckCertificate->file || $request->input('file') !== $deckCertificate->file->file_name) {
                if ($deckCertificate->file) {
                    $deckCertificate->file->delete();
                }
                $deckCertificate->addMedia(storage_path('tmp/uploads/' . basename($request->input('file'))))->toMediaCollection('file');
            }
        } elseif ($deckCertificate->file) {
            $deckCertificate->file->delete();
        }

        return redirect()->route('admin.deck-certificates.index');
    }

    public function show(DeckCertificate $deckCertificate)
    {
        abort_if(Gate::denies('deck_certificate_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $deckCertificate->load('candidate');

        return view('admin.deckCertificates.show', compact('deckCertificate'));
    }

    public function destroy(DeckCertificate $deckCertificate)
    {
        abort_if(Gate::denies('deck_certificate_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $deckCertificate->delete();

        return back();
    }

    public function massDestroy(MassDestroyDeckCertificateRequest $request)
    {
        DeckCertificate::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('deck_certificate_create') && Gate::denies('deck_certificate_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new DeckCertificate();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
