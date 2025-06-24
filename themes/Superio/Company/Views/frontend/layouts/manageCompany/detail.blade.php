@extends('layouts.user')

@section('content')
    @php
        $languages = \Modules\Language\Models\Language::getActive();
    @endphp
    <div class="bravo_user_profile">
        <form method="post" action="{{ route('user.company.update' ) }}" class="default-form" >
            @csrf
            <div class="upper-title-box">
                <h3>{{ __('Edit: ').$row->name }}</h3>
                <div class="text">
                    @if($row->slug)
                        <p class="item-url-demo">{{__("Permalink")}}: {{ url(config('company.companies_route_prefix') ) }}/<a href="#" class="open-edit-input" data-name="slug">{{$row->slug}}</a></p>
                    @endif
                </div>
            </div>

            @include('admin.message')

            @if($row->id)
                @include('Language::admin.navigation')
            @endif

            <div class="row">
                <div class="col-xl-9">
                    <!-- Ls widget -->
                    <div class="ls-widget">
                        <div class="tabs-box">
                            <div class="widget-title"><h4>{{ __("Company Info") }}</h4></div>
                            <div class="widget-content">
                                @include('Company::admin.company.form')
                            </div>
                        </div>
                    </div>

                    <div class="ls-widget">
                        <div class="tabs-box">
                            <div class="widget-title"><h4>{{ __("Company Location") }}</h4></div>
                            <div class="widget-content">
                                @include('Company::admin.company.form.location')
                            </div>
                        </div>
                    </div>

                    @include('Core::frontend/seo-meta/seo-meta')

                    <div class="mb-4 d-none d-md-block">
                        <button class="theme-btn btn-style-one" type="submit"><i class="fa fa-save" style="padding-right: 5px"></i> {{__('Save Changes')}}</button>
                    </div>
                </div>
                <div class="col-xl-3">
                    <div class="ls-widget">
                        <div class="widget-title"><h4>{{ __("Publish") }}</h4></div>
                        <div class="widget-content">
                            <div class="form-group">
                                @if(is_default_lang())
                                    <div>
                                        <label><input @if($row->status=='publish') checked @endif type="radio" name="status" value="publish"> {{__("Publish")}}
                                        </label></div>
                                    <div>
                                        <label><input @if($row->status=='draft' or !$row->status) checked @endif type="radio" name="status" value="draft"> {{__("Draft")}}
                                        </label></div>
                                @endif
                            </div>
                            <div class="form-group">
                                <div class="text-right">
                                    <button class="theme-btn btn-style-one" type="submit"><i class="fa fa-save"></i> {{__('Save Changes')}}</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if(is_default_lang())
                        <div class="ls-widget">
                            <div class="widget-title"><h4>{{ __("Categories") }}</h4></div>
                            <div class="widget-content">
                                @include('Company::admin.company.form.category')
                            </div>
                        </div>
                    @endif

                    @if(is_default_lang())
                        @foreach ($attributes as $attribute)
                            @php $trans = $attribute->translateOrOrigin(app()->getLocale()) @endphp
                        <div class="ls-widget">
                            <div class="widget-title"><h4>{{__('Attribute: :name',['name'=> $trans->name])}}</h4></div>
                            <div class="widget-content">
                                <div class="terms-scrollable mb-4">
                                    @foreach($attribute->terms as $term)
                                        @php $trans_term = $term->translateOrOrigin(app()->getLocale()) @endphp
                                        <label class="term-item">
                                            <input @if(!empty($selected_terms) and $selected_terms->contains($term->id)) checked @endif type="checkbox" name="terms[]" value="{{$term->id}}">
                                            <span class="term-name">{{$trans_term->name}}</span>
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @endif

                    @if(is_default_lang())
                        <div class="ls-widget">
                            <div class="widget-title"><h4>{{ __('Logo')}} </h4></div>
                            <div class="widget-content pb-4">
                                {!! \Modules\Media\Helpers\FileHelper::fieldUpload('avatar_id',$row->avatar_id) !!}
                                <p><i>({{__('Recommended size 330px x 300px')}})</i></p>
                            </div>
                        </div>
                    @endif
                    @if(config('company.has_cover'))
                        <div class="ls-widget">
                            <div class="widget-title"><h4>{{ __('Banner Image')}} </h4></div>
                            <div class="widget-content pb-4">
                                {!! \Modules\Media\Helpers\FileHelper::fieldUpload('cover_id',$row->cover_id) !!}
                            </div>
                        </div>
                    @endif

                    @if(is_default_lang())
                        <div class="ls-widget">
                            <div class="widget-title"><h4>{{ __("Social Media") }}</h4></div>
                            <div class="widget-content">
                                @include('Company::admin.company.form.social')
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </form>
    </div>
