@can('sgp_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.sgps.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.sgp.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.sgp.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-candidateSgps">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.sgp.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.sgp.fields.remarks') }}
                        </th>
                        <th>
                            {{ trans('cruds.sgp.fields.crew_code') }}
                        </th>
                        <th>
                            {{ trans('cruds.sgp.fields.date_of_entry') }}
                        </th>
                        <th>
                            {{ trans('cruds.sgp.fields.source') }}
                        </th>
                        <th>
                            {{ trans('cruds.sgp.fields.candidate') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.sgp.fields.applied_position') }}
                        </th>
                        <th>
                            {{ trans('cruds.sgp.fields.department') }}
                        </th>
                        <th>
                            {{ trans('cruds.sgp.fields.gender') }}
                        </th>
                        <th>
                            {{ trans('cruds.sgp.fields.d_o_b') }}
                        </th>
                        <th>
                            {{ trans('cruds.sgp.fields.age') }}
                        </th>
                        <th>
                            {{ trans('cruds.sgp.fields.vc_yf') }}
                        </th>
                        <th>
                            {{ trans('cruds.sgp.fields.vc_covid') }}
                        </th>
                        <th>
                            {{ trans('cruds.sgp.fields.cid') }}
                        </th>
                        <th>
                            {{ trans('cruds.sgp.fields.coc') }}
                        </th>
                        <th>
                            {{ trans('cruds.sgp.fields.rating_able') }}
                        </th>
                        <th>
                            {{ trans('cruds.sgp.fields.ccm') }}
                        </th>
                        <th>
                            {{ trans('cruds.sgp.fields.experience') }}
                        </th>
                        <th>
                            {{ trans('cruds.sgp.fields.application_form') }}
                        </th>
                        <th>
                            {{ trans('cruds.sgp.fields.contact_no') }}
                        </th>
                        <th>
                            {{ trans('cruds.sgp.fields.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.sgp.fields.int_by') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.sgp.fields.int_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.sgp.fields.int_result') }}
                        </th>
                        <th>
                            {{ trans('cruds.sgp.fields.approved_as') }}
                        </th>
                        <th>
                            {{ trans('cruds.job.fields.slug') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sgps as $key => $sgp)
                        <tr data-entry-id="{{ $sgp->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $sgp->id ?? '' }}
                            </td>
                            <td>
                                {{ $sgp->remarks ?? '' }}
                            </td>
                            <td>
                                {{ $sgp->crew_code ?? '' }}
                            </td>
                            <td>
                                {{ $sgp->date_of_entry ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Sgp::SOURCE_SELECT[$sgp->source] ?? '' }}
                            </td>
                            <td>
                                {{ $sgp->candidate->name ?? '' }}
                            </td>
                            <td>
                                {{ $sgp->candidate->email ?? '' }}
                            </td>
                            <td>
                                {{ $sgp->applied_position->title ?? '' }}
                            </td>
                            <td>
                                {{ $sgp->department->department_name ?? '' }}
                            </td>
                            <td>
                                {{ $sgp->gender ?? '' }}
                            </td>
                            <td>
                                {{ $sgp->d_o_b ?? '' }}
                            </td>
                            <td>
                                {{ $sgp->age ?? '' }}
                            </td>
                            <td>
                                {{ $sgp->vc_yf ?? '' }}
                            </td>
                            <td>
                                {{ $sgp->vc_covid ?? '' }}
                            </td>
                            <td>
                                {{ $sgp->cid ?? '' }}
                            </td>
                            <td>
                                {{ $sgp->coc ?? '' }}
                            </td>
                            <td>
                                {{ $sgp->rating_able ?? '' }}
                            </td>
                            <td>
                                {{ $sgp->ccm ?? '' }}
                            </td>
                            <td>
                                {{ $sgp->experience ?? '' }}
                            </td>
                            <td>
                                {{ $sgp->application_form ?? '' }}
                            </td>
                            <td>
                                {{ $sgp->contact_no ?? '' }}
                            </td>
                            <td>
                                {{ $sgp->email ?? '' }}
                            </td>
                            <td>
                                {{ $sgp->int_by->name ?? '' }}
                            </td>
                            <td>
                                {{ $sgp->int_by->email ?? '' }}
                            </td>
                            <td>
                                {{ $sgp->int_date ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Sgp::INT_RESULT_RADIO[$sgp->int_result] ?? '' }}
                            </td>
                            <td>
                                {{ $sgp->approved_as->title ?? '' }}
                            </td>
                            <td>
                                {{ $sgp->approved_as->slug ?? '' }}
                            </td>
                            <td>
                                @can('sgp_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.sgps.show', $sgp->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('sgp_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.sgps.edit', $sgp->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('sgp_delete')
                                    <form action="{{ route('admin.sgps.destroy', $sgp->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('sgp_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.sgps.massDestroy') }}",
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
  let table = $('.datatable-candidateSgps:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection