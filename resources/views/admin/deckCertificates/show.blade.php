@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.deckCertificate.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.deck-certificates.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.deckCertificate.fields.id') }}
                        </th>
                        <td>
                            {{ $deckCertificate->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.deckCertificate.fields.candidate') }}
                        </th>
                        <td>
                            {{ $deckCertificate->candidate->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.deckCertificate.fields.course') }}
                        </th>
                        <td>
                            {{ $deckCertificate->course }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.deckCertificate.fields.institution') }}
                        </th>
                        <td>
                            {{ $deckCertificate->institution }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.deckCertificate.fields.place') }}
                        </th>
                        <td>
                            {{ $deckCertificate->place }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.deckCertificate.fields.cert_number') }}
                        </th>
                        <td>
                            {{ $deckCertificate->cert_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.deckCertificate.fields.date_of_issue') }}
                        </th>
                        <td>
                            {{ $deckCertificate->date_of_issue }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.deckCertificate.fields.file') }}
                        </th>
                        <td>
                            @if($deckCertificate->file)
                                <a href="{{ $deckCertificate->file->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.deckCertificate.fields.type_certificates') }}
                        </th>
                        <td>
                            {{ App\Models\DeckCertificate::TYPE_CERTIFICATES_SELECT[$deckCertificate->type_certificates] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.deck-certificates.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection