@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.interview.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.interviews.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.interview.fields.id') }}
                        </th>
                        <td>
                            {{ $interview->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.interview.fields.date_interview') }}
                        </th>
                        <td>
                            {{ $interview->date_interview }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.interview.fields.link') }}
                        </th>
                        <td>
                            {{ $interview->link }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.interview.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\Interview::STATUS_SELECT[$interview->status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.interview.fields.candidate') }}
                        </th>
                        <td>
                            {{ $interview->candidate->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.interviews.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection