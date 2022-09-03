@extends('layouts.admin')
@section('content')
@can('deck_certificate_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.deck-certificates.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.deckCertificate.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.deckCertificate.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-DeckCertificate">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.deckCertificate.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.deckCertificate.fields.candidate') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.deckCertificate.fields.course') }}
                        </th>
                        <th>
                            {{ trans('cruds.deckCertificate.fields.institution') }}
                        </th>
                        <th>
                            {{ trans('cruds.deckCertificate.fields.place') }}
                        </th>
                        <th>
                            {{ trans('cruds.deckCertificate.fields.cert_number') }}
                        </th>
                        <th>
                            {{ trans('cruds.deckCertificate.fields.date_of_issue') }}
                        </th>
                        <th>
                            {{ trans('cruds.deckCertificate.fields.file') }}
                        </th>
                        <th>
                            {{ trans('cruds.deckCertificate.fields.type_certificates') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($deckCertificates as $key => $deckCertificate)
                        <tr data-entry-id="{{ $deckCertificate->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $deckCertificate->id ?? '' }}
                            </td>
                            <td>
                                {{ $deckCertificate->candidate->name ?? '' }}
                            </td>
                            <td>
                                {{ $deckCertificate->candidate->email ?? '' }}
                            </td>
                            <td>
                                {{ $deckCertificate->course ?? '' }}
                            </td>
                            <td>
                                {{ $deckCertificate->institution ?? '' }}
                            </td>
                            <td>
                                {{ $deckCertificate->place ?? '' }}
                            </td>
                            <td>
                                {{ $deckCertificate->cert_number ?? '' }}
                            </td>
                            <td>
                                {{ $deckCertificate->date_of_issue ?? '' }}
                            </td>
                            <td>
                                @if($deckCertificate->file)
                                    <a href="{{ $deckCertificate->file->getUrl() }}" target="_blank">
                                        {{ trans('global.view_file') }}
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ App\Models\DeckCertificate::TYPE_CERTIFICATES_SELECT[$deckCertificate->type_certificates] ?? '' }}
                            </td>
                            <td>
                                @can('deck_certificate_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.deck-certificates.show', $deckCertificate->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('deck_certificate_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.deck-certificates.edit', $deckCertificate->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('deck_certificate_delete')
                                    <form action="{{ route('admin.deck-certificates.destroy', $deckCertificate->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('deck_certificate_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.deck-certificates.massDestroy') }}",
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
  let table = $('.datatable-DeckCertificate:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection