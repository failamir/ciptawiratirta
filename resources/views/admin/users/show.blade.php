@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.user.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.users.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.id') }}
                        </th>
                        <td>
                            {{ $user->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.name') }}
                        </th>
                        <td>
                            {{ $user->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.first_name') }}
                        </th>
                        <td>
                            {{ $user->first_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.last_name') }}
                        </th>
                        <td>
                            {{ $user->last_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.gender') }}
                        </th>
                        <td>
                            {{ App\Models\User::GENDER_SELECT[$user->gender] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.email') }}
                        </th>
                        <td>
                            {{ $user->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.email_verified_at') }}
                        </th>
                        <td>
                            {{ $user->email_verified_at }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.verified') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $user->verified ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.two_factor') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $user->two_factor ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.roles') }}
                        </th>
                        <td>
                            @foreach($user->roles as $key => $roles)
                                <span class="label label-info">{{ $roles->title }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.ktp') }}
                        </th>
                        <td>
                            {{ $user->ktp }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.passport') }}
                        </th>
                        <td>
                            {{ $user->passport }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.visa') }}
                        </th>
                        <td>
                            {{ $user->visa }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.bst_ccm') }}
                        </th>
                        <td>
                            {{ $user->bst_ccm }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.cv') }}
                        </th>
                        <td>
                            @if($user->cv)
                                <a href="{{ $user->cv->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.skk') }}
                        </th>
                        <td>
                            @if($user->skk)
                                <a href="{{ $user->skk->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.country') }}
                        </th>
                        <td>
                            {{ $user->country }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.state') }}
                        </th>
                        <td>
                            {{ $user->state }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.city') }}
                        </th>
                        <td>
                            {{ $user->city }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.address') }}
                        </th>
                        <td>
                            {{ $user->address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.b_o_d') }}
                        </th>
                        <td>
                            {{ $user->b_o_d }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.office_registered') }}
                        </th>
                        <td>
                            {{ $user->office_registered->city ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.vc_yf') }}
                        </th>
                        <td>
                            {{ App\Models\User::VC_YF_RADIO[$user->vc_yf] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.vc_covid') }}
                        </th>
                        <td>
                            {{ App\Models\User::VC_COVID_RADIO[$user->vc_covid] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.age') }}
                        </th>
                        <td>
                            {{ $user->age }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.cid') }}
                        </th>
                        <td>
                            {{ App\Models\User::CID_RADIO[$user->cid] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.coc') }}
                        </th>
                        <td>
                            {{ App\Models\User::COC_SELECT[$user->coc] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.rating_able') }}
                        </th>
                        <td>
                            {{ App\Models\User::RATING_ABLE_RADIO[$user->rating_able] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.ccm') }}
                        </th>
                        <td>
                            {{ App\Models\User::CCM_RADIO[$user->ccm] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.experience') }}
                        </th>
                        <td>
                            @foreach($user->experiences as $key => $experience)
                                <span class="label label-info">{{ $experience->value }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.application_form') }}
                        </th>
                        <td>
                            {{ App\Models\User::APPLICATION_FORM_RADIO[$user->application_form] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.contact_no') }}
                        </th>
                        <td>
                            {{ $user->contact_no }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.photo') }}
                        </th>
                        <td>
                            @if($user->photo)
                                <a href="{{ $user->photo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $user->photo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.nationality') }}
                        </th>
                        <td>
                            {{ $user->nationality }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.home_airport') }}
                        </th>
                        <td>
                            {{ $user->home_airport }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.post_code') }}
                        </th>
                        <td>
                            {{ $user->post_code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.weight') }}
                        </th>
                        <td>
                            {{ $user->weight }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.height') }}
                        </th>
                        <td>
                            {{ $user->height }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.birth_place') }}
                        </th>
                        <td>
                            {{ $user->birth_place }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.department_applied') }}
                        </th>
                        <td>
                            {{ $user->department_applied }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.users.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#candidate_sgps" role="tab" data-toggle="tab">
                {{ trans('cruds.sgp.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#int_by_sgps" role="tab" data-toggle="tab">
                {{ trans('cruds.sgp.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#candidate_departures" role="tab" data-toggle="tab">
                {{ trans('cruds.departure.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#candidate_interviews" role="tab" data-toggle="tab">
                {{ trans('cruds.interview.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#user_user_alerts" role="tab" data-toggle="tab">
                {{ trans('cruds.userAlert.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="candidate_sgps">
            @includeIf('admin.users.relationships.candidateSgps', ['sgps' => $user->candidateSgps])
        </div>
        <div class="tab-pane" role="tabpanel" id="int_by_sgps">
            @includeIf('admin.users.relationships.intBySgps', ['sgps' => $user->intBySgps])
        </div>
        <div class="tab-pane" role="tabpanel" id="candidate_departures">
            @includeIf('admin.users.relationships.candidateDepartures', ['departures' => $user->candidateDepartures])
        </div>
        <div class="tab-pane" role="tabpanel" id="candidate_interviews">
            @includeIf('admin.users.relationships.candidateInterviews', ['interviews' => $user->candidateInterviews])
        </div>
        <div class="tab-pane" role="tabpanel" id="user_user_alerts">
            @includeIf('admin.users.relationships.userUserAlerts', ['userAlerts' => $user->userUserAlerts])
        </div>
    </div>
</div>

@endsection