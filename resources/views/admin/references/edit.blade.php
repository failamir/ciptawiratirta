@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.reference.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.references.update", [$reference->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="candidate_id">{{ trans('cruds.reference.fields.candidate') }}</label>
                <select class="form-control select2 {{ $errors->has('candidate') ? 'is-invalid' : '' }}" name="candidate_id" id="candidate_id">
                    @foreach($candidates as $id => $entry)
                        <option value="{{ $id }}" {{ (old('candidate_id') ? old('candidate_id') : $reference->candidate->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('candidate'))
                    <div class="invalid-feedback">
                        {{ $errors->first('candidate') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.reference.fields.candidate_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="employers_name">{{ trans('cruds.reference.fields.employers_name') }}</label>
                <input class="form-control {{ $errors->has('employers_name') ? 'is-invalid' : '' }}" type="text" name="employers_name" id="employers_name" value="{{ old('employers_name', $reference->employers_name) }}">
                @if($errors->has('employers_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('employers_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.reference.fields.employers_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="address_and_email_contact_number">{{ trans('cruds.reference.fields.address_and_email_contact_number') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('address_and_email_contact_number') ? 'is-invalid' : '' }}" name="address_and_email_contact_number" id="address_and_email_contact_number">{!! old('address_and_email_contact_number', $reference->address_and_email_contact_number) !!}</textarea>
                @if($errors->has('address_and_email_contact_number'))
                    <div class="invalid-feedback">
                        {{ $errors->first('address_and_email_contact_number') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.reference.fields.address_and_email_contact_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="recommendation">{{ trans('cruds.reference.fields.recommendation') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('recommendation') ? 'is-invalid' : '' }}" name="recommendation" id="recommendation">{!! old('recommendation', $reference->recommendation) !!}</textarea>
                @if($errors->has('recommendation'))
                    <div class="invalid-feedback">
                        {{ $errors->first('recommendation') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.reference.fields.recommendation_helper') }}</span>
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
    $(document).ready(function () {
  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '{{ route('admin.references.storeCKEditorImages') }}', true);
                xhr.setRequestHeader('x-csrf-token', window._token);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.responseType = 'json';

                // Init listeners
                var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', function() { reject(genericErrorText) });
                xhr.addEventListener('abort', function() { reject() });
                xhr.addEventListener('load', function() {
                  var response = xhr.response;

                  if (!response || xhr.status !== 201) {
                    return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                  }

                  $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                  resolve({ default: response.url });
                });

                if (xhr.upload) {
                  xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                      loader.uploadTotal = e.total;
                      loader.uploaded = e.loaded;
                    }
                  });
                }

                // Send request
                var data = new FormData();
                data.append('upload', file);
                data.append('crud_id', '{{ $reference->id ?? 0 }}');
                xhr.send(data);
              });
            })
        }
      };
    }
  }

  var allEditors = document.querySelectorAll('.ckeditor');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
      allEditors[i], {
        extraPlugins: [SimpleUploadAdapter]
      }
    );
  }
});
</script>

@endsection