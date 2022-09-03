@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.reference.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.references.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.reference.fields.id') }}
                        </th>
                        <td>
                            {{ $reference->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reference.fields.candidate') }}
                        </th>
                        <td>
                            {{ $reference->candidate->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reference.fields.employers_name') }}
                        </th>
                        <td>
                            {{ $reference->employers_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reference.fields.address_and_email_contact_number') }}
                        </th>
                        <td>
                            {!! $reference->address_and_email_contact_number !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reference.fields.recommendation') }}
                        </th>
                        <td>
                            {!! $reference->recommendation !!}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.references.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection