@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.experience.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.experiences.update", [$experience->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="company_name">{{ trans('cruds.experience.fields.company_name') }}</label>
                <input class="form-control {{ $errors->has('company_name') ? 'is-invalid' : '' }}" type="text" name="company_name" id="company_name" value="{{ old('company_name', $experience->company_name) }}">
                @if($errors->has('company_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('company_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.experience.fields.company_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="value">{{ trans('cruds.experience.fields.value') }}</label>
                <input class="form-control {{ $errors->has('value') ? 'is-invalid' : '' }}" type="text" name="value" id="value" value="{{ old('value', $experience->value) }}">
                @if($errors->has('value'))
                    <div class="invalid-feedback">
                        {{ $errors->first('value') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.experience.fields.value_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="last_position">{{ trans('cruds.experience.fields.last_position') }}</label>
                <input class="form-control {{ $errors->has('last_position') ? 'is-invalid' : '' }}" type="text" name="last_position" id="last_position" value="{{ old('last_position', $experience->last_position) }}">
                @if($errors->has('last_position'))
                    <div class="invalid-feedback">
                        {{ $errors->first('last_position') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.experience.fields.last_position_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="start_date">{{ trans('cruds.experience.fields.start_date') }}</label>
                <input class="form-control date {{ $errors->has('start_date') ? 'is-invalid' : '' }}" type="text" name="start_date" id="start_date" value="{{ old('start_date', $experience->start_date) }}">
                @if($errors->has('start_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('start_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.experience.fields.start_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="end_date">{{ trans('cruds.experience.fields.end_date') }}</label>
                <input class="form-control date {{ $errors->has('end_date') ? 'is-invalid' : '' }}" type="text" name="end_date" id="end_date" value="{{ old('end_date', $experience->end_date) }}">
                @if($errors->has('end_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('end_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.experience.fields.end_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="reason_leave">{{ trans('cruds.experience.fields.reason_leave') }}</label>
                <input class="form-control {{ $errors->has('reason_leave') ? 'is-invalid' : '' }}" type="text" name="reason_leave" id="reason_leave" value="{{ old('reason_leave', $experience->reason_leave) }}">
                @if($errors->has('reason_leave'))
                    <div class="invalid-feedback">
                        {{ $errors->first('reason_leave') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.experience.fields.reason_leave_helper') }}</span>
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