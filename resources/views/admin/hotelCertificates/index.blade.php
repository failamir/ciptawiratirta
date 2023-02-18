@extends('layouts.admin')
@section('content')
@can('hotel_certificate_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.hotel-certificates.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.hotelCertificate.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.hotelCertificate.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-HotelCertificate">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.hotelCertificate.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.hotelCertificate.fields.candidate') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.hotelCertificate.fields.course') }}
                        </th>
                        <th>
                            {{ trans('cruds.hotelCertificate.fields.institution') }}
                        </th>
                        <th>
                            {{ trans('cruds.hotelCertificate.fields.place') }}
                        </th>
                        <th>
                            {{ trans('cruds.hotelCertificate.fields.cert_number') }}
                        </th>
                        <th>
                            {{ trans('cruds.hotelCertificate.fields.date_of_issue') }}
                        </th>
                        <th>
                            {{ trans('cruds.hotelCertificate.fields.file') }}
                        </th>
                        <th>
                            {{ trans('cruds.hotelCertificate.fields.type_certificates') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($hotelCertificates as $key => $hotelCertificate)
                        <tr data-entry-id="{{ $hotelCertificate->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $hotelCertificate->id ?? '' }}
                            </td>
                            <td>
                                {{ $hotelCertificate->candidate->name ?? '' }}
                            </td>
                            <td>
                                {{ $hotelCertificate->candidate->email ?? '' }}
                            </td>
                            <td>
                                {{ $hotelCertificate->course ?? '' }}
                            </td>
                            <td>
                                {{ $hotelCertificate->institution ?? '' }}
                            </td>
                            <td>
                                {{ $hotelCertificate->place ?? '' }}
                            </td>
                            <td>
                                {{ $hotelCertificate->cert_number ?? '' }}
                            </td>
                            <td>
                                {{ $hotelCertificate->date_of_issue ?? '' }}
                            </td>
                            <td>
                                @if($hotelCertificate->file)
                                    <a href="{{ $hotelCertificate->file->getUrl() }}" target="_blank">
                                        {{ trans('global.view_file') }}
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ App\Models\HotelCertificate::TYPE_CERTIFICATES_SELECT[$hotelCertificate->type_certificates] ?? '' }}
                            </td>
                            <td>
                                @can('hotel_certificate_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.hotel-certificates.show', $hotelCertificate->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('hotel_certificate_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.hotel-certificates.edit', $hotelCertificate->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('hotel_certificate_delete')
                                    <form action="{{ route('admin.hotel-certificates.destroy', $hotelCertificate->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('hotel_certificate_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.hotel-certificates.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-HotelCertificate:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection