<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreTestimoniRequest;
use App\Http\Requests\UpdateTestimoniRequest;
use App\Http\Resources\Admin\TestimoniResource;
use App\Models\Testimoni;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TestimoniApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('testimoni_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TestimoniResource(Testimoni::with(['user'])->get());
    }

    public function store(StoreTestimoniRequest $request)
    {
        $testimoni = Testimoni::create($request->all());

        return (new TestimoniResource($testimoni))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Testimoni $testimoni)
    {
        abort_if(Gate::denies('testimoni_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TestimoniResource($testimoni->load(['user']));
    }

    public function update(UpdateTestimoniRequest $request, Testimoni $testimoni)
    {
        $testimoni->update($request->all());

        return (new TestimoniResource($testimoni))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Testimoni $testimoni)
    {
        abort_if(Gate::denies('testimoni_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $testimoni->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
