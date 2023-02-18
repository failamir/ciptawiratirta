<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">

    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="#">
            {{ trans('panel.site_title') }}
        </a>
    </div>

    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.home") }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                {{ trans('global.dashboard') }}
            </a>
        </li>
        @can('sgp_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.sgps.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/sgps") || request()->is("admin/sgps/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.sgp.title') }}
                </a>
            </li>
        @endcan
        @can('user_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/permissions*") ? "c-show" : "" }} {{ request()->is("admin/roles*") ? "c-show" : "" }} {{ request()->is("admin/users*") ? "c-show" : "" }} {{ request()->is("admin/audit-logs*") ? "c-show" : "" }} {{ request()->is("admin/ship-experiences*") ? "c-show" : "" }} {{ request()->is("admin/hotel-experiences*") ? "c-show" : "" }} {{ request()->is("admin/deck-certificates*") ? "c-show" : "" }} {{ request()->is("admin/hotel-certificates*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('permission_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.permissions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-unlock-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.permission.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('role_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.roles.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.role.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('user_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.users.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.user.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('audit_log_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.audit-logs.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/audit-logs") || request()->is("admin/audit-logs/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-file-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.auditLog.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('ship_experience_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.ship-experiences.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/ship-experiences") || request()->is("admin/ship-experiences/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-ship c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.shipExperience.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('hotel_experience_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.hotel-experiences.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/hotel-experiences") || request()->is("admin/hotel-experiences/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-concierge-bell c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.hotelExperience.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('deck_certificate_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.deck-certificates.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/deck-certificates") || request()->is("admin/deck-certificates/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.deckCertificate.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('hotel_certificate_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.hotel-certificates.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/hotel-certificates") || request()->is("admin/hotel-certificates/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.hotelCertificate.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('office_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.offices.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/offices") || request()->is("admin/offices/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-home c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.office.title') }}
                </a>
            </li>
        @endcan
        @can('job_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.jobs.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/jobs") || request()->is("admin/jobs/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-id-card c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.job.title') }}
                </a>
            </li>
        @endcan
        @can('principal_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.principals.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/principals") || request()->is("admin/principals/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.principal.title') }}
                </a>
            </li>
        @endcan
        @can('ship_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.ships.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/ships") || request()->is("admin/ships/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-ship c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.ship.title') }}
                </a>
            </li>
        @endcan
        @can('department_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.departments.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/departments") || request()->is("admin/departments/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-dolly-flatbed c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.department.title') }}
                </a>
            </li>
        @endcan
        @can('experience_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.experiences.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/experiences") || request()->is("admin/experiences/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.experience.title') }}
                </a>
            </li>
        @endcan
        @can('interview_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.interviews.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/interviews") || request()->is("admin/interviews/*") ? "c-active" : "" }}">
                    <i class="fa-fw fab fa-internet-explorer c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.interview.title') }}
                </a>
            </li>
        @endcan
        @can('departure_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.departures.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/departures") || request()->is("admin/departures/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-anchor c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.departure.title') }}
                </a>
            </li>
        @endcan
        @can('travel_document_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.travel-documents.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/travel-documents") || request()->is("admin/travel-documents/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.travelDocument.title') }}
                </a>
            </li>
        @endcan
        @can('formal_education_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.formal-educations.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/formal-educations") || request()->is("admin/formal-educations/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-graduation-cap c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.formalEducation.title') }}
                </a>
            </li>
        @endcan
        @can('reference_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.references.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/references") || request()->is("admin/references/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-users-cog c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.reference.title') }}
                </a>
            </li>
        @endcan
        @can('emergency_contact_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.emergency-contacts.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/emergency-contacts") || request()->is("admin/emergency-contacts/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-user-check c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.emergencyContact.title') }}
                </a>
            </li>
        @endcan
        @can('next_of_kin_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.next-of-kins.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/next-of-kins") || request()->is("admin/next-of-kins/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.nextOfKin.title') }}
                </a>
            </li>
        @endcan
        @can('testimoni_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.testimonis.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/testimonis") || request()->is("admin/testimonis/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-pen-square c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.testimoni.title') }}
                </a>
            </li>
        @endcan
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.systemCalendar") }}" class="c-sidebar-nav-link {{ request()->is("admin/system-calendar") || request()->is("admin/system-calendar/*") ? "c-active" : "" }}">
                <i class="c-sidebar-nav-icon fa-fw fas fa-calendar">

                </i>
                {{ trans('global.systemCalendar') }}
            </a>
        </li>
        @php($unread = \App\Models\QaTopic::unreadCount())
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.messenger.index") }}" class="{{ request()->is("admin/messenger") || request()->is("admin/messenger/*") ? "c-active" : "" }} c-sidebar-nav-link">
                    <i class="c-sidebar-nav-icon fa-fw fa fa-envelope">

                    </i>
                    <span>{{ trans('global.messages') }}</span>
                    @if($unread > 0)
                        <strong>( {{ $unread }} )</strong>
                    @endif

                </a>
            </li>
            @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                @can('profile_password_edit')
                    <li class="c-sidebar-nav-item">
                        <a class="c-sidebar-nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'c-active' : '' }}" href="{{ route('profile.password.edit') }}">
                            <i class="fa-fw fas fa-key c-sidebar-nav-icon">
                            </i>
                            {{ trans('global.change_password') }}
                        </a>
                    </li>
                @endcan
            @endif
            <li class="c-sidebar-nav-item">
                <a href="#" class="c-sidebar-nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">

                    </i>
                    {{ trans('global.logout') }}
                </a>
            </li>
    </ul>

</div>
