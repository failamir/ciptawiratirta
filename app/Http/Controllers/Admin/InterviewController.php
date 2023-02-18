<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyInterviewRequest;
use App\Http\Requests\StoreInterviewRequest;
use App\Http\Requests\UpdateInterviewRequest;
use App\Models\Interview;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class InterviewController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('interview_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $interviews = Interview::with(['candidate'])->get();

        return view('admin.interviews.index', compact('interviews'));
    }

    public function create()
    {
        abort_if(Gate::denies('interview_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $candidates = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.interviews.create', compact('candidates'));
    }

    public function store(StoreInterviewRequest $request)
    {
        $interview = Interview::create($request->all());

        return redirect()->route('admin.interviews.index');
    }

    public function edit(Interview $interview)
    {
        abort_if(Gate::denies('interview_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $candidates = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $interview->load('candidate');

        return view('admin.interviews.edit', compact('candidates', 'interview'));
    }

    public function update(UpdateInterviewRequest $request, Interview $interview)
    {
        $interview->update($request->all());

        return redirect()->route('admin.interviews.index');
    }

    public function show(Interview $interview)
    {
        abort_if(Gate::denies('interview_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $interview->load('candidate');

        return view('admin.interviews.show', compact('interview'));
    }

    public function destroy(Interview $interview)
    {
        abort_if(Gate::denies('interview_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $interview->delete();

        return back();
    }

    public function massDestroy(MassDestroyInterviewRequest $request)
    {
        Interview::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
