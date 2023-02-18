@can('user_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.users.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.user.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.user.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-experienceUsers">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.user.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.first_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.last_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.gender') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.email_verified_at') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.verified') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.two_factor') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.roles') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.ktp') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.passport') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.visa') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.bst_ccm') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.cv') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.skk') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.country') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.state') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.city') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.address') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.b_o_d') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.office_registered') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.vc_yf') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.vc_covid') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.age') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.cid') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.coc') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.rating_able') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.ccm') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.experience') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.application_form') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.contact_no') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.photo') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.nationality') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.home_airport') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.post_code') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.weight') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.height') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.birth_place') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.department_applied') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.testimoni') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $key => $user)
                        <tr data-entry-id="{{ $user->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $user->id ?? '' }}
                            </td>
                            <td>
                                {{ $user->name ?? '' }}
                            </td>
                            <td>
                                {{ $user->first_name ?? '' }}
                            </td>
                            <td>
                                {{ $user->last_name ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\User::GENDER_SELECT[$user->gender] ?? '' }}
                            </td>
                            <td>
                                {{ $user->email ?? '' }}
                            </td>
                            <td>
                                {{ $user->email_verified_at ?? '' }}
                            </td>
                            <td>
                                <span style="display:none">{{ $user->verified ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $user->verified ? 'checked' : '' }}>
                            </td>
                            <td>
                                <span style="display:none">{{ $user->two_factor ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $user->two_factor ? 'checked' : '' }}>
                            </td>
                            <td>
                                @foreach($user->roles as $key => $item)
                                    <span class="badge badge-info">{{ $item->title }}</span>
                                @endforeach
                            </td>
                            <td>
                                {{ $user->ktp ?? '' }}
                            </td>
                            <td>
                                {{ $user->passport ?? '' }}
                            </td>
                            <td>
                                {{ $user->visa ?? '' }}
                            </td>
                            <td>
                                {{ $user->bst_ccm ?? '' }}
                            </td>
                            <td>
                                @if($user->cv)
                                    <a href="{{ $user->cv->getUrl() }}" target="_blank">
                                        {{ trans('global.view_file') }}
                                    </a>
                                @endif
                            </td>
                            <td>
                                @if($user->skk)
                                    <a href="{{ $user->skk->getUrl() }}" target="_blank">
                                        {{ trans('global.view_file') }}
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ $user->country ?? '' }}
                            </td>
                            <td>
                                {{ $user->state ?? '' }}
                            </td>
                            <td>
                                {{ $user->city ?? '' }}
                            </td>
                            <td>
                                {{ $user->address ?? '' }}
                            </td>
                            <td>
                                {{ $user->b_o_d ?? '' }}
                            </td>
                            <td>
                                {{ $user->office_registered->city ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\User::VC_YF_RADIO[$user->vc_yf] ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\User::VC_COVID_RADIO[$user->vc_covid] ?? '' }}
                            </td>
                            <td>
                                {{ $user->age ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\User::CID_RADIO[$user->cid] ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\User::COC_SELECT[$user->coc] ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\User::RATING_ABLE_RADIO[$user->rating_able] ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\User::CCM_RADIO[$user->ccm] ?? '' }}
                            </td>
                            <td>
                                @foreach($user->experiences as $key => $item)
                                    <span class="badge badge-info">{{ $item->value }}</span>
                                @endforeach
                            </td>
                            <td>
                                {{ App\Models\User::APPLICATION_FORM_RADIO[$user->application_form] ?? '' }}
                            </td>
                            <td>
                                {{ $user->contact_no ?? '' }}
                            </td>
                            <td>
                                @if($user->photo)
                                    <a href="{{ $user->photo->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $user->photo->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ $user->nationality ?? '' }}
                            </td>
                            <td>
                                {{ $user->home_airport ?? '' }}
                            </td>
                            <td>
                                {{ $user->post_code ?? '' }}
                            </td>
                            <td>
                                {{ $user->weight ?? '' }}
                            </td>
                            <td>
                                {{ $user->height ?? '' }}
                            </td>
                            <td>
                                {{ $user->birth_place ?? '' }}
                            </td>
                            <td>
                                {{ $user->department_applied ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\User::TESTIMONI_RADIO[$user->testimoni] ?? '' }}
                            </td>
                            <td>
                                @can('user_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.users.show', $user->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('user_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.users.edit', $user->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('user_delete')
                                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('user_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.users.massDestroy') }}",
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
  let table = $('.datatable-experienceUsers:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });

})

</script>
@endsection
