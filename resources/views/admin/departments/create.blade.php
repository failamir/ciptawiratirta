@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.department.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.departments.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="ship_id">{{ trans('cruds.department.fields.ship') }}</label>
                <select class="form-control select2 {{ $errors->has('ship') ? 'is-invalid' : '' }}" name="ship_id" id="ship_id">
                    @foreach($ships as $id => $entry)
                        <option value="{{ $id }}" {{ old('ship_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('ship'))
                    <div class="invalid-feedback">
                        {{ $errors->first('ship') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.department.fields.ship_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="department_name">{{ trans('cruds.department.fields.department_name') }}</label>
                <input class="form-control {{ $errors->has('department_name') ? 'is-invalid' : '' }}" type="text" name="department_name" id="department_name" value="{{ old('department_name', '') }}">
                @if($errors->has('department_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('department_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.department.fields.department_name_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection