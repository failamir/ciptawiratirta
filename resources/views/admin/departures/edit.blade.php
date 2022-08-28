@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.departure.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.departures.update", [$departure->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="departure_date">{{ trans('cruds.departure.fields.departure_date') }}</label>
                <input class="form-control date {{ $errors->has('departure_date') ? 'is-invalid' : '' }}" type="text" name="departure_date" id="departure_date" value="{{ old('departure_date', $departure->departure_date) }}">
                @if($errors->has('departure_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('departure_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.departure.fields.departure_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="procedure">{{ trans('cruds.departure.fields.procedure') }}</label>
                <textarea class="form-control {{ $errors->has('procedure') ? 'is-invalid' : '' }}" name="procedure" id="procedure">{{ old('procedure', $departure->procedure) }}</textarea>
                @if($errors->has('procedure'))
                    <div class="invalid-feedback">
                        {{ $errors->first('procedure') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.departure.fields.procedure_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="candidate_id">{{ trans('cruds.departure.fields.candidate') }}</label>
                <select class="form-control select2 {{ $errors->has('candidate') ? 'is-invalid' : '' }}" name="candidate_id" id="candidate_id">
                    @foreach($candidates as $id => $entry)
                        <option value="{{ $id }}" {{ (old('candidate_id') ? old('candidate_id') : $departure->candidate->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('candidate'))
                    <div class="invalid-feedback">
                        {{ $errors->first('candidate') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.departure.fields.candidate_helper') }}</span>
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