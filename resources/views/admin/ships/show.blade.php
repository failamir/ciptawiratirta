@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.ship.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.ships.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.ship.fields.id') }}
                        </th>
                        <td>
                            {{ $ship->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ship.fields.ship_name') }}
                        </th>
                        <td>
                            {{ $ship->ship_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ship.fields.principal') }}
                        </th>
                        <td>
                            {{ $ship->principal->principal_name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.ships.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#ship_departments" role="tab" data-toggle="tab">
                {{ trans('cruds.department.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#job_type_jobs" role="tab" data-toggle="tab">
                {{ trans('cruds.job.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="ship_departments">
            @includeIf('admin.ships.relationships.shipDepartments', ['departments' => $ship->shipDepartments])
        </div>
        <div class="tab-pane" role="tabpanel" id="job_type_jobs">
            @includeIf('admin.ships.relationships.jobTypeJobs', ['jobs' => $ship->jobTypeJobs])
        </div>
    </div>
</div>

@endsection