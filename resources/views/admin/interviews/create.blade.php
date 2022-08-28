@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.interview.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.interviews.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="date_interview">{{ trans('cruds.interview.fields.date_interview') }}</label>
                <input class="form-control date {{ $errors->has('date_interview') ? 'is-invalid' : '' }}" type="text" name="date_interview" id="date_interview" value="{{ old('date_interview') }}">
                @if($errors->has('date_interview'))
                    <div class="invalid-feedback">
                        {{ $errors->first('date_interview') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.interview.fields.date_interview_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="link">{{ trans('cruds.interview.fields.link') }}</label>
                <input class="form-control {{ $errors->has('link') ? 'is-invalid' : '' }}" type="text" name="link" id="link" value="{{ old('link', '') }}">
                @if($errors->has('link'))
                    <div class="invalid-feedback">
                        {{ $errors->first('link') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.interview.fields.link_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.interview.fields.status') }}</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status">
                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Interview::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.interview.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="candidate_id">{{ trans('cruds.interview.fields.candidate') }}</label>
                <select class="form-control select2 {{ $errors->has('candidate') ? 'is-invalid' : '' }}" name="candidate_id" id="candidate_id">
                    @foreach($candidates as $id => $entry)
                        <option value="{{ $id }}" {{ old('candidate_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('candidate'))
                    <div class="invalid-feedback">
                        {{ $errors->first('candidate') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.interview.fields.candidate_helper') }}</span>
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