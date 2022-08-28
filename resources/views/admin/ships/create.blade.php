@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.ship.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.ships.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="ship_name">{{ trans('cruds.ship.fields.ship_name') }}</label>
                <input class="form-control {{ $errors->has('ship_name') ? 'is-invalid' : '' }}" type="text" name="ship_name" id="ship_name" value="{{ old('ship_name', '') }}">
                @if($errors->has('ship_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('ship_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.ship.fields.ship_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="principal_id">{{ trans('cruds.ship.fields.principal') }}</label>
                <select class="form-control select2 {{ $errors->has('principal') ? 'is-invalid' : '' }}" name="principal_id" id="principal_id">
                    @foreach($principals as $id => $entry)
                        <option value="{{ $id }}" {{ old('principal_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('principal'))
                    <div class="invalid-feedback">
                        {{ $errors->first('principal') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.ship.fields.principal_helper') }}</span>
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