@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.experience.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.experiences.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.experience.fields.id') }}
                        </th>
                        <td>
                            {{ $experience->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.experience.fields.company_name') }}
                        </th>
                        <td>
                            {{ $experience->company_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.experience.fields.value') }}
                        </th>
                        <td>
                            {{ $experience->value }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.experience.fields.last_position') }}
                        </th>
                        <td>
                            {{ $experience->last_position }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.experience.fields.start_date') }}
                        </th>
                        <td>
                            {{ $experience->start_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.experience.fields.end_date') }}
                        </th>
                        <td>
                            {{ $experience->end_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.experience.fields.reason_leave') }}
                        </th>
                        <td>
                            {{ $experience->reason_leave }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.experiences.index') }}">
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
            <a class="nav-link" href="#experience_users" role="tab" data-toggle="tab">
                {{ trans('cruds.user.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="experience_users">
            @includeIf('admin.experiences.relationships.experienceUsers', ['users' => $experience->experienceUsers])
        </div>
    </div>
</div>

@endsection