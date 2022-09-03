@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.nextOfKin.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.next-of-kins.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.nextOfKin.fields.id') }}
                        </th>
                        <td>
                            {{ $nextOfKin->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.nextOfKin.fields.candidate') }}
                        </th>
                        <td>
                            {{ $nextOfKin->candidate->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.nextOfKin.fields.name') }}
                        </th>
                        <td>
                            {{ $nextOfKin->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.nextOfKin.fields.relationship') }}
                        </th>
                        <td>
                            {{ $nextOfKin->relationship }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.nextOfKin.fields.place_birth') }}
                        </th>
                        <td>
                            {{ $nextOfKin->place_birth }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.nextOfKin.fields.date_of_birth') }}
                        </th>
                        <td>
                            {{ $nextOfKin->date_of_birth }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.nextOfKin.fields.signature') }}
                        </th>
                        <td>
                            @if($nextOfKin->signature)
                                <a href="{{ $nextOfKin->signature->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.next-of-kins.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection