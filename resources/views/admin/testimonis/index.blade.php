@extends('layouts.admin')
@section('content')
@can('testimoni_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.testimonis.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.testimoni.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.testimoni.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Testimoni">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.testimoni.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.testimoni.fields.user') }}
                        </th>
                        <th>
                            {{ trans('cruds.testimoni.fields.judul') }}
                        </th>
                        <th>
                            {{ trans('cruds.testimoni.fields.status') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($testimonis as $key => $testimoni)
                        <tr data-entry-id="{{ $testimoni->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $testimoni->id ?? '' }}
                            </td>
                            <td>
                                {{ $testimoni->user->name ?? '' }}
                            </td>
                            <td>
                                {{ $testimoni->judul ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Testimoni::STATUS_RADIO[$testimoni->status] ?? '' }}
                            </td>
                            <td>
                                @can('testimoni_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.testimonis.show', $testimoni->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('testimoni_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.testimonis.edit', $testimoni->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('testimoni_delete')
                                    <form action="{{ route('admin.testimonis.destroy', $testimoni->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('testimoni_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.testimonis.massDestroy') }}",
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
  let table = $('.datatable-Testimoni:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection