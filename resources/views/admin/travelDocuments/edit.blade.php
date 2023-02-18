@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.travelDocument.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.travel-documents.update", [$travelDocument->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="candidate_id">{{ trans('cruds.travelDocument.fields.candidate') }}</label>
                <select class="form-control select2 {{ $errors->has('candidate') ? 'is-invalid' : '' }}" name="candidate_id" id="candidate_id">
                    @foreach($candidates as $id => $entry)
                        <option value="{{ $id }}" {{ (old('candidate_id') ? old('candidate_id') : $travelDocument->candidate->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('candidate'))
                    <div class="invalid-feedback">
                        {{ $errors->first('candidate') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.travelDocument.fields.candidate_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.travelDocument.fields.type_of_document') }}</label>
                <select class="form-control {{ $errors->has('type_of_document') ? 'is-invalid' : '' }}" name="type_of_document" id="type_of_document">
                    <option value disabled {{ old('type_of_document', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\TravelDocument::TYPE_OF_DOCUMENT_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('type_of_document', $travelDocument->type_of_document) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('type_of_document'))
                    <div class="invalid-feedback">
                        {{ $errors->first('type_of_document') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.travelDocument.fields.type_of_document_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="number">{{ trans('cruds.travelDocument.fields.number') }}</label>
                <input class="form-control {{ $errors->has('number') ? 'is-invalid' : '' }}" type="text" name="number" id="number" value="{{ old('number', $travelDocument->number) }}">
                @if($errors->has('number'))
                    <div class="invalid-feedback">
                        {{ $errors->first('number') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.travelDocument.fields.number_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="place_of_issuance">{{ trans('cruds.travelDocument.fields.place_of_issuance') }}</label>
                <input class="form-control {{ $errors->has('place_of_issuance') ? 'is-invalid' : '' }}" type="text" name="place_of_issuance" id="place_of_issuance" value="{{ old('place_of_issuance', $travelDocument->place_of_issuance) }}">
                @if($errors->has('place_of_issuance'))
                    <div class="invalid-feedback">
                        {{ $errors->first('place_of_issuance') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.travelDocument.fields.place_of_issuance_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="date_of_issuance">{{ trans('cruds.travelDocument.fields.date_of_issuance') }}</label>
                <input class="form-control date {{ $errors->has('date_of_issuance') ? 'is-invalid' : '' }}" type="text" name="date_of_issuance" id="date_of_issuance" value="{{ old('date_of_issuance', $travelDocument->date_of_issuance) }}">
                @if($errors->has('date_of_issuance'))
                    <div class="invalid-feedback">
                        {{ $errors->first('date_of_issuance') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.travelDocument.fields.date_of_issuance_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="date_of_expiry">{{ trans('cruds.travelDocument.fields.date_of_expiry') }}</label>
                <input class="form-control date {{ $errors->has('date_of_expiry') ? 'is-invalid' : '' }}" type="text" name="date_of_expiry" id="date_of_expiry" value="{{ old('date_of_expiry', $travelDocument->date_of_expiry) }}">
                @if($errors->has('date_of_expiry'))
                    <div class="invalid-feedback">
                        {{ $errors->first('date_of_expiry') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.travelDocument.fields.date_of_expiry_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="file">{{ trans('cruds.travelDocument.fields.file') }}</label>
                <div class="needsclick dropzone {{ $errors->has('file') ? 'is-invalid' : '' }}" id="file-dropzone">
                </div>
                @if($errors->has('file'))
                    <div class="invalid-feedback">
                        {{ $errors->first('file') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.travelDocument.fields.file_helper') }}</span>
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
    url: '{{ route('admin.travel-documents.storeMedia') }}',
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
@if(isset($travelDocument) && $travelDocument->file)
      var file = {!! json_encode($travelDocument->file) !!}
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