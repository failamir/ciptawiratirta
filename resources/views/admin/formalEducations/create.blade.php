@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.formalEducation.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.formal-educations.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="school_academy">{{ trans('cruds.formalEducation.fields.school_academy') }}</label>
                <input class="form-control {{ $errors->has('school_academy') ? 'is-invalid' : '' }}" type="text" name="school_academy" id="school_academy" value="{{ old('school_academy', '') }}">
                @if($errors->has('school_academy'))
                    <div class="invalid-feedback">
                        {{ $errors->first('school_academy') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.formalEducation.fields.school_academy_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="from_date">{{ trans('cruds.formalEducation.fields.from_date') }}</label>
                <input class="form-control date {{ $errors->has('from_date') ? 'is-invalid' : '' }}" type="text" name="from_date" id="from_date" value="{{ old('from_date') }}">
                @if($errors->has('from_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('from_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.formalEducation.fields.from_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="to_date">{{ trans('cruds.formalEducation.fields.to_date') }}</label>
                <input class="form-control date {{ $errors->has('to_date') ? 'is-invalid' : '' }}" type="text" name="to_date" id="to_date" value="{{ old('to_date') }}">
                @if($errors->has('to_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('to_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.formalEducation.fields.to_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="qualification_attained">{{ trans('cruds.formalEducation.fields.qualification_attained') }}</label>
                <input class="form-control {{ $errors->has('qualification_attained') ? 'is-invalid' : '' }}" type="text" name="qualification_attained" id="qualification_attained" value="{{ old('qualification_attained', '') }}">
                @if($errors->has('qualification_attained'))
                    <div class="invalid-feedback">
                        {{ $errors->first('qualification_attained') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.formalEducation.fields.qualification_attained_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="candidate_id">{{ trans('cruds.formalEducation.fields.candidate') }}</label>
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
                <span class="help-block">{{ trans('cruds.formalEducation.fields.candidate_helper') }}</span>
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