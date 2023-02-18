<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyTestimoniRequest;
use App\Http\Requests\StoreTestimoniRequest;
use App\Http\Requests\UpdateTestimoniRequest;
use App\Models\Testimoni;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class TestimoniController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('testimoni_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $testimonis = Testimoni::with(['user'])->get();

        return view('admin.testimonis.index', compact('testimonis'));
    }

    public function create()
    {
        abort_if(Gate::denies('testimoni_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.testimonis.create', compact('users'));
    }

    public function store(StoreTestimoniRequest $request)
    {
        $testimoni = Testimoni::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $testimoni->id]);
        }

        return redirect()->route('admin.testimonis.index');
    }

    public function edit(Testimoni $testimoni)
    {
        abort_if(Gate::denies('testimoni_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $testimoni->load('user');

        return view('admin.testimonis.edit', compact('testimoni', 'users'));
    }

    public function update(UpdateTestimoniRequest $request, Testimoni $testimoni)
    {
        $testimoni->update($request->all());

        return redirect()->route('admin.testimonis.index');
    }

    public function show(Testimoni $testimoni)
    {
        abort_if(Gate::denies('testimoni_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $testimoni->load('user');

        return view('admin.testimonis.show', compact('testimoni'));
    }

    public function destroy(Testimoni $testimoni)
    {
        abort_if(Gate::denies('testimoni_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $testimoni->delete();

        return back();
    }

    public function massDestroy(MassDestroyTestimoniRequest $request)
    {
        $testimonis = Testimoni::find(request('ids'));

        foreach ($testimonis as $testimoni) {
            $testimoni->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('testimoni_create') && Gate::denies('testimoni_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Testimoni();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
