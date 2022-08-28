@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.sgp.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.sgps.update", [$sgp->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="remarks">{{ trans('cruds.sgp.fields.remarks') }}</label>
                <input class="form-control {{ $errors->has('remarks') ? 'is-invalid' : '' }}" type="text" name="remarks" id="remarks" value="{{ old('remarks', $sgp->remarks) }}">
                @if($errors->has('remarks'))
                    <div class="invalid-feedback">
                        {{ $errors->first('remarks') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sgp.fields.remarks_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="crew_code">{{ trans('cruds.sgp.fields.crew_code') }}</label>
                <input class="form-control {{ $errors->has('crew_code') ? 'is-invalid' : '' }}" type="text" name="crew_code" id="crew_code" value="{{ old('crew_code', $sgp->crew_code) }}">
                @if($errors->has('crew_code'))
                    <div class="invalid-feedback">
                        {{ $errors->first('crew_code') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sgp.fields.crew_code_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="date_of_entry">{{ trans('cruds.sgp.fields.date_of_entry') }}</label>
                <input class="form-control date {{ $errors->has('date_of_entry') ? 'is-invalid' : '' }}" type="text" name="date_of_entry" id="date_of_entry" value="{{ old('date_of_entry', $sgp->date_of_entry) }}">
                @if($errors->has('date_of_entry'))
                    <div class="invalid-feedback">
                        {{ $errors->first('date_of_entry') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sgp.fields.date_of_entry_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.sgp.fields.source') }}</label>
                <select class="form-control {{ $errors->has('source') ? 'is-invalid' : '' }}" name="source" id="source">
                    <option value disabled {{ old('source', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Sgp::SOURCE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('source', $sgp->source) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('source'))
                    <div class="invalid-feedback">
                        {{ $errors->first('source') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sgp.fields.source_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="candidate_id">{{ trans('cruds.sgp.fields.candidate') }}</label>
                <select class="form-control select2 {{ $errors->has('candidate') ? 'is-invalid' : '' }}" name="candidate_id" id="candidate_id">
                    @foreach($candidates as $id => $entry)
                        <option value="{{ $id }}" {{ (old('candidate_id') ? old('candidate_id') : $sgp->candidate->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('candidate'))
                    <div class="invalid-feedback">
                        {{ $errors->first('candidate') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sgp.fields.candidate_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="applied_position_id">{{ trans('cruds.sgp.fields.applied_position') }}</label>
                <select class="form-control select2 {{ $errors->has('applied_position') ? 'is-invalid' : '' }}" name="applied_position_id" id="applied_position_id">
                    @foreach($applied_positions as $id => $entry)
                        <option value="{{ $id }}" {{ (old('applied_position_id') ? old('applied_position_id') : $sgp->applied_position->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('applied_position'))
                    <div class="invalid-feedback">
                        {{ $errors->first('applied_position') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sgp.fields.applied_position_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="department_id">{{ trans('cruds.sgp.fields.department') }}</label>
                <select class="form-control select2 {{ $errors->has('department') ? 'is-invalid' : '' }}" name="department_id" id="department_id">
                    @foreach($departments as $id => $entry)
                        <option value="{{ $id }}" {{ (old('department_id') ? old('department_id') : $sgp->department->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('department'))
                    <div class="invalid-feedback">
                        {{ $errors->first('department') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sgp.fields.department_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="gender">{{ trans('cruds.sgp.fields.gender') }}</label>
                <input class="form-control {{ $errors->has('gender') ? 'is-invalid' : '' }}" type="text" name="gender" id="gender" value="{{ old('gender', $sgp->gender) }}">
                @if($errors->has('gender'))
                    <div class="invalid-feedback">
                        {{ $errors->first('gender') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sgp.fields.gender_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="d_o_b">{{ trans('cruds.sgp.fields.d_o_b') }}</label>
                <input class="form-control {{ $errors->has('d_o_b') ? 'is-invalid' : '' }}" type="text" name="d_o_b" id="d_o_b" value="{{ old('d_o_b', $sgp->d_o_b) }}">
                @if($errors->has('d_o_b'))
                    <div class="invalid-feedback">
                        {{ $errors->first('d_o_b') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sgp.fields.d_o_b_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="age">{{ trans('cruds.sgp.fields.age') }}</label>
                <input class="form-control {{ $errors->has('age') ? 'is-invalid' : '' }}" type="text" name="age" id="age" value="{{ old('age', $sgp->age) }}">
                @if($errors->has('age'))
                    <div class="invalid-feedback">
                        {{ $errors->first('age') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sgp.fields.age_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="vc_yf">{{ trans('cruds.sgp.fields.vc_yf') }}</label>
                <input class="form-control {{ $errors->has('vc_yf') ? 'is-invalid' : '' }}" type="text" name="vc_yf" id="vc_yf" value="{{ old('vc_yf', $sgp->vc_yf) }}">
                @if($errors->has('vc_yf'))
                    <div class="invalid-feedback">
                        {{ $errors->first('vc_yf') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sgp.fields.vc_yf_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="vc_covid">{{ trans('cruds.sgp.fields.vc_covid') }}</label>
                <input class="form-control {{ $errors->has('vc_covid') ? 'is-invalid' : '' }}" type="text" name="vc_covid" id="vc_covid" value="{{ old('vc_covid', $sgp->vc_covid) }}">
                @if($errors->has('vc_covid'))
                    <div class="invalid-feedback">
                        {{ $errors->first('vc_covid') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sgp.fields.vc_covid_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cid">{{ trans('cruds.sgp.fields.cid') }}</label>
                <input class="form-control {{ $errors->has('cid') ? 'is-invalid' : '' }}" type="text" name="cid" id="cid" value="{{ old('cid', $sgp->cid) }}">
                @if($errors->has('cid'))
                    <div class="invalid-feedback">
                        {{ $errors->first('cid') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sgp.fields.cid_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="coc">{{ trans('cruds.sgp.fields.coc') }}</label>
                <input class="form-control {{ $errors->has('coc') ? 'is-invalid' : '' }}" type="text" name="coc" id="coc" value="{{ old('coc', $sgp->coc) }}">
                @if($errors->has('coc'))
                    <div class="invalid-feedback">
                        {{ $errors->first('coc') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sgp.fields.coc_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="rating_able">{{ trans('cruds.sgp.fields.rating_able') }}</label>
                <input class="form-control {{ $errors->has('rating_able') ? 'is-invalid' : '' }}" type="text" name="rating_able" id="rating_able" value="{{ old('rating_able', $sgp->rating_able) }}">
                @if($errors->has('rating_able'))
                    <div class="invalid-feedback">
                        {{ $errors->first('rating_able') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sgp.fields.rating_able_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ccm">{{ trans('cruds.sgp.fields.ccm') }}</label>
                <input class="form-control {{ $errors->has('ccm') ? 'is-invalid' : '' }}" type="text" name="ccm" id="ccm" value="{{ old('ccm', $sgp->ccm) }}">
                @if($errors->has('ccm'))
                    <div class="invalid-feedback">
                        {{ $errors->first('ccm') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sgp.fields.ccm_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="experience">{{ trans('cruds.sgp.fields.experience') }}</label>
                <input class="form-control {{ $errors->has('experience') ? 'is-invalid' : '' }}" type="text" name="experience" id="experience" value="{{ old('experience', $sgp->experience) }}">
                @if($errors->has('experience'))
                    <div class="invalid-feedback">
                        {{ $errors->first('experience') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sgp.fields.experience_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="application_form">{{ trans('cruds.sgp.fields.application_form') }}</label>
                <input class="form-control {{ $errors->has('application_form') ? 'is-invalid' : '' }}" type="text" name="application_form" id="application_form" value="{{ old('application_form', $sgp->application_form) }}">
                @if($errors->has('application_form'))
                    <div class="invalid-feedback">
                        {{ $errors->first('application_form') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sgp.fields.application_form_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="contact_no">{{ trans('cruds.sgp.fields.contact_no') }}</label>
                <input class="form-control {{ $errors->has('contact_no') ? 'is-invalid' : '' }}" type="text" name="contact_no" id="contact_no" value="{{ old('contact_no', $sgp->contact_no) }}">
                @if($errors->has('contact_no'))
                    <div class="invalid-feedback">
                        {{ $errors->first('contact_no') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sgp.fields.contact_no_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="email">{{ trans('cruds.sgp.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="text" name="email" id="email" value="{{ old('email', $sgp->email) }}">
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sgp.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="int_by_id">{{ trans('cruds.sgp.fields.int_by') }}</label>
                <select class="form-control select2 {{ $errors->has('int_by') ? 'is-invalid' : '' }}" name="int_by_id" id="int_by_id">
                    @foreach($int_bies as $id => $entry)
                        <option value="{{ $id }}" {{ (old('int_by_id') ? old('int_by_id') : $sgp->int_by->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('int_by'))
                    <div class="invalid-feedback">
                        {{ $errors->first('int_by') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sgp.fields.int_by_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="int_date">{{ trans('cruds.sgp.fields.int_date') }}</label>
                <input class="form-control date {{ $errors->has('int_date') ? 'is-invalid' : '' }}" type="text" name="int_date" id="int_date" value="{{ old('int_date', $sgp->int_date) }}">
                @if($errors->has('int_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('int_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sgp.fields.int_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.sgp.fields.int_result') }}</label>
                @foreach(App\Models\Sgp::INT_RESULT_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('int_result') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="int_result_{{ $key }}" name="int_result" value="{{ $key }}" {{ old('int_result', $sgp->int_result) === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="int_result_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('int_result'))
                    <div class="invalid-feedback">
                        {{ $errors->first('int_result') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sgp.fields.int_result_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="approved_as_id">{{ trans('cruds.sgp.fields.approved_as') }}</label>
                <select class="form-control select2 {{ $errors->has('approved_as') ? 'is-invalid' : '' }}" name="approved_as_id" id="approved_as_id">
                    @foreach($approved_as as $id => $entry)
                        <option value="{{ $id }}" {{ (old('approved_as_id') ? old('approved_as_id') : $sgp->approved_as->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('approved_as'))
                    <div class="invalid-feedback">
                        {{ $errors->first('approved_as') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sgp.fields.approved_as_helper') }}</span>
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