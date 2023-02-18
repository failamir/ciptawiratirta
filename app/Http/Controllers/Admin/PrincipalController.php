<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyPrincipalRequest;
use App\Http\Requests\StorePrincipalRequest;
use App\Http\Requests\UpdatePrincipalRequest;
use App\Models\Principal;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class PrincipalController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('principal_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $principals = Principal::with(['media'])->get();

        return view('admin.principals.index', compact('principals'));
    }

    public function create()
    {
        abort_if(Gate::denies('principal_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.principals.create');
    }

    public function store(StorePrincipalRequest $request)
    {
        $principal = Principal::create($request->all());

        if ($request->input('logo', false)) {
            $principal->addMedia(storage_path('tmp/uploads/' . basename($request->input('logo'))))->toMediaCollection('logo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $principal->id]);
        }

        return redirect()->route('admin.principals.index');
    }

    public function edit(Principal $principal)
    {
        abort_if(Gate::denies('principal_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.principals.edit', compact('principal'));
    }

    public function update(UpdatePrincipalRequest $request, Principal $principal)
    {
        $principal->update($request->all());

        if ($request->input('logo', false)) {
            if (!$principal->logo || $request->input('logo') !== $principal->logo->file_name) {
                if ($principal->logo) {
                    $principal->logo->delete();
                }
                $principal->addMedia(storage_path('tmp/uploads/' . basename($request->input('logo'))))->toMediaCollection('logo');
            }
        } elseif ($principal->logo) {
            $principal->logo->delete();
        }

        return redirect()->route('admin.principals.index');
    }

    public function show(Principal $principal)
    {
        abort_if(Gate::denies('principal_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $principal->load('principalShips', 'companyJobs');

        return view('admin.principals.show', compact('principal'));
    }

    public function destroy(Principal $principal)
    {
        abort_if(Gate::denies('principal_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $principal->delete();

        return back();
    }

    public function massDestroy(MassDestroyPrincipalRequest $request)
    {
        Principal::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('principal_create') && Gate::denies('principal_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Principal();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
