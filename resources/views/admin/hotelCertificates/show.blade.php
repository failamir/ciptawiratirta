@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.hotelCertificate.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.hotel-certificates.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.hotelCertificate.fields.id') }}
                        </th>
                        <td>
                            {{ $hotelCertificate->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hotelCertificate.fields.candidate') }}
                        </th>
                        <td>
                            {{ $hotelCertificate->candidate->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hotelCertificate.fields.course') }}
                        </th>
                        <td>
                            {{ $hotelCertificate->course }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hotelCertificate.fields.institution') }}
                        </th>
                        <td>
                            {{ $hotelCertificate->institution }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hotelCertificate.fields.place') }}
                        </th>
                        <td>
                            {{ $hotelCertificate->place }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hotelCertificate.fields.cert_number') }}
                        </th>
                        <td>
                            {{ $hotelCertificate->cert_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hotelCertificate.fields.date_of_issue') }}
                        </th>
                        <td>
                            {{ $hotelCertificate->date_of_issue }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hotelCertificate.fields.file') }}
                        </th>
                        <td>
                            @if($hotelCertificate->file)
                                <a href="{{ $hotelCertificate->file->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hotelCertificate.fields.type_certificates') }}
                        </th>
                        <td>
                            {{ App\Models\HotelCertificate::TYPE_CERTIFICATES_SELECT[$hotelCertificate->type_certificates] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.hotel-certificates.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection