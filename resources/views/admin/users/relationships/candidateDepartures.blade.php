@can('departure_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.departures.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.departure.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.departure.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-candidateDepartures">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.departure.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.departure.fields.departure_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.departure.fields.procedure') }}
                        </th>
                        <th>
                            {{ trans('cruds.departure.fields.candidate') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.email') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($departures as $key => $departure)
                        <tr data-entry-id="{{ $departure->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $departure->id ?? '' }}
                            </td>
                            <td>
                                {{ $departure->departure_date ?? '' }}
                            </td>
                            <td>
                                {{ $departure->procedure ?? '' }}
                            </td>
                            <td>
                                {{ $departure->candidate->name ?? '' }}
                            </td>
                            <td>
                                {{ $departure->candidate->email ?? '' }}
                            </td>
                            <td>
                                @can('departure_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.departures.show', $departure->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('departure_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.departures.edit', $departure->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('departure_delete')
                                    <form action="{{ route('admin.departures.destroy', $departure->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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

@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('departure_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.departures.massDestroy') }}",
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
  let table = $('.datatable-candidateDepartures:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection