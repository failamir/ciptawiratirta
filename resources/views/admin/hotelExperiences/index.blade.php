@extends('layouts.admin')
@section('content')
@can('hotel_experience_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.hotel-experiences.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.hotelExperience.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.hotelExperience.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-HotelExperience">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.hotelExperience.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.hotelExperience.fields.candidate') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.hotelExperience.fields.hotel_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.hotelExperience.fields.position') }}
                        </th>
                        <th>
                            {{ trans('cruds.hotelExperience.fields.start_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.hotelExperience.fields.end_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.hotelExperience.fields.job') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($hotelExperiences as $key => $hotelExperience)
                        <tr data-entry-id="{{ $hotelExperience->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $hotelExperience->id ?? '' }}
                            </td>
                            <td>
                                {{ $hotelExperience->candidate->name ?? '' }}
                            </td>
                            <td>
                                {{ $hotelExperience->candidate->email ?? '' }}
                            </td>
                            <td>
                                {{ $hotelExperience->hotel_name ?? '' }}
                            </td>
                            <td>
                                {{ $hotelExperience->position ?? '' }}
                            </td>
                            <td>
                                {{ $hotelExperience->start_date ?? '' }}
                            </td>
                            <td>
                                {{ $hotelExperience->end_date ?? '' }}
                            </td>
                            <td>
                                {{ $hotelExperience->job ?? '' }}
                            </td>
                            <td>
                                @can('hotel_experience_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.hotel-experiences.show', $hotelExperience->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('hotel_experience_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.hotel-experiences.edit', $hotelExperience->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('hotel_experience_delete')
                                    <form action="{{ route('admin.hotel-experiences.destroy', $hotelExperience->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('hotel_experience_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.hotel-experiences.massDestroy') }}",
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
  let table = $('.datatable-HotelExperience:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection