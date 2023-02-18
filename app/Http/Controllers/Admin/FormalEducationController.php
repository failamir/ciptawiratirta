<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyFormalEducationRequest;
use App\Http\Requests\StoreFormalEducationRequest;
use App\Http\Requests\UpdateFormalEducationRequest;
use App\Models\FormalEducation;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FormalEducationController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('formal_education_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $formalEducations = FormalEducation::with(['candidate'])->get();

        return view('admin.formalEducations.index', compact('formalEducations'));
    }

    public function create()
    {
        abort_if(Gate::denies('formal_education_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $candidates = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.formalEducations.create', compact('candidates'));
    }

    public function store(StoreFormalEducationRequest $request)
    {
        $formalEducation = FormalEducation::create($request->all());

        return redirect()->route('admin.formal-educations.index');
    }

    public function edit(FormalEducation $formalEducation)
    {
        abort_if(Gate::denies('formal_education_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $candidates = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $formalEducation->load('candidate');

        return view('admin.formalEducations.edit', compact('candidates', 'formalEducation'));
    }

    public function update(UpdateFormalEducationRequest $request, FormalEducation $formalEducation)
    {
        $formalEducation->update($request->all());

        return redirect()->route('admin.formal-educations.index');
    }

    public function show(FormalEducation $formalEducation)
    {
        abort_if(Gate::denies('formal_education_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $formalEducation->load('candidate');

        return view('admin.formalEducations.show', compact('formalEducation'));
    }

    public function destroy(FormalEducation $formalEducation)
    {
        abort_if(Gate::denies('formal_education_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $formalEducation->delete();

        return back();
    }

    public function massDestroy(MassDestroyFormalEducationRequest $request)
    {
        FormalEducation::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
