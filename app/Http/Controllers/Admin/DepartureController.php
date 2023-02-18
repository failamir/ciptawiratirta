<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyDepartureRequest;
use App\Http\Requests\StoreDepartureRequest;
use App\Http\Requests\UpdateDepartureRequest;
use App\Models\Departure;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DepartureController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('departure_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $departures = Departure::with(['candidate'])->get();

        return view('admin.departures.index', compact('departures'));
    }

    public function create()
    {
        abort_if(Gate::denies('departure_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $candidates = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.departures.create', compact('candidates'));
    }

    public function store(StoreDepartureRequest $request)
    {
        $departure = Departure::create($request->all());

        return redirect()->route('admin.departures.index');
    }

    public function edit(Departure $departure)
    {
        abort_if(Gate::denies('departure_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $candidates = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $departure->load('candidate');

        return view('admin.departures.edit', compact('candidates', 'departure'));
    }

    public function update(UpdateDepartureRequest $request, Departure $departure)
    {
        $departure->update($request->all());

        return redirect()->route('admin.departures.index');
    }

    public function show(Departure $departure)
    {
        abort_if(Gate::denies('departure_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $departure->load('candidate');

        return view('admin.departures.show', compact('departure'));
    }

    public function destroy(Departure $departure)
    {
        abort_if(Gate::denies('departure_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $departure->delete();

        return back();
    }

    public function massDestroy(MassDestroyDepartureRequest $request)
    {
        Departure::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
