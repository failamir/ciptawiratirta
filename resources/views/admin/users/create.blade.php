@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.user.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.users.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.user.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="first_name">{{ trans('cruds.user.fields.first_name') }}</label>
                <input class="form-control {{ $errors->has('first_name') ? 'is-invalid' : '' }}" type="text" name="first_name" id="first_name" value="{{ old('first_name', '') }}">
                @if($errors->has('first_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('first_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.first_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="last_name">{{ trans('cruds.user.fields.last_name') }}</label>
                <input class="form-control {{ $errors->has('last_name') ? 'is-invalid' : '' }}" type="text" name="last_name" id="last_name" value="{{ old('last_name', '') }}">
                @if($errors->has('last_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('last_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.last_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.user.fields.gender') }}</label>
                <select class="form-control {{ $errors->has('gender') ? 'is-invalid' : '' }}" name="gender" id="gender">
                    <option value disabled {{ old('gender', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\User::GENDER_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('gender', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('gender'))
                    <div class="invalid-feedback">
                        {{ $errors->first('gender') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.gender_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="email">{{ trans('cruds.user.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email') }}" required>
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="password">{{ trans('cruds.user.fields.password') }}</label>
                <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" type="password" name="password" id="password" required>
                @if($errors->has('password'))
                    <div class="invalid-feedback">
                        {{ $errors->first('password') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.password_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="roles">{{ trans('cruds.user.fields.roles') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('roles') ? 'is-invalid' : '' }}" name="roles[]" id="roles" multiple required>
                    @foreach($roles as $id => $role)
                        <option value="{{ $id }}" {{ in_array($id, old('roles', [])) ? 'selected' : '' }}>{{ $role }}</option>
                    @endforeach
                </select>
                @if($errors->has('roles'))
                    <div class="invalid-feedback">
                        {{ $errors->first('roles') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.roles_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ktp">{{ trans('cruds.user.fields.ktp') }}</label>
                <input class="form-control {{ $errors->has('ktp') ? 'is-invalid' : '' }}" type="text" name="ktp" id="ktp" value="{{ old('ktp', '') }}">
                @if($errors->has('ktp'))
                    <div class="invalid-feedback">
                        {{ $errors->first('ktp') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.ktp_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="passport">{{ trans('cruds.user.fields.passport') }}</label>
                <input class="form-control {{ $errors->has('passport') ? 'is-invalid' : '' }}" type="text" name="passport" id="passport" value="{{ old('passport', '') }}">
                @if($errors->has('passport'))
                    <div class="invalid-feedback">
                        {{ $errors->first('passport') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.passport_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="visa">{{ trans('cruds.user.fields.visa') }}</label>
                <input class="form-control {{ $errors->has('visa') ? 'is-invalid' : '' }}" type="text" name="visa" id="visa" value="{{ old('visa', '') }}">
                @if($errors->has('visa'))
                    <div class="invalid-feedback">
                        {{ $errors->first('visa') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.visa_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="bst_ccm">{{ trans('cruds.user.fields.bst_ccm') }}</label>
                <input class="form-control {{ $errors->has('bst_ccm') ? 'is-invalid' : '' }}" type="text" name="bst_ccm" id="bst_ccm" value="{{ old('bst_ccm', '') }}">
                @if($errors->has('bst_ccm'))
                    <div class="invalid-feedback">
                        {{ $errors->first('bst_ccm') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.bst_ccm_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cv">{{ trans('cruds.user.fields.cv') }}</label>
                <div class="needsclick dropzone {{ $errors->has('cv') ? 'is-invalid' : '' }}" id="cv-dropzone">
                </div>
                @if($errors->has('cv'))
                    <div class="invalid-feedback">
                        {{ $errors->first('cv') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.cv_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="skk">{{ trans('cruds.user.fields.skk') }}</label>
                <div class="needsclick dropzone {{ $errors->has('skk') ? 'is-invalid' : '' }}" id="skk-dropzone">
                </div>
                @if($errors->has('skk'))
                    <div class="invalid-feedback">
                        {{ $errors->first('skk') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.skk_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="country">{{ trans('cruds.user.fields.country') }}</label>
                <input class="form-control {{ $errors->has('country') ? 'is-invalid' : '' }}" type="text" name="country" id="country" value="{{ old('country', '') }}">
                @if($errors->has('country'))
                    <div class="invalid-feedback">
                        {{ $errors->first('country') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.country_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="state">{{ trans('cruds.user.fields.state') }}</label>
                <input class="form-control {{ $errors->has('state') ? 'is-invalid' : '' }}" type="text" name="state" id="state" value="{{ old('state', '') }}">
                @if($errors->has('state'))
                    <div class="invalid-feedback">
                        {{ $errors->first('state') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.state_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="city">{{ trans('cruds.user.fields.city') }}</label>
                <input class="form-control {{ $errors->has('city') ? 'is-invalid' : '' }}" type="text" name="city" id="city" value="{{ old('city', '') }}">
                @if($errors->has('city'))
                    <div class="invalid-feedback">
                        {{ $errors->first('city') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.city_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="address">{{ trans('cruds.user.fields.address') }}</label>
                <input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" type="text" name="address" id="address" value="{{ old('address', '') }}">
                @if($errors->has('address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.address_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="b_o_d">{{ trans('cruds.user.fields.b_o_d') }}</label>
                <input class="form-control date {{ $errors->has('b_o_d') ? 'is-invalid' : '' }}" type="text" name="b_o_d" id="b_o_d" value="{{ old('b_o_d') }}">
                @if($errors->has('b_o_d'))
                    <div class="invalid-feedback">
                        {{ $errors->first('b_o_d') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.b_o_d_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="office_registered_id">{{ trans('cruds.user.fields.office_registered') }}</label>
                <select class="form-control select2 {{ $errors->has('office_registered') ? 'is-invalid' : '' }}" name="office_registered_id" id="office_registered_id">
                    @foreach($office_registereds as $id => $entry)
                        <option value="{{ $id }}" {{ old('office_registered_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('office_registered'))
                    <div class="invalid-feedback">
                        {{ $errors->first('office_registered') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.office_registered_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.user.fields.vc_yf') }}</label>
                @foreach(App\Models\User::VC_YF_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('vc_yf') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="vc_yf_{{ $key }}" name="vc_yf" value="{{ $key }}" {{ old('vc_yf', '') === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="vc_yf_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('vc_yf'))
                    <div class="invalid-feedback">
                        {{ $errors->first('vc_yf') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.vc_yf_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.user.fields.vc_covid') }}</label>
                @foreach(App\Models\User::VC_COVID_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('vc_covid') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="vc_covid_{{ $key }}" name="vc_covid" value="{{ $key }}" {{ old('vc_covid', '') === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="vc_covid_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('vc_covid'))
                    <div class="invalid-feedback">
                        {{ $errors->first('vc_covid') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.vc_covid_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="age">{{ trans('cruds.user.fields.age') }}</label>
                <input class="form-control {{ $errors->has('age') ? 'is-invalid' : '' }}" type="text" name="age" id="age" value="{{ old('age', '') }}">
                @if($errors->has('age'))
                    <div class="invalid-feedback">
                        {{ $errors->first('age') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.age_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.user.fields.cid') }}</label>
                @foreach(App\Models\User::CID_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('cid') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="cid_{{ $key }}" name="cid" value="{{ $key }}" {{ old('cid', '') === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="cid_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('cid'))
                    <div class="invalid-feedback">
                        {{ $errors->first('cid') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.cid_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.user.fields.coc') }}</label>
                <select class="form-control {{ $errors->has('coc') ? 'is-invalid' : '' }}" name="coc" id="coc">
                    <option value disabled {{ old('coc', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\User::COC_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('coc', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('coc'))
                    <div class="invalid-feedback">
                        {{ $errors->first('coc') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.coc_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.user.fields.rating_able') }}</label>
                @foreach(App\Models\User::RATING_ABLE_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('rating_able') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="rating_able_{{ $key }}" name="rating_able" value="{{ $key }}" {{ old('rating_able', '') === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="rating_able_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('rating_able'))
                    <div class="invalid-feedback">
                        {{ $errors->first('rating_able') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.rating_able_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.user.fields.ccm') }}</label>
                @foreach(App\Models\User::CCM_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('ccm') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="ccm_{{ $key }}" name="ccm" value="{{ $key }}" {{ old('ccm', '') === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="ccm_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('ccm'))
                    <div class="invalid-feedback">
                        {{ $errors->first('ccm') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.ccm_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="experiences">{{ trans('cruds.user.fields.experience') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('experiences') ? 'is-invalid' : '' }}" name="experiences[]" id="experiences" multiple>
                    @foreach($experiences as $id => $experience)
                        <option value="{{ $id }}" {{ in_array($id, old('experiences', [])) ? 'selected' : '' }}>{{ $experience }}</option>
                    @endforeach
                </select>
                @if($errors->has('experiences'))
                    <div class="invalid-feedback">
                        {{ $errors->first('experiences') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.experience_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.user.fields.application_form') }}</label>
                @foreach(App\Models\User::APPLICATION_FORM_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('application_form') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="application_form_{{ $key }}" name="application_form" value="{{ $key }}" {{ old('application_form', '') === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="application_form_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('application_form'))
                    <div class="invalid-feedback">
                        {{ $errors->first('application_form') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.application_form_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="contact_no">{{ trans('cruds.user.fields.contact_no') }}</label>
                <input class="form-control {{ $errors->has('contact_no') ? 'is-invalid' : '' }}" type="text" name="contact_no" id="contact_no" value="{{ old('contact_no', '') }}">
                @if($errors->has('contact_no'))
                    <div class="invalid-feedback">
                        {{ $errors->first('contact_no') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.contact_no_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="photo">{{ trans('cruds.user.fields.photo') }}</label>
                <div class="needsclick dropzone {{ $errors->has('photo') ? 'is-invalid' : '' }}" id="photo-dropzone">
                </div>
                @if($errors->has('photo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('photo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.photo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="nationality">{{ trans('cruds.user.fields.nationality') }}</label>
                <input class="form-control {{ $errors->has('nationality') ? 'is-invalid' : '' }}" type="text" name="nationality" id="nationality" value="{{ old('nationality', '') }}">
                @if($errors->has('nationality'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nationality') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.nationality_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="home_airport">{{ trans('cruds.user.fields.home_airport') }}</label>
                <input class="form-control {{ $errors->has('home_airport') ? 'is-invalid' : '' }}" type="text" name="home_airport" id="home_airport" value="{{ old('home_airport', '') }}">
                @if($errors->has('home_airport'))
                    <div class="invalid-feedback">
                        {{ $errors->first('home_airport') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.home_airport_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="post_code">{{ trans('cruds.user.fields.post_code') }}</label>
                <input class="form-control {{ $errors->has('post_code') ? 'is-invalid' : '' }}" type="text" name="post_code" id="post_code" value="{{ old('post_code', '') }}">
                @if($errors->has('post_code'))
                    <div class="invalid-feedback">
                        {{ $errors->first('post_code') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.post_code_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="weight">{{ trans('cruds.user.fields.weight') }}</label>
                <input class="form-control {{ $errors->has('weight') ? 'is-invalid' : '' }}" type="number" name="weight" id="weight" value="{{ old('weight', '') }}" step="1">
                @if($errors->has('weight'))
                    <div class="invalid-feedback">
                        {{ $errors->first('weight') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.weight_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="height">{{ trans('cruds.user.fields.height') }}</label>
                <input class="form-control {{ $errors->has('height') ? 'is-invalid' : '' }}" type="number" name="height" id="height" value="{{ old('height', '') }}" step="1">
                @if($errors->has('height'))
                    <div class="invalid-feedback">
                        {{ $errors->first('height') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.height_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="birth_place">{{ trans('cruds.user.fields.birth_place') }}</label>
                <input class="form-control {{ $errors->has('birth_place') ? 'is-invalid' : '' }}" type="text" name="birth_place" id="birth_place" value="{{ old('birth_place', '') }}">
                @if($errors->has('birth_place'))
                    <div class="invalid-feedback">
                        {{ $errors->first('birth_place') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.birth_place_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="department_applied">{{ trans('cruds.user.fields.department_applied') }}</label>
                <input class="form-control {{ $errors->has('department_applied') ? 'is-invalid' : '' }}" type="text" name="department_applied" id="department_applied" value="{{ old('department_applied', '') }}">
                @if($errors->has('department_applied'))
                    <div class="invalid-feedback">
                        {{ $errors->first('department_applied') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.department_applied_helper') }}</span>
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

@section('scripts')
<script>
    Dropzone.options.cvDropzone = {
    url: '{{ route('admin.users.storeMedia') }}',
    maxFilesize: 20, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 20
    },
    success: function (file, response) {
      $('form').find('input[name="cv"]').remove()
      $('form').append('<input type="hidden" name="cv" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="cv"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($user) && $user->cv)
      var file = {!! json_encode($user->cv) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="cv" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
<script>
    Dropzone.options.skkDropzone = {
    url: '{{ route('admin.users.storeMedia') }}',
    maxFilesize: 20, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 20
    },
    success: function (file, response) {
      $('form').find('input[name="skk"]').remove()
      $('form').append('<input type="hidden" name="skk" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="skk"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($user) && $user->skk)
      var file = {!! json_encode($user->skk) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="skk" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
<script>
    Dropzone.options.photoDropzone = {
    url: '{{ route('admin.users.storeMedia') }}',
    maxFilesize: 20, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 20,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="photo"]').remove()
      $('form').append('<input type="hidden" name="photo" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="photo"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($user) && $user->photo)
      var file = {!! json_encode($user->photo) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="photo" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}

</script>
@endsection