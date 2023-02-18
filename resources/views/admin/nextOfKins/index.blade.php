@extends('layouts.admin')
@section('content')
@can('next_of_kin_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.next-of-kins.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.nextOfKin.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.nextOfKin.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-NextOfKin">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.nextOfKin.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.nextOfKin.fields.candidate') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.nextOfKin.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.nextOfKin.fields.relationship') }}
                        </th>
                        <th>
                            {{ trans('cruds.nextOfKin.fields.place_birth') }}
                        </th>
                        <th>
                            {{ trans('cruds.nextOfKin.fields.date_of_birth') }}
                        </th>
                        <th>
                            {{ trans('cruds.nextOfKin.fields.signature') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($nextOfKins as $key => $nextOfKin)
                        <tr data-entry-id="{{ $nextOfKin->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $nextOfKin->id ?? '' }}
                            </td>
                            <td>
                                {{ $nextOfKin->candidate->name ?? '' }}
                            </td>
                            <td>
                                {{ $nextOfKin->candidate->email ?? '' }}
                            </td>
                            <td>
                                {{ $nextOfKin->name ?? '' }}
                            </td>
                            <td>
                                {{ $nextOfKin->relationship ?? '' }}
                            </td>
                            <td>
                                {{ $nextOfKin->place_birth ?? '' }}
                            </td>
                            <td>
                                {{ $nextOfKin->date_of_birth ?? '' }}
                            </td>
                            <td>
                                @if($nextOfKin->signature)
                                    <a href="{{ $nextOfKin->signature->getUrl() }}" target="_blank">
                                        {{ trans('global.view_file') }}
                                    </a>
                                @endif
                            </td>
                            <td>
                                @can('next_of_kin_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.next-of-kins.show', $nextOfKin->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('next_of_kin_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.next-of-kins.edit', $nextOfKin->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('next_of_kin_delete')
                                    <form action="{{ route('admin.next-of-kins.destroy', $nextOfKin->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('next_of_kin_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.next-of-kins.massDestroy') }}",
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
  let table = $('.datatable-NextOfKin:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection