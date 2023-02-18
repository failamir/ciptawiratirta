@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.nextOfKin.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.next-of-kins.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="candidate_id">{{ trans('cruds.nextOfKin.fields.candidate') }}</label>
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
                <span class="help-block">{{ trans('cruds.nextOfKin.fields.candidate_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="name">{{ trans('cruds.nextOfKin.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}">
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.nextOfKin.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="relationship">{{ trans('cruds.nextOfKin.fields.relationship') }}</label>
                <input class="form-control {{ $errors->has('relationship') ? 'is-invalid' : '' }}" type="text" name="relationship" id="relationship" value="{{ old('relationship', '') }}">
                @if($errors->has('relationship'))
                    <div class="invalid-feedback">
                        {{ $errors->first('relationship') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.nextOfKin.fields.relationship_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="place_birth">{{ trans('cruds.nextOfKin.fields.place_birth') }}</label>
                <input class="form-control {{ $errors->has('place_birth') ? 'is-invalid' : '' }}" type="text" name="place_birth" id="place_birth" value="{{ old('place_birth', '') }}">
                @if($errors->has('place_birth'))
                    <div class="invalid-feedback">
                        {{ $errors->first('place_birth') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.nextOfKin.fields.place_birth_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="date_of_birth">{{ trans('cruds.nextOfKin.fields.date_of_birth') }}</label>
                <input class="form-control date {{ $errors->has('date_of_birth') ? 'is-invalid' : '' }}" type="text" name="date_of_birth" id="date_of_birth" value="{{ old('date_of_birth') }}">
                @if($errors->has('date_of_birth'))
                    <div class="invalid-feedback">
                        {{ $errors->first('date_of_birth') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.nextOfKin.fields.date_of_birth_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="signature">{{ trans('cruds.nextOfKin.fields.signature') }}</label>
                <div class="needsclick dropzone {{ $errors->has('signature') ? 'is-invalid' : '' }}" id="signature-dropzone">
                </div>
                @if($errors->has('signature'))
                    <div class="invalid-feedback">
                        {{ $errors->first('signature') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.nextOfKin.fields.signature_helper') }}</span>
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
    Dropzone.options.signatureDropzone = {
    url: '{{ route('admin.next-of-kins.storeMedia') }}',
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
      $('form').find('input[name="signature"]').remove()
      $('form').append('<input type="hidden" name="signature" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="signature"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($nextOfKin) && $nextOfKin->signature)
      var file = {!! json_encode($nextOfKin->signature) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="signature" value="' + file.file_name + '">')
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