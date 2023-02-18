<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyHotelCertificateRequest;
use App\Http\Requests\StoreHotelCertificateRequest;
use App\Http\Requests\UpdateHotelCertificateRequest;
use App\Models\HotelCertificate;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class HotelCertificatesController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('hotel_certificate_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hotelCertificates = HotelCertificate::with(['candidate', 'media'])->get();

        return view('admin.hotelCertificates.index', compact('hotelCertificates'));
    }

    public function create()
    {
        abort_if(Gate::denies('hotel_certificate_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $candidates = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.hotelCertificates.create', compact('candidates'));
    }

    public function store(StoreHotelCertificateRequest $request)
    {
        $hotelCertificate = HotelCertificate::create($request->all());

        if ($request->input('file', false)) {
            $hotelCertificate->addMedia(storage_path('tmp/uploads/' . basename($request->input('file'))))->toMediaCollection('file');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $hotelCertificate->id]);
        }

        return redirect()->route('admin.hotel-certificates.index');
    }

    public function edit(HotelCertificate $hotelCertificate)
    {
        abort_if(Gate::denies('hotel_certificate_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $candidates = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $hotelCertificate->load('candidate');

        return view('admin.hotelCertificates.edit', compact('candidates', 'hotelCertificate'));
    }

    public function update(UpdateHotelCertificateRequest $request, HotelCertificate $hotelCertificate)
    {
        $hotelCertificate->update($request->all());

        if ($request->input('file', false)) {
            if (!$hotelCertificate->file || $request->input('file') !== $hotelCertificate->file->file_name) {
                if ($hotelCertificate->file) {
                    $hotelCertificate->file->delete();
                }
                $hotelCertificate->addMedia(storage_path('tmp/uploads/' . basename($request->input('file'))))->toMediaCollection('file');
            }
        } elseif ($hotelCertificate->file) {
            $hotelCertificate->file->delete();
        }

        return redirect()->route('admin.hotel-certificates.index');
    }

    public function show(HotelCertificate $hotelCertificate)
    {
        abort_if(Gate::denies('hotel_certificate_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hotelCertificate->load('candidate');

        return view('admin.hotelCertificates.show', compact('hotelCertificate'));
    }

    public function destroy(HotelCertificate $hotelCertificate)
    {
        abort_if(Gate::denies('hotel_certificate_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hotelCertificate->delete();

        return back();
    }

    public function massDestroy(MassDestroyHotelCertificateRequest $request)
    {
        HotelCertificate::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('hotel_certificate_create') && Gate::denies('hotel_certificate_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new HotelCertificate();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
