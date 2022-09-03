@extends('layouts.admin')
@section('content')
@can('ship_experience_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.ship-experiences.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.shipExperience.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.shipExperience.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-ShipExperience">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.shipExperience.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.shipExperience.fields.candidate') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.shipExperience.fields.vessel_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.shipExperience.fields.gt_loa') }}
                        </th>
                        <th>
                            {{ trans('cruds.shipExperience.fields.vessel_route') }}
                        </th>
                        <th>
                            {{ trans('cruds.shipExperience.fields.position') }}
                        </th>
                        <th>
                            {{ trans('cruds.shipExperience.fields.start_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.shipExperience.fields.end_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.shipExperience.fields.job') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($shipExperiences as $key => $shipExperience)
                        <tr data-entry-id="{{ $shipExperience->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $shipExperience->id ?? '' }}
                            </td>
                            <td>
                                {{ $shipExperience->candidate->name ?? '' }}
                            </td>
                            <td>
                                {{ $shipExperience->candidate->email ?? '' }}
                            </td>
                            <td>
                                {{ $shipExperience->vessel_name ?? '' }}
                            </td>
                            <td>
                                {{ $shipExperience->gt_loa ?? '' }}
                            </td>
                            <td>
                                {{ $shipExperience->vessel_route ?? '' }}
                            </td>
                            <td>
                                {{ $shipExperience->position ?? '' }}
                            </td>
                            <td>
                                {{ $shipExperience->start_date ?? '' }}
                            </td>
                            <td>
                                {{ $shipExperience->end_date ?? '' }}
                            </td>
                            <td>
                                {{ $shipExperience->job ?? '' }}
                            </td>
                            <td>
                                @can('ship_experience_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.ship-experiences.show', $shipExperience->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('ship_experience_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.ship-experiences.edit', $shipExperience->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('ship_experience_delete')
                                    <form action="{{ route('admin.ship-experiences.destroy', $shipExperience->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('ship_experience_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.ship-experiences.massDestroy') }}",
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
  let table = $('.datatable-ShipExperience:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection