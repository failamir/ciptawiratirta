@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.shipExperience.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.ship-experiences.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="candidate_id">{{ trans('cruds.shipExperience.fields.candidate') }}</label>
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
                <span class="help-block">{{ trans('cruds.shipExperience.fields.candidate_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="vessel_name">{{ trans('cruds.shipExperience.fields.vessel_name') }}</label>
                <input class="form-control {{ $errors->has('vessel_name') ? 'is-invalid' : '' }}" type="text" name="vessel_name" id="vessel_name" value="{{ old('vessel_name', '') }}">
                @if($errors->has('vessel_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('vessel_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.shipExperience.fields.vessel_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="gt_loa">{{ trans('cruds.shipExperience.fields.gt_loa') }}</label>
                <input class="form-control {{ $errors->has('gt_loa') ? 'is-invalid' : '' }}" type="text" name="gt_loa" id="gt_loa" value="{{ old('gt_loa', '') }}">
                @if($errors->has('gt_loa'))
                    <div class="invalid-feedback">
                        {{ $errors->first('gt_loa') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.shipExperience.fields.gt_loa_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="vessel_route">{{ trans('cruds.shipExperience.fields.vessel_route') }}</label>
                <input class="form-control {{ $errors->has('vessel_route') ? 'is-invalid' : '' }}" type="text" name="vessel_route" id="vessel_route" value="{{ old('vessel_route', '') }}">
                @if($errors->has('vessel_route'))
                    <div class="invalid-feedback">
                        {{ $errors->first('vessel_route') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.shipExperience.fields.vessel_route_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="position">{{ trans('cruds.shipExperience.fields.position') }}</label>
                <input class="form-control {{ $errors->has('position') ? 'is-invalid' : '' }}" type="text" name="position" id="position" value="{{ old('position', '') }}">
                @if($errors->has('position'))
                    <div class="invalid-feedback">
                        {{ $errors->first('position') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.shipExperience.fields.position_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="start_date">{{ trans('cruds.shipExperience.fields.start_date') }}</label>
                <input class="form-control date {{ $errors->has('start_date') ? 'is-invalid' : '' }}" type="text" name="start_date" id="start_date" value="{{ old('start_date') }}">
                @if($errors->has('start_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('start_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.shipExperience.fields.start_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="end_date">{{ trans('cruds.shipExperience.fields.end_date') }}</label>
                <input class="form-control date {{ $errors->has('end_date') ? 'is-invalid' : '' }}" type="text" name="end_date" id="end_date" value="{{ old('end_date') }}">
                @if($errors->has('end_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('end_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.shipExperience.fields.end_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="reason">{{ trans('cruds.shipExperience.fields.reason') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('reason') ? 'is-invalid' : '' }}" name="reason" id="reason">{!! old('reason') !!}</textarea>
                @if($errors->has('reason'))
                    <div class="invalid-feedback">
                        {{ $errors->first('reason') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.shipExperience.fields.reason_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="job">{{ trans('cruds.shipExperience.fields.job') }}</label>
                <input class="form-control {{ $errors->has('job') ? 'is-invalid' : '' }}" type="text" name="job" id="job" value="{{ old('job', '') }}">
                @if($errors->has('job'))
                    <div class="invalid-feedback">
                        {{ $errors->first('job') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.shipExperience.fields.job_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.shipExperience.fields.description') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{!! old('description') !!}</textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.shipExperience.fields.description_helper') }}</span>
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
                xhr.open('POST', '{{ route('admin.ship-experiences.storeCKEditorImages') }}', true);
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
                data.append('crud_id', '{{ $shipExperience->id ?? 0 }}');
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