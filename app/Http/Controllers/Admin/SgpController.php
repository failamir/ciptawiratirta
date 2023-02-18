<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroySgpRequest;
use App\Http\Requests\StoreSgpRequest;
use App\Http\Requests\UpdateSgpRequest;
use App\Models\Department;
use App\Models\Job;
use App\Models\Sgp;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SgpController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('sgp_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sgps = Sgp::with(['candidate', 'applied_position', 'department', 'int_by', 'approved_as'])->get();

        return view('admin.sgps.index', compact('sgps'));
    }

    public function create()
    {
        abort_if(Gate::denies('sgp_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $candidates = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $applied_positions = Job::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $departments = Department::pluck('department_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $int_bies = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $approved_as = Job::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.sgps.create', compact('applied_positions', 'approved_as', 'candidates', 'departments', 'int_bies'));
    }

    public function store(StoreSgpRequest $request)
    {
        $sgp = Sgp::create($request->all());

        return redirect()->route('admin.sgps.index');
    }

    public function edit(Sgp $sgp)
    {
        abort_if(Gate::denies('sgp_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $candidates = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $applied_positions = Job::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $departments = Department::pluck('department_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $int_bies = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $approved_as = Job::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $sgp->load('candidate', 'applied_position', 'department', 'int_by', 'approved_as');

        return view('admin.sgps.edit', compact('applied_positions', 'approved_as', 'candidates', 'departments', 'int_bies', 'sgp'));
    }

    public function update(UpdateSgpRequest $request, Sgp $sgp)
    {
        $sgp->update($request->all());

        return redirect()->route('admin.sgps.index');
    }

    public function show(Sgp $sgp)
    {
        abort_if(Gate::denies('sgp_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sgp->load('candidate', 'applied_position', 'department', 'int_by', 'approved_as');

        return view('admin.sgps.show', compact('sgp'));
    }

    public function destroy(Sgp $sgp)
    {
        abort_if(Gate::denies('sgp_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sgp->delete();

        return back();
    }

    public function massDestroy(MassDestroySgpRequest $request)
    {
        Sgp::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
