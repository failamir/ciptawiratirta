@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.sgp.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.sgps.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.sgp.fields.id') }}
                        </th>
                        <td>
                            {{ $sgp->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sgp.fields.remarks') }}
                        </th>
                        <td>
                            {{ $sgp->remarks }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sgp.fields.crew_code') }}
                        </th>
                        <td>
                            {{ $sgp->crew_code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sgp.fields.date_of_entry') }}
                        </th>
                        <td>
                            {{ $sgp->date_of_entry }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sgp.fields.source') }}
                        </th>
                        <td>
                            {{ App\Models\Sgp::SOURCE_SELECT[$sgp->source] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sgp.fields.candidate') }}
                        </th>
                        <td>
                            {{ $sgp->candidate->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sgp.fields.applied_position') }}
                        </th>
                        <td>
                            {{ $sgp->applied_position->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sgp.fields.department') }}
                        </th>
                        <td>
                            {{ $sgp->department->department_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sgp.fields.gender') }}
                        </th>
                        <td>
                            {{ $sgp->gender }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sgp.fields.d_o_b') }}
                        </th>
                        <td>
                            {{ $sgp->d_o_b }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sgp.fields.age') }}
                        </th>
                        <td>
                            {{ $sgp->age }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sgp.fields.vc_yf') }}
                        </th>
                        <td>
                            {{ $sgp->vc_yf }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sgp.fields.vc_covid') }}
                        </th>
                        <td>
                            {{ $sgp->vc_covid }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sgp.fields.cid') }}
                        </th>
                        <td>
                            {{ $sgp->cid }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sgp.fields.coc') }}
                        </th>
                        <td>
                            {{ $sgp->coc }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sgp.fields.rating_able') }}
                        </th>
                        <td>
                            {{ $sgp->rating_able }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sgp.fields.ccm') }}
                        </th>
                        <td>
                            {{ $sgp->ccm }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sgp.fields.experience') }}
                        </th>
                        <td>
                            {{ $sgp->experience }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sgp.fields.application_form') }}
                        </th>
                        <td>
                            {{ $sgp->application_form }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sgp.fields.contact_no') }}
                        </th>
                        <td>
                            {{ $sgp->contact_no }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sgp.fields.email') }}
                        </th>
                        <td>
                            {{ $sgp->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sgp.fields.int_by') }}
                        </th>
                        <td>
                            {{ $sgp->int_by->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sgp.fields.int_date') }}
                        </th>
                        <td>
                            {{ $sgp->int_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sgp.fields.int_result') }}
                        </th>
                        <td>
                            {{ App\Models\Sgp::INT_RESULT_RADIO[$sgp->int_result] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sgp.fields.approved_as') }}
                        </th>
                        <td>
                            {{ $sgp->approved_as->title ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.sgps.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection