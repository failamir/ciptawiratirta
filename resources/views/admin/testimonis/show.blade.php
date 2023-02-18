@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.testimoni.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.testimonis.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.testimoni.fields.id') }}
                        </th>
                        <td>
                            {{ $testimoni->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.testimoni.fields.user') }}
                        </th>
                        <td>
                            {{ $testimoni->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.testimoni.fields.judul') }}
                        </th>
                        <td>
                            {{ $testimoni->judul }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.testimoni.fields.testimoni') }}
                        </th>
                        <td>
                            {!! $testimoni->testimoni !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.testimoni.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\Testimoni::STATUS_RADIO[$testimoni->status] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.testimonis.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
