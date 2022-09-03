@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.shipExperience.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.ship-experiences.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.shipExperience.fields.id') }}
                        </th>
                        <td>
                            {{ $shipExperience->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.shipExperience.fields.candidate') }}
                        </th>
                        <td>
                            {{ $shipExperience->candidate->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.shipExperience.fields.vessel_name') }}
                        </th>
                        <td>
                            {{ $shipExperience->vessel_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.shipExperience.fields.gt_loa') }}
                        </th>
                        <td>
                            {{ $shipExperience->gt_loa }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.shipExperience.fields.vessel_route') }}
                        </th>
                        <td>
                            {{ $shipExperience->vessel_route }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.shipExperience.fields.position') }}
                        </th>
                        <td>
                            {{ $shipExperience->position }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.shipExperience.fields.start_date') }}
                        </th>
                        <td>
                            {{ $shipExperience->start_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.shipExperience.fields.end_date') }}
                        </th>
                        <td>
                            {{ $shipExperience->end_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.shipExperience.fields.reason') }}
                        </th>
                        <td>
                            {!! $shipExperience->reason !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.shipExperience.fields.job') }}
                        </th>
                        <td>
                            {{ $shipExperience->job }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.shipExperience.fields.description') }}
                        </th>
                        <td>
                            {!! $shipExperience->description !!}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.ship-experiences.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection