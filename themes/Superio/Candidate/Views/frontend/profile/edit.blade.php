@extends('layouts.user')
@section('head')
    <style>
        #permanentlyDeleteAccount .close-modal {
            top: 35px;
        }
    </style>
@endsection
@section('content')
    <div class="bravo_user_profile p-0">
        {{-- <div class="d-flex justify-content-between mb20">
            <div class="upper-title-box">
                <h3 class="title">{{ __('My Profile') }}</h3>
                <div class="text">{{ __('Ready to jump back in?') }}</div>
            </div>
            <div class="title-actions">
                <a href="{{ route('user.upgrade_company') }}"
                    class="btn btn-warning text-light">{{ __('Become a Company') }}</a>
                @if ($url = $row->getDetailUrl())
                    <a href="{{ $url }}" class="btn btn-info text-light ml-3">
                        <i class="la la-eye"></i> {{ __('View profile') }}</a>
                @endif
            </div>
        </div> --}}
        @include('admin.message')
        <form action="{{ route('user.candidate.store') }}" method="post" class="default-form">
            @csrf
            <div class="row">
                <div class="col-lg-9">
                    <div class="ls-widget mb-4">
                        <div class="tabs-box">
                            <div class="widget-title">
                                <h4>{{ __('Candidate Profile') }}</h4>
                                <ul class="nav nav-tabs mt-3" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#tab-candidate-info"
                                            role="tab">{{ __('Candidate Info') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#tab-location"
                                            role="tab">{{ __('Location Info') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#tab-education"
                                            role="tab">{{ __('Education - Experience - Award') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#tab-cv"
                                            role="tab">{{ __('CV Manager') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#tab-seo"
                                            role="tab">{{ __('SEO Manager') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#tab-prescreening"
                                            role="tab">{{ __('Prescreening') }}</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="widget-content">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab-candidate-info" role="tabpanel">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>{{ __('First name') }}
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <input type="text"
                                                            value="{{ old('first_name', $user->first_name) }}"
                                                            name="first_name" placeholder="{{ __('First name') }}"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>{{ __('Last name') }}
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <input type="text" required
                                                            value="{{ old('last_name', $user->last_name) }}"
                                                            name="last_name" placeholder="{{ __('Last name') }}"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <hr> --}}
                                        @include('Candidate::admin.candidate.form', [
                                            'row' => $user,
                                            'show_phone' => true,
                                            'show_birthday' => true,
                                        ])
                                        {{-- <div class="widget-title mt-4">
                                            <h4>{{ __('About') }}</h4>
                                        </div>
                                        <textarea name="bio" rows="5" class="form-control">{{ strip_tags(old('bio', $user->bio)) }}</textarea> --}}
                                    </div>
                                    <div class="tab-pane" id="tab-location" role="tabpanel">
                                        @include('Candidate::admin.candidate.location', ['row' => $user])
                                    </div>
                                    <div class="tab-pane" id="tab-education" role="tabpanel">
                                        @include('Candidate::admin.candidate.sub_information', [
                                            'row' => $user,
                                        ])
                                    </div>
                                    <div class="tab-pane" id="tab-cv" role="tabpanel">
                                        @include('Candidate::frontend.layouts.user.parts.cv-manager-tab')
                                    </div>
                                    <div class="tab-pane" id="tab-seo" role="tabpanel">
                                        @include('Core::frontend.seo-meta.seo-meta')
                                    </div>
                                    <div class="tab-pane" id="tab-prescreening" role="tabpanel">
                                        <div class="form-group">
                                            <label>{{ __('Prescreening Tests') }}</label>
                                            <div class="table-responsive">
                                                <table class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>{{ __('Test Name') }}</th>
                                                            <th>{{ __('Score') }}</th>
                                                            <th>{{ __('Result File') }}</th>
                                                            <th>{{ __('Actions') }}</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if (isset($user->prescreenings))
                                                            @foreach ($user->prescreenings as $prescreening)
                                                                <tr>
                                                                    <td>{{ $prescreening->test_name }}</td>
                                                                    <td>{{ $prescreening->score }}%</td>
                                                                    <td>
                                                                        @if ($prescreening->file_result)
                                                                            <a href="{{ asset('storage/' . $prescreening->file_result) }}"
                                                                                target="_blank"
                                                                                class="btn btn-sm btn-primary">
                                                                                {{ __('View File') }}
                                                                            </a>
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        <button type="button" class="btn btn-sm btn-danger"
                                                                            onclick="deletePrescreening({{ $prescreening->id }})">
                                                                            <i class="fas fa-trash"></i>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('Add New Prescreening') }}</label>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <input type="text" name="prescreening_test_name"
                                                        class="form-control mb-2" placeholder="{{ __('Test Name') }}">
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="number" name="prescreening_score"
                                                        class="form-control mb-2" placeholder="{{ __('Score') }}"
                                                        min="0" max="100">
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="file" name="prescreening_file_result"
                                                        class="form-control mb-2" accept=".pdf,.doc,.docx">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-4 d-none d-md-block">
                        {{-- <button class="theme-btn btn-style-one" type="submit">
                            <i class="fa fa-save" style="padding-right: 5px"></i> {{ __('Save Changes') }}</button> --}}
                    </div>
                </div>
                <div class="col-lg-3">
                    {{-- <div class="ls-widget mb-4 ">
                        <div class="tabs-box">
                            <div class="widget-title">
                                <h4>{{ __('Visibility') }}</h4>
                            </div>
                            <div class="widget-content">
                                <div class="form-group">
                                    <select required class="custom-select" name="allow_search">
                                        <option @if (old('allow_search', @$row->allow_search) == 'hide') selected @endif value="hide">
                                            {{ __('Hide') }}</option>
                                        <option @if (old('allow_search', @$row->allow_search) == 'publish') selected @endif value="publish">
                                            {{ __('Publish') }}</option>
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <button class="theme-btn btn-style-one" type="submit">
                                        <i class="fa fa-save" style="padding-right: 5px"></i>
                                        {{ __('Save Changes') }}</button>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <div class="ls-widget mb-4 ">
                        <div class="tabs-box">
                            <div class="widget-title">
                                <h4>{{ __('Profile Photo') }}</h4>
                            </div>
                            <div class="widget-content">
                                <div class="form-group">
                                    {!! \Modules\Media\Helpers\FileHelper::fieldUpload('avatar_id', old('avatar_id', $user->avatar_id)) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ls-widget mb-4 card-social">
                        <div class="tabs-box">
                            <div class="widget-title">
                                <h4>{{ __('Social Media') }}</h4>
                            </div>
                            <div class="widget-content">
                                <?php $socialMediaData = !empty($row) ? $row->social_media : []; ?>
                                {{-- <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="social-skype">
                                            <i class="fab fa-skype"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control" name="social_media[skype]"
                                        value="{{ @$socialMediaData['skype'] }}" placeholder="{{ __('Skype') }}"
                                        aria-label="{{ __('Skype') }}" aria-describedby="social-skype">
                                </div> --}}
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="social-facebook">
                                            <i class="fab fa-facebook"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control" name="social_media[facebook]"
                                        value="{{ @$socialMediaData['facebook'] }}" placeholder="{{ __('Facebook') }}"
                                        aria-label="{{ __('Facebook') }}" aria-describedby="social-facebook">
                                </div>
                                {{-- <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="social-twitter">
                                            <i class="fab fa-twitter"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control" name="social_media[twitter]"
                                        value="{{ @$socialMediaData['twitter'] }}" placeholder="{{ __('Twitter') }}"
                                        aria-label="{{ __('Twitter') }}" aria-describedby="social-twitter">
                                </div> --}}
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="social-instagram">
                                            <i class="fab fa-instagram"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control" name="social_media[instagram]"
                                        value="{{ @$socialMediaData['instagram'] }}" placeholder="{{ __('Instagram') }}"
                                        aria-label="{{ __('Instagram') }}" aria-describedby="social-instagram">
                                </div>
                                {{-- <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="social-pinterest">
                                            <i class="fab fa-pinterest"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control" name="social_media[pinterest]"
                                        value="{{ @$socialMediaData['pinterest'] }}" placeholder="{{ __('Pinterest') }}"
                                        aria-label="{{ __('Pinterest') }}" aria-describedby="social-pinterest">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="social-dribbble">
                                            <i class="fab fa-dribbble"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control" name="social_media[dribbble]"
                                        value="{{ @$socialMediaData['dribbble'] }}" placeholder="{{ __('Dribbble') }}"
                                        aria-label="{{ __('Dribbble') }}" aria-describedby="social-dribbble">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="social-google">
                                            <i class="fab fa-google"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control" name="social_media[google]"
                                        value="{{ @$socialMediaData['google'] }}" placeholder="{{ __('Google') }}"
                                        aria-label="{{ __('Google') }}" aria-describedby="social-google">
                                </div> --}}
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="social-google">
                                            <i class="fab fa-linkedin"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control" name="social_media[linkedin]"
                                        value="{{ @$socialMediaData['linkedin'] }}" placeholder="{{ __('Linkedin') }}"
                                        aria-label="{{ __('Linkedin') }}" aria-describedby="social-linkedin">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-4 d-none d-md-block text-right">
                        <button class="theme-btn btn-style-one" type="submit">
                            <i class="fa fa-save" style="padding-right: 5px"></i> {{ __('Save Changes') }}</button>
                    </div>
                    {{-- <div class="ls-widget mb-4">
                        <div class="tabs-box">
                            <div class="widget-title">
                                <h4>{{ __('Categories') }}</h4>
                            </div>
                            <div class="widget-content">
                                <div class="form-group">
                                    <select id="categories" class="form-control" name="categories[]" multiple="multiple">
                                        <option value="">{{ __('-- Please Select --') }}</option>
                                        <?php
                                        foreach ($categories as $oneCategories) {
                                            $selected = '';
                                            if (!empty($row->categories)) {
                                                foreach ($row->categories as $category) {
                                                    if ($oneCategories->id == $category->id) {
                                                        $selected = 'selected';
                                                    }
                                                }
                                            }
                                            $trans = $oneCategories->translateOrOrigin(app()->getLocale());
                                            printf("<option value='%s' %s>%s</option>", $oneCategories->id, $selected, $oneCategories->name);
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ls-widget mb-4">
                        <div class="tabs-box">
                            <div class="widget-title">
                                <h4>{{ __('Skills') }}</h4>
                            </div>
                            <div class="widget-content">
                                <div class="form-group">
                                    <div class="">
                                        <select id="skills" name="skills[]" class="form-control" multiple="multiple">
                                            <option value="">{{ __('-- Please Select --') }}</option>
                                            <?php
                                            foreach ($skills as $oneSkill) {
                                                $selected = '';
                                                if (!empty($row->skills)) {
                                                    foreach ($row->skills as $skill) {
                                                        if ($oneSkill->id == $skill->id) {
                                                            $selected = 'selected';
                                                        }
                                                    }
                                                }
                                                $trans = $oneSkill->translateOrOrigin(app()->getLocale());
                                                printf("<option value='%s' %s>%s</option>", $oneSkill->id, $selected, $trans->name);
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                     --}}
                </div>
            </div>
        </form>
        <hr>
    </div>
    @if (!empty(setting_item('user_enable_permanently_delete')) and !is_admin())
        <div class="row">
            <div class="col-lg-9">
                <div class="ls-widget">
                    <div class="widget-title">
                        <h4 class="text-danger">
                            {{ __('Delete account') }}
                        </h4>
                    </div>
                    <div class="widget-content">
                        <div class="mb-4 mt-2">
                            {!! clean(
                                setting_item_with_lang(
                                    'user_permanently_delete_content',
                                    '',
                                    __(
                                        'Your account will be permanently deleted. Once you delete your account, there is no going back. Please be certain.',
                                    ),
                                ),
                            ) !!}
                        </div>
                        <a rel="modal:open" class="btn btn-danger"
                            href="#permanentlyDeleteAccount">{{ __('Delete your account') }}</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal bravo-form" id="permanentlyDeleteAccount">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ __('Confirm permanently delete account') }}</h5>
                    </div>
                    <div class="modal-body ">
                        <div class="my-3">
                            {!! clean(setting_item_with_lang('user_permanently_delete_content_confirm')) !!}
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="#close-modal" rel="modal:close" class="btn btn-secondary">{{ __('Close') }}</a>
                        <a href="{{ route('user.permanently.delete') }}" class="btn btn-danger">{{ __('Confirm') }}</a>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
@push('js')
    {!! App\Helpers\MapEngine::scripts() !!}
    <script type="text/javascript" src="{{ asset('libs/daterange/moment.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('libs/daterange/daterangepicker.min.js') }}"></script>
    <script>
        function deletePrescreening(id) {
            if (confirm('{{ __('Are you sure you want to delete this prescreening?') }}')) {
                $.ajax({
                    url: '{{ route('candidate.prescreening.delete') }}',
                    type: 'POST',
                    data: {
                        id: id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.success) {
                            location.reload();
                        } else {
                            alert('{{ __('Failed to delete prescreening') }}');
                        }
                    }
                });
            }
        }
    </script>
    <script src="{{ asset('libs/select2/js/select2.min.js') }}"></script>
    <script>
        @if (is_candidate() || !empty($candidate_create))
            $(document).ready(function() {
                $('#categories').select2();
                $('#skills').select2();
                $('#languages').select2();
            });

            let mapLat = {{ $row->map_lat ?? setting_item('default_location_lat', '51.505') }};
            let mapLng = {{ $row->map_lng ?? setting_item('default_location_lng', '-0.09') }};
            let mapZoom = {{ $row->map_zoom ?? '8' }};

            jQuery(function($) {
                new BravoMapEngine('map_content', {
                    disableScripts: true,
                    fitBounds: true,
                    center: [mapLat, mapLng],
                    zoom: mapZoom,
                    ready: function(engineMap) {
                        engineMap.addMarker([mapLat, mapLng], {
                            icon_options: {},
                        });
                        engineMap.on('click', function(dataLatLng) {
                            engineMap.clearMarkers();
                            engineMap.addMarker(dataLatLng, {
                                icon_options: {},
                            });
                            $('input[name=map_lat]').attr('value', dataLatLng[0]);
                            $('input[name=map_lng]').attr('value', dataLatLng[1]);
                        });
                        engineMap.on('zoom_changed', function(zoom) {
                            $('input[name=map_zoom]').attr('value', zoom);
                        });
                        engineMap.searchBox($('#customPlaceAddress'), function(dataLatLng) {
                            engineMap.clearMarkers();
                            engineMap.addMarker(dataLatLng, {
                                icon_options: {},
                            });
                            $('input[name=map_lat]').attr('value', dataLatLng[0]);
                            $('input[name=map_lng]').attr('value', dataLatLng[1]);
                        });
                        engineMap.searchBox($('.bravo_searchbox'), function(dataLatLng) {
                            engineMap.clearMarkers();
                            engineMap.addMarker(dataLatLng, {
                                icon_options: {},
                            });
                            $('input[name=map_lat]').attr('value', dataLatLng[0]);
                            $('input[name=map_lng]').attr('value', dataLatLng[1]);
                        });
                    },
                });

            });
        @endif
    </script>
@endpush
