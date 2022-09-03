@extends('layouts.admin')
@section('content')
@can('travel_document_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.travel-documents.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.travelDocument.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.travelDocument.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-TravelDocument">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.travelDocument.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.travelDocument.fields.candidate') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.travelDocument.fields.type_of_document') }}
                        </th>
                        <th>
                            {{ trans('cruds.travelDocument.fields.number') }}
                        </th>
                        <th>
                            {{ trans('cruds.travelDocument.fields.place_of_issuance') }}
                        </th>
                        <th>
                            {{ trans('cruds.travelDocument.fields.date_of_issuance') }}
                        </th>
                        <th>
                            {{ trans('cruds.travelDocument.fields.date_of_expiry') }}
                        </th>
                        <th>
                            {{ trans('cruds.travelDocument.fields.file') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($travelDocuments as $key => $travelDocument)
                        <tr data-entry-id="{{ $travelDocument->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $travelDocument->id ?? '' }}
                            </td>
                            <td>
                                {{ $travelDocument->candidate->name ?? '' }}
                            </td>
                            <td>
                                {{ $travelDocument->candidate->email ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\TravelDocument::TYPE_OF_DOCUMENT_SELECT[$travelDocument->type_of_document] ?? '' }}
                            </td>
                            <td>
                                {{ $travelDocument->number ?? '' }}
                            </td>
                            <td>
                                {{ $travelDocument->place_of_issuance ?? '' }}
                            </td>
                            <td>
                                {{ $travelDocument->date_of_issuance ?? '' }}
                            </td>
                            <td>
                                {{ $travelDocument->date_of_expiry ?? '' }}
                            </td>
                            <td>
                                @if($travelDocument->file)
                                    <a href="{{ $travelDocument->file->getUrl() }}" target="_blank">
                                        {{ trans('global.view_file') }}
                                    </a>
                                @endif
                            </td>
                            <td>
                                @can('travel_document_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.travel-documents.show', $travelDocument->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('travel_document_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.travel-documents.edit', $travelDocument->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('travel_document_delete')
                                    <form action="{{ route('admin.travel-documents.destroy', $travelDocument->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('travel_document_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.travel-documents.massDestroy') }}",
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
  let table = $('.datatable-TravelDocument:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection