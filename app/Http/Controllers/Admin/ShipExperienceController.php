<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyShipExperienceRequest;
use App\Http\Requests\StoreShipExperienceRequest;
use App\Http\Requests\UpdateShipExperienceRequest;
use App\Models\ShipExperience;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ShipExperienceController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('ship_experience_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $shipExperiences = ShipExperience::with(['candidate'])->get();

        return view('admin.shipExperiences.index', compact('shipExperiences'));
    }

    public function create()
    {
        abort_if(Gate::denies('ship_experience_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $candidates = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.shipExperiences.create', compact('candidates'));
    }

    public function store(StoreShipExperienceRequest $request)
    {
        $shipExperience = ShipExperience::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $shipExperience->id]);
        }

        return redirect()->route('admin.ship-experiences.index');
    }

    public function edit(ShipExperience $shipExperience)
    {
        abort_if(Gate::denies('ship_experience_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $candidates = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $shipExperience->load('candidate');

        return view('admin.shipExperiences.edit', compact('candidates', 'shipExperience'));
    }

    public function update(UpdateShipExperienceRequest $request, ShipExperience $shipExperience)
    {
        $shipExperience->update($request->all());

        return redirect()->route('admin.ship-experiences.index');
    }

    public function show(ShipExperience $shipExperience)
    {
        abort_if(Gate::denies('ship_experience_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $shipExperience->load('candidate');

        return view('admin.shipExperiences.show', compact('shipExperience'));
    }

    public function destroy(ShipExperience $shipExperience)
    {
        abort_if(Gate::denies('ship_experience_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $shipExperience->delete();

        return back();
    }

    public function massDestroy(MassDestroyShipExperienceRequest $request)
    {
        ShipExperience::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('ship_experience_create') && Gate::denies('ship_experience_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new ShipExperience();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
