@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.hotelExperience.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.hotel-experiences.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.hotelExperience.fields.id') }}
                        </th>
                        <td>
                            {{ $hotelExperience->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hotelExperience.fields.candidate') }}
                        </th>
                        <td>
                            {{ $hotelExperience->candidate->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hotelExperience.fields.hotel_name') }}
                        </th>
                        <td>
                            {{ $hotelExperience->hotel_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hotelExperience.fields.position') }}
                        </th>
                        <td>
                            {{ $hotelExperience->position }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hotelExperience.fields.start_date') }}
                        </th>
                        <td>
                            {{ $hotelExperience->start_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hotelExperience.fields.end_date') }}
                        </th>
                        <td>
                            {{ $hotelExperience->end_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hotelExperience.fields.reason') }}
                        </th>
                        <td>
                            {!! $hotelExperience->reason !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hotelExperience.fields.job') }}
                        </th>
                        <td>
                            {{ $hotelExperience->job }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hotelExperience.fields.description') }}
                        </th>
                        <td>
                            {!! $hotelExperience->description !!}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.hotel-experiences.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection