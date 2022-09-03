@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.emergencyContact.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.emergency-contacts.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">{{ trans('cruds.emergencyContact.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}">
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.emergencyContact.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="relationship">{{ trans('cruds.emergencyContact.fields.relationship') }}</label>
                <input class="form-control {{ $errors->has('relationship') ? 'is-invalid' : '' }}" type="text" name="relationship" id="relationship" value="{{ old('relationship', '') }}">
                @if($errors->has('relationship'))
                    <div class="invalid-feedback">
                        {{ $errors->first('relationship') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.emergencyContact.fields.relationship_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="candidate_id">{{ trans('cruds.emergencyContact.fields.candidate') }}</label>
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
                <span class="help-block">{{ trans('cruds.emergencyContact.fields.candidate_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="contact_number">{{ trans('cruds.emergencyContact.fields.contact_number') }}</label>
                <input class="form-control {{ $errors->has('contact_number') ? 'is-invalid' : '' }}" type="text" name="contact_number" id="contact_number" value="{{ old('contact_number', '') }}">
                @if($errors->has('contact_number'))
                    <div class="invalid-feedback">
                        {{ $errors->first('contact_number') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.emergencyContact.fields.contact_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="e_mail_address">{{ trans('cruds.emergencyContact.fields.e_mail_address') }}</label>
                <input class="form-control {{ $errors->has('e_mail_address') ? 'is-invalid' : '' }}" type="text" name="e_mail_address" id="e_mail_address" value="{{ old('e_mail_address', '') }}">
                @if($errors->has('e_mail_address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('e_mail_address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.emergencyContact.fields.e_mail_address_helper') }}</span>
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