<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyHotelExperienceRequest;
use App\Http\Requests\StoreHotelExperienceRequest;
use App\Http\Requests\UpdateHotelExperienceRequest;
use App\Models\HotelExperience;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class HotelExperienceController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('hotel_experience_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hotelExperiences = HotelExperience::with(['candidate'])->get();

        return view('admin.hotelExperiences.index', compact('hotelExperiences'));
    }

    public function create()
    {
        abort_if(Gate::denies('hotel_experience_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $candidates = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.hotelExperiences.create', compact('candidates'));
    }

    public function store(StoreHotelExperienceRequest $request)
    {
        $hotelExperience = HotelExperience::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $hotelExperience->id]);
        }

        return redirect()->route('admin.hotel-experiences.index');
    }

    public function edit(HotelExperience $hotelExperience)
    {
        abort_if(Gate::denies('hotel_experience_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $candidates = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $hotelExperience->load('candidate');

        return view('admin.hotelExperiences.edit', compact('candidates', 'hotelExperience'));
    }

    public function update(UpdateHotelExperienceRequest $request, HotelExperience $hotelExperience)
    {
        $hotelExperience->update($request->all());

        return redirect()->route('admin.hotel-experiences.index');
    }

    public function show(HotelExperience $hotelExperience)
    {
        abort_if(Gate::denies('hotel_experience_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hotelExperience->load('candidate');

        return view('admin.hotelExperiences.show', compact('hotelExperience'));
    }

    public function destroy(HotelExperience $hotelExperience)
    {
        abort_if(Gate::denies('hotel_experience_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hotelExperience->delete();

        return back();
    }

    public function massDestroy(MassDestroyHotelExperienceRequest $request)
    {
        HotelExperience::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('hotel_experience_create') && Gate::denies('hotel_experience_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new HotelExperience();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