@endsection

@section('footer')
    {!! App\Helpers\MapEngine::scripts() !!}
    <script type="text/javascript" src="{{ asset('libs/daterange/moment.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('libs/daterange/daterangepicker.min.js') }}"></script>
    <script src="{{ asset('libs/select2/js/select2.min.js') }}" ></script>
    <script>
        $('.has-datepicker').daterangepicker({
            singleDatePicker: true,
            showCalendar: false,
            autoUpdateInput: false,
            sameDate: true,
            autoApply: true,
            disabledPast: true,
            enableLoading: true,
            showEventTooltip: true,
            classNotAvailable: ['disabled', 'off'],
            disableHightLight: true,
            locale: {
                format: 'YYYY/MM/DD'
            }
        }).on('apply.daterangepicker', function (ev, picker) {
            $(this).val(picker.startDate.format('YYYY/MM/DD'));
        });
    </script>
    <script>

        let mapLat = {{ $row->map_lat ?? setting_item('default_location_lat', "51.505") }};
        let mapLng = {{ $row->map_lng ?? setting_item('default_location_lng', "-0.09") }};
        let mapZoom = {{ $row->map_zoom ?? "8" }};

        jQuery(function ($) {
            new BravoMapEngine('map_content', {
                disableScripts: true,
                fitBounds: true,
                center: [mapLat, mapLng],
                zoom: mapZoom,
                ready: function (engineMap) {
                    engineMap.addMarker([mapLat, mapLng], {
                        icon_options: {}
                    });
                    engineMap.on('click', function (dataLatLng) {
                        engineMap.clearMarkers();
                        engineMap.addMarker(dataLatLng, {
                            icon_options: {}
                        });
                        $("input[name=map_lat]").attr("value", dataLatLng[0]);
                        $("input[name=map_lng]").attr("value", dataLatLng[1]);
                    });
                    engineMap.on('zoom_changed', function (zoom) {
                        $("input[name=map_zoom]").attr("value", zoom);
                    });
                    engineMap.searchBox($('#customPlaceAddress'),function (dataLatLng) {
                        engineMap.clearMarkers();
                        engineMap.addMarker(dataLatLng, {
                            icon_options: {}
                        });
                        $("input[name=map_lat]").attr("value", dataLatLng[0]);
                        $("input[name=map_lng]").attr("value", dataLatLng[1]);
                    });
                    engineMap.searchBox($('.bravo_searchbox'),function (dataLatLng) {
                        engineMap.clearMarkers();
                        engineMap.addMarker(dataLatLng, {
                            icon_options: {}
                        });
                        $("input[name=map_lat]").attr("value", dataLatLng[0]);
                        $("input[name=map_lng]").attr("value", dataLatLng[1]);
                    });
                }
            });

        });

        jQuery(function ($) {
            "use strict"
            $('.open-edit-input').on('click', function (e) {
                e.preventDefault();
                $(this).replaceWith('<input type="text" name="' + $(this).data('name') + '" value="' + $(this).html() + '">');
            });
        })
    </script>
@endsection
