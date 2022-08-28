@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.principal.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.principals.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.principal.fields.id') }}
                        </th>
                        <td>
                            {{ $principal->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.principal.fields.principal_name') }}
                        </th>
                        <td>
                            {{ $principal->principal_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.principal.fields.logo') }}
                        </th>
                        <td>
                            @if($principal->logo)
                                <a href="{{ $principal->logo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $principal->logo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.principals.index') }}">
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
            <a class="nav-link" href="#principal_ships" role="tab" data-toggle="tab">
                {{ trans('cruds.ship.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#company_jobs" role="tab" data-toggle="tab">
                {{ trans('cruds.job.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="principal_ships">
            @includeIf('admin.principals.relationships.principalShips', ['ships' => $principal->principalShips])
        </div>
        <div class="tab-pane" role="tabpanel" id="company_jobs">
            @includeIf('admin.principals.relationships.companyJobs', ['jobs' => $principal->companyJobs])
        </div>
    </div>
</div>

@endsection