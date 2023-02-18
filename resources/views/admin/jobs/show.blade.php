@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.job.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.jobs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.job.fields.id') }}
                        </th>
                        <td>
                            {{ $job->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.job.fields.title') }}
                        </th>
                        <td>
                            {{ $job->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.job.fields.slug') }}
                        </th>
                        <td>
                            {{ $job->slug }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.job.fields.content') }}
                        </th>
                        <td>
                            {!! $job->content !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.job.fields.category') }}
                        </th>
                        <td>
                            {{ $job->category->department_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.job.fields.company') }}
                        </th>
                        <td>
                            {{ $job->company->principal_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.job.fields.job_type') }}
                        </th>
                        <td>
                            {{ $job->job_type->ship_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.job.fields.expiration_date') }}
                        </th>
                        <td>
                            {{ $job->expiration_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.job.fields.gender') }}
                        </th>
                        <td>
                            {{ App\Models\Job::GENDER_SELECT[$job->gender] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.job.fields.is_urgent') }}
                        </th>
                        <td>
                            {{ App\Models\Job::IS_URGENT_SELECT[$job->is_urgent] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.job.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\Job::STATUS_SELECT[$job->status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.job.fields.video') }}
                        </th>
                        <td>
                            {{ $job->video }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.job.fields.video_cover') }}
                        </th>
                        <td>
                            @if($job->video_cover)
                                <a href="{{ $job->video_cover->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $job->video_cover->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.jobs.index') }}">
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
            <a class="nav-link" href="#applied_position_sgps" role="tab" data-toggle="tab">
                {{ trans('cruds.sgp.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#approved_as_sgps" role="tab" data-toggle="tab">
                {{ trans('cruds.sgp.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="applied_position_sgps">
            @includeIf('admin.jobs.relationships.appliedPositionSgps', ['sgps' => $job->appliedPositionSgps])
        </div>
        <div class="tab-pane" role="tabpanel" id="approved_as_sgps">
            @includeIf('admin.jobs.relationships.approvedAsSgps', ['sgps' => $job->approvedAsSgps])
        </div>
    </div>
</div>

@endsection