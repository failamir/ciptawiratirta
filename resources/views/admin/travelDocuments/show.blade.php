@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.travelDocument.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.travel-documents.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.travelDocument.fields.id') }}
                        </th>
                        <td>
                            {{ $travelDocument->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.travelDocument.fields.candidate') }}
                        </th>
                        <td>
                            {{ $travelDocument->candidate->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.travelDocument.fields.type_of_document') }}
                        </th>
                        <td>
                            {{ App\Models\TravelDocument::TYPE_OF_DOCUMENT_SELECT[$travelDocument->type_of_document] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.travelDocument.fields.number') }}
                        </th>
                        <td>
                            {{ $travelDocument->number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.travelDocument.fields.place_of_issuance') }}
                        </th>
                        <td>
                            {{ $travelDocument->place_of_issuance }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.travelDocument.fields.date_of_issuance') }}
                        </th>
                        <td>
                            {{ $travelDocument->date_of_issuance }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.travelDocument.fields.date_of_expiry') }}
                        </th>
                        <td>
                            {{ $travelDocument->date_of_expiry }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.travelDocument.fields.file') }}
                        </th>
                        <td>
                            @if($travelDocument->file)
                                <a href="{{ $travelDocument->file->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.travel-documents.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection