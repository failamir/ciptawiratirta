@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.deckCertificate.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.deck-certificates.update", [$deckCertificate->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="candidate_id">{{ trans('cruds.deckCertificate.fields.candidate') }}</label>
                <select class="form-control select2 {{ $errors->has('candidate') ? 'is-invalid' : '' }}" name="candidate_id" id="candidate_id">
                    @foreach($candidates as $id => $entry)
                        <option value="{{ $id }}" {{ (old('candidate_id') ? old('candidate_id') : $deckCertificate->candidate->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('candidate'))
                    <div class="invalid-feedback">
                        {{ $errors->first('candidate') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.deckCertificate.fields.candidate_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="course">{{ trans('cruds.deckCertificate.fields.course') }}</label>
                <input class="form-control {{ $errors->has('course') ? 'is-invalid' : '' }}" type="text" name="course" id="course" value="{{ old('course', $deckCertificate->course) }}">
                @if($errors->has('course'))
                    <div class="invalid-feedback">
                        {{ $errors->first('course') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.deckCertificate.fields.course_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="institution">{{ trans('cruds.deckCertificate.fields.institution') }}</label>
                <input class="form-control {{ $errors->has('institution') ? 'is-invalid' : '' }}" type="text" name="institution" id="institution" value="{{ old('institution', $deckCertificate->institution) }}">
                @if($errors->has('institution'))
                    <div class="invalid-feedback">
                        {{ $errors->first('institution') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.deckCertificate.fields.institution_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="place">{{ trans('cruds.deckCertificate.fields.place') }}</label>
                <input class="form-control {{ $errors->has('place') ? 'is-invalid' : '' }}" type="text" name="place" id="place" value="{{ old('place', $deckCertificate->place) }}">
                @if($errors->has('place'))
                    <div class="invalid-feedback">
                        {{ $errors->first('place') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.deckCertificate.fields.place_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cert_number">{{ trans('cruds.deckCertificate.fields.cert_number') }}</label>
                <input class="form-control {{ $errors->has('cert_number') ? 'is-invalid' : '' }}" type="text" name="cert_number" id="cert_number" value="{{ old('cert_number', $deckCertificate->cert_number) }}">
                @if($errors->has('cert_number'))
                    <div class="invalid-feedback">
                        {{ $errors->first('cert_number') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.deckCertificate.fields.cert_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="date_of_issue">{{ trans('cruds.deckCertificate.fields.date_of_issue') }}</label>
                <input class="form-control date {{ $errors->has('date_of_issue') ? 'is-invalid' : '' }}" type="text" name="date_of_issue" id="date_of_issue" value="{{ old('date_of_issue', $deckCertificate->date_of_issue) }}">
                @if($errors->has('date_of_issue'))
                    <div class="invalid-feedback">
                        {{ $errors->first('date_of_issue') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.deckCertificate.fields.date_of_issue_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="file">{{ trans('cruds.deckCertificate.fields.file') }}</label>
                <div class="needsclick dropzone {{ $errors->has('file') ? 'is-invalid' : '' }}" id="file-dropzone">
                </div>
                @if($errors->has('file'))
                    <div class="invalid-feedback">
                        {{ $errors->first('file') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.deckCertificate.fields.file_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.deckCertificate.fields.type_certificates') }}</label>
                <select class="form-control {{ $errors->has('type_certificates') ? 'is-invalid' : '' }}" name="type_certificates" id="type_certificates">
                    <option value disabled {{ old('type_certificates', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\DeckCertificate::TYPE_CERTIFICATES_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('type_certificates', $deckCertificate->type_certificates) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('type_certificates'))
                    <div class="invalid-feedback">
                        {{ $errors->first('type_certificates') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.deckCertificate.fields.type_certificates_helper') }}</span>
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
    Dropzone.options.fileDropzone = {
    url: '{{ route('admin.deck-certificates.storeMedia') }}',
    maxFilesize: 50, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 50
    },
    success: function (file, response) {
      $('form').find('input[name="file"]').remove()
      $('form').append('<input type="hidden" name="file" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="file"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($deckCertificate) && $deckCertificate->file)
      var file = {!! json_encode($deckCertificate->file) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="file" value="' + file.file_name + '">')
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