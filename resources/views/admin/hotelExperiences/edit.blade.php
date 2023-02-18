@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.hotelExperience.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.hotel-experiences.update", [$hotelExperience->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="candidate_id">{{ trans('cruds.hotelExperience.fields.candidate') }}</label>
                <select class="form-control select2 {{ $errors->has('candidate') ? 'is-invalid' : '' }}" name="candidate_id" id="candidate_id">
                    @foreach($candidates as $id => $entry)
                        <option value="{{ $id }}" {{ (old('candidate_id') ? old('candidate_id') : $hotelExperience->candidate->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('candidate'))
                    <div class="invalid-feedback">
                        {{ $errors->first('candidate') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.hotelExperience.fields.candidate_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="hotel_name">{{ trans('cruds.hotelExperience.fields.hotel_name') }}</label>
                <input class="form-control {{ $errors->has('hotel_name') ? 'is-invalid' : '' }}" type="text" name="hotel_name" id="hotel_name" value="{{ old('hotel_name', $hotelExperience->hotel_name) }}">
                @if($errors->has('hotel_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('hotel_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.hotelExperience.fields.hotel_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="position">{{ trans('cruds.hotelExperience.fields.position') }}</label>
                <input class="form-control {{ $errors->has('position') ? 'is-invalid' : '' }}" type="text" name="position" id="position" value="{{ old('position', $hotelExperience->position) }}">
                @if($errors->has('position'))
                    <div class="invalid-feedback">
                        {{ $errors->first('position') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.hotelExperience.fields.position_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="start_date">{{ trans('cruds.hotelExperience.fields.start_date') }}</label>
                <input class="form-control date {{ $errors->has('start_date') ? 'is-invalid' : '' }}" type="text" name="start_date" id="start_date" value="{{ old('start_date', $hotelExperience->start_date) }}">
                @if($errors->has('start_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('start_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.hotelExperience.fields.start_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="end_date">{{ trans('cruds.hotelExperience.fields.end_date') }}</label>
                <input class="form-control date {{ $errors->has('end_date') ? 'is-invalid' : '' }}" type="text" name="end_date" id="end_date" value="{{ old('end_date', $hotelExperience->end_date) }}">
                @if($errors->has('end_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('end_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.hotelExperience.fields.end_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="reason">{{ trans('cruds.hotelExperience.fields.reason') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('reason') ? 'is-invalid' : '' }}" name="reason" id="reason">{!! old('reason', $hotelExperience->reason) !!}</textarea>
                @if($errors->has('reason'))
                    <div class="invalid-feedback">
                        {{ $errors->first('reason') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.hotelExperience.fields.reason_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="job">{{ trans('cruds.hotelExperience.fields.job') }}</label>
                <input class="form-control {{ $errors->has('job') ? 'is-invalid' : '' }}" type="text" name="job" id="job" value="{{ old('job', $hotelExperience->job) }}">
                @if($errors->has('job'))
                    <div class="invalid-feedback">
                        {{ $errors->first('job') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.hotelExperience.fields.job_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.hotelExperience.fields.description') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{!! old('description', $hotelExperience->description) !!}</textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.hotelExperience.fields.description_helper') }}</span>
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
                xhr.open('POST', '{{ route('admin.hotel-experiences.storeCKEditorImages') }}', true);
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
                data.append('crud_id', '{{ $hotelExperience->id ?? 0 }}');
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