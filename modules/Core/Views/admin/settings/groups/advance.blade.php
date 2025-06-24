@if(is_default_lang())
<div class="row">
    <div class="col-sm-4">
        <h3 class="form-group-title">{{__("Map Provider")}}</h3>
        <p class="form-group-desc">{{__('Change map provider of your website')}}</p>
    </div>
    <div class="col-sm-8">
        <div class="panel">
            <div class="panel-body">
                <div class="form-group">
                    <label>{{__("Map Provider")}}</label>
                    <div class="form-controls">
                        <select name="map_provider" class="form-control" >
                            <option value="osm" {{ ($settings['map_provider'] ?? '') == 'osm' ? 'selected' : ''  }}>{{__("OpenStreetMap.org")}}</option>
                            <option value="gmap" {{($settings['map_provider'] ?? '') == 'gmap' ? 'selected' : ''  }}>{{__('Google Map')}}</option>
                        </select>
                    </div>
                </div>
                <div class="form-group" data-condition="map_provider:is(gmap)">
                    <label>{{__("Gmap API Key")}}</label>
                    <div class="form-controls">
                        <input type="text" name="map_gmap_key" value="{{$settings['map_gmap_key'] ?? ''}}" class="form-control">
                        <p><i><a href="https://developers.google.com/maps/documentation/javascript/get-api-key" target="blank">{{__("Learn how to get an api key")}}</a></i></p>
                    </div>
                </div>
                <div class="form-group">
                    <label>{{ __("Default Location") }}</label>
                    <div class="control-map-group">
                        <div id="map_content"></div>
                        <input type="text" placeholder="{{__("Search by name...")}}" class="bravo_searchbox form-control" autocomplete="off" onkeydown="return event.key !== 'Enter';">
                        <div class="g-control">
                            <div class="form-group">
                                <label>{{__("Map Latitude")}}:</label>
                                <input type="text" name="default_location_lat" class="form-control" value="{{ $settings['default_location_lat'] ?? '0' }}" onkeydown="return event.key !== 'Enter';">
                            </div>
                            <div class="form-group">
                                <label>{{__("Map Longitude")}}:</label>
                                <input type="text" name="default_location_lng" class="form-control" value="{{ $settings['default_location_lng'] ?? '0' }}" onkeydown="return event.key !== 'Enter';">
                            </div>
                            <div class="form-group">
                                <label>{{__("Map Zoom")}}:</label>
                                <input type="text" name="map_zoom" class="form-control" value="12" readonly onkeydown="return event.key !== 'Enter';">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-sm-4">
        <h3 class="form-group-title">{{__("Social Login")}}</h3>
        <p class="form-group-desc">{{__('Change social login information for your website')}}</p>
    </div>
    <div class="col-sm-8">
        <div class="panel">
            <div class="panel-title"><strong>{{__('Facebook')}}</strong></div>
            <div class="panel-body">
                <div class="form-group">
                    <label> <input type="checkbox" @if($settings['facebook_enable'] ?? '' == 1) checked @endif name="facebook_enable" value="1"> {{__("Enable Facebook Login?")}}</label>
                </div>
                <div class="form-group" data-condition="facebook_enable:is(1)">
                    <label>{{__("Facebook Client Id")}}</label>
                    <div class="form-controls">
                        <input type="text" name="facebook_client_id" value="{{$settings['facebook_client_id'] ?? ''}}" class="form-control">
                    </div>
                </div>
                <div class="form-group" data-condition="facebook_enable:is(1)">
                    <label>{{__("Facebook Client Secret")}}</label>
                    <div class="form-controls">
                        <input type="text" name="facebook_client_secret" value="{{$settings['facebook_client_secret'] ?? ''}}" class="form-control">
                    </div>
                </div>
            </div>
        </div>
        <div class="panel">
            <div class="panel-title"><strong>{{__('Google')}}</strong></div>
            <div class="panel-body">
                <div class="form-group">
                    <label><input type="checkbox" @if($settings['google_enable'] ?? '' == 1) checked @endif name="google_enable" value="1"> {{__("Enable Google Login?")}}</label>
                </div>
                <div class="form-group" data-condition="google_enable:is(1)">
                    <label>{{__("Google Client Id")}}</label>
                    <div class="form-controls">
                        <input type="text" name="google_client_id" value="{{$settings['google_client_id'] ?? ''}}" class="form-control">
                    </div>
                </div>
                <div class="form-group" data-condition="google_enable:is(1)">
                    <label>{{__("Google Client Secret")}}</label>
                    <div class="form-controls">
                        <input type="text" name="google_client_secret" value="{{$settings['google_client_secret'] ?? ''}}" class="form-control">
                    </div>
                </div>
            </div>
        </div>
        <div class="panel">
            <div class="panel-title"><strong>{{__('Twitter')}}</strong></div>
            <div class="panel-body">
                <div class="form-group">
                    <label> <input type="checkbox" @if($settings['twitter_enable'] ?? '' == 1) checked @endif name="twitter_enable" value="1"> {{__("Enable Twitter Login?")}}</label>
                </div>
                <div class="form-group" data-condition="twitter_enable:is(1)">
                    <label>{{__("Twitter Client Id")}}</label>
                    <div class="form-controls">
                        <input type="text" name="twitter_client_id" value="{{$settings['twitter_client_id'] ?? ''}}" class="form-control">
                    </div>
                </div>
                <div class="form-group" data-condition="twitter_enable:is(1)">
                    <label>{{__("Twitter Client Secret")}}</label>
                    <div class="form-controls">
                        <input type="text" name="twitter_client_secret" value="{{$settings['twitter_client_secret'] ?? ''}}" class="form-control">
                    </div>
                </div>
            </div>
        </div>
        <div class="panel">
            <div class="panel-title"><strong>{{__('LinkedIn')}}</strong></div>
            <div class="panel-body">
                <div class="form-group">
                    <label> <input type="checkbox" @if(setting_item('linkedin_enable') == 1) checked @endif name="linkedin_enable" value="1"> {{__("Enable LinkedIn Login?")}}</label>
                </div>
                <div class="form-group" data-condition="linkedin_enable:is(1)">
                    <label>{{__("LinkedIn Client Id")}}</label>
                    <div class="form-controls">
                        <input type="text" name="linkedin_client_id" value="{{setting_item('linkedin_client_id')}}" class="form-control">
                    </div>
                </div>
                <div class="form-group" data-condition="linkedin_enable:is(1)">
                    <label>{{__("LinkedIn Client Secret")}}</label>
                    <div class="form-controls">
                        <input type="text" name="linkedin_client_secret" value="{{setting_item('linkedin_client_secret')}}" class="form-control">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-sm-4">
        <h3 class="form-group-title">{{__("Captcha")}}</h3>
        <p class="form-group-desc">{{__('Change map provider of your website')}}</p>
    </div>
    <div class="col-sm-8">
        <div class="panel">
            <div class="panel-title"><strong>{{__("ReCaptcha Config")}}</strong></div>
            <div class="panel-body">
                <div class="form-group">
                    <div class="form-controls">
                        <label ><input type="checkbox" @if($settings['recaptcha_enable'] ?? '' == 1) checked @endif name="recaptcha_enable" value="1"> {{__("Enable ReCaptcha")}}</label>
                    </div>
                </div>
                <div class="form-group" data-condition="recaptcha_enable:is(1)">
                    <label>{{__("Api Key")}}</label>
                    <div class="form-controls">
                        <input type="text" name="recaptcha_api_key" value="{{$settings['recaptcha_api_key'] ?? ''}}" class="form-control">
                        <p><i><a href="http://www.google.com/recaptcha/admin" target="blank">{{__("Learn how to get an api key")}}</a></i></p>
                    </div>
                </div>
                <div class="form-group" data-condition="recaptcha_enable:is(1)">
                    <label>{{__("Api Secret")}}</label>
                    <div class="form-controls">
                        <input type="text" name="recaptcha_api_secret" value="{{$settings['recaptcha_api_secret'] ?? ''}}" class="form-control">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<hr>
<div class="row">
    <div class="col-sm-4">
        <h3 class="form-group-title">{{__("Custom Scripts for all languages")}}</h3>
        <p class="form-group-desc">{{__('Add custom HTML script before and after the content, like tracking code')}}</p>
    </div>
    <div class="col-sm-8">
        <div class="panel">
            <div class="panel-title"><strong>{{__("Custom Scripts")}}</strong></div>
            <div class="panel-body">
                <div class="form-group" >
                    <label>{{__("Head Script")}}</label>
                    <div class="form-controls">
                        <textarea name="head_scripts"  cols="30" rows="10" class="form-control">{{$settings['head_scripts'] ?? ''}}</textarea>
                        <p><i>{{__('scripts before closing head tag')}}</i></p>
                    </div>
                </div>
                <div class="form-group" >
                    <label>{{__("Body Script")}}</label>
                    <div class="form-controls">
                        <textarea name="body_scripts"  cols="30" rows="10" class="form-control">{{$settings['body_scripts'] ?? ''}}</textarea>
                        <p><i>{{__('scripts after open of body tag')}}</i></p>
                    </div>
                </div>
                <div class="form-group" >
                    <label>{{__("Footer Script")}}</label>
                    <div class="form-controls">
                        <textarea name="footer_scripts"  cols="30" rows="10" class="form-control">{{$settings['footer_scripts'] ?? ''}}</textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@else
<hr>
<div class="row">
    <div class="col-sm-4">
        <h3 class="form-group-title">{{__("Custom Scripts for :name",['name'=>request()->query('lang')])}}</h3>
        <p class="form-group-desc">{{__('Add custom HTML script before and after the content, like tracking code')}}</p>
    </div>
    <div class="col-sm-8">
        <div class="panel">
            <div class="panel-title"><strong>{{__("Custom Scripts")}}</strong></div>
            <div class="panel-body">
                <div class="form-group" >
                    <label>{{__("Head Script")}}</label>
                    <div class="form-controls">
                        <textarea name="head_scripts"  cols="30" rows="10" class="form-control">{{setting_item_with_lang_raw('head_scripts',request()->get('lang'))}}</textarea>
                        <p><i>{{__('scripts before closing head tag')}}</i></p>
                    </div>
                </div>
                <div class="form-group" >
                    <label>{{__("Body Script")}}</label>
                    <div class="form-controls">
                        <textarea name="body_scripts"  cols="30" rows="10" class="form-control">{{setting_item_with_lang_raw('body_scripts',request()->get('lang'))}}</textarea>
                        <p><i>{{__('scripts after open of body tag')}}</i></p>
                    </div>
                </div>
                <div class="form-group" >
                    <label>{{__("Footer Script")}}</label>
                    <div class="form-controls">
                        <textarea name="footer_scripts"  cols="30" rows="10" class="form-control">{{setting_item_with_lang_raw('footer_scripts',request()->get('lang'))}}</textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
<hr>
<div class="row">
    <div class="col-sm-4">
        <h3 class="form-group-title">{{__("Cookie agreement")}}</h3>
    </div>
    <div class="col-sm-8">
        <div class="panel">
            <div class="panel-title"><strong>{{__("Cookie agreement config")}}</strong></div>
            <div class="panel-body">
                @if(is_default_lang())
                    <div class="form-group">
                        <div class="form-controls">
                            <label ><input type="checkbox" @if(setting_item('cookie_agreement_enable') ?? '' == 1) checked @endif name="cookie_agreement_enable" value="1"> {{__("Enable Cookie agreement")}}</label>
                        </div>
                    </div>
                @else
                    <div class="form-group">
                        <div class="form-controls">
                            <label ><input type="checkbox" @if(setting_item('cookie_agreement_enable') ?? '' == 1) checked @endif name="cookie_agreement_enable" disabled value="1"> {{__("Enable Cookie agreement")}}</label>
                        </div>
                    </div>
                    @if(setting_item('cookie_agreement_enable') != 1)
                        <p>{{__('You must enable on main lang.')}}</p>
                    @endif
                @endif


                <div class="form-group" data-condition="cookie_agreement_enable:is(1)">
                    <label>{{__("Agree Text Button")}}</label>
                    <div class="form-controls">
                        <input type="text" name="cookie_agreement_button_text" value="{{setting_item_with_lang('cookie_agreement_button_text',request()->query('lang')) ?? ''}}" class="form-control">

                    </div>
                </div>
                <div class="form-group" data-condition="cookie_agreement_enable:is(1)">
                    <label>{{__("Content")}}</label>
                    <div class="form-controls">
                        <textarea name="cookie_agreement_content" rows="8" class="form-control d-none has-ckeditor">{{setting_item_with_lang('cookie_agreement_content',request()->query('lang')) ?? '' }}</textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>

@include('Core::admin.settings.groups.parts.cookie-consent-setting')

@include('Core::admin.settings.groups.parts.pusher')
@section ('script.body')
    {!! App\Helpers\MapEngine::scripts() !!}
    <script>
        jQuery(function ($) {
            new BravoMapEngine('map_content', {
                disableScripts: true,
                fitBounds: true,
                center: [{{ !empty($settings['default_location_lat']) ? $settings['default_location_lat'] : "51.505"}}, {{ !empty($settings['default_location_lng']) ? $settings['default_location_lng'] : "-0.09"}}],
                zoom: 12,
                ready: function (engineMap) {
                    @if( !empty($settings['default_location_lat']) && !empty($settings['default_location_lng']))
                    engineMap.addMarker([{{ $settings['default_location_lat'] }}, {{ $settings['default_location_lng'] }}], {
                        icon_options: {}
                    });
                    @endif
                    engineMap.on('click', function (dataLatLng) {
                        engineMap.clearMarkers();
                        engineMap.addMarker(dataLatLng, {
                            icon_options: {}
                        });
                        $("input[name=default_location_lat]").attr("value", dataLatLng[0]);
                        $("input[name=default_location_lng]").attr("value", dataLatLng[1]);
                    });
                    engineMap.on('zoom_changed', function (zoom) {
                        $("input[name=map_zoom]").attr("value", zoom);
                    });
                    engineMap.searchBox($('#customPlaceAddress'),function (dataLatLng) {
                        engineMap.clearMarkers();
                        engineMap.addMarker(dataLatLng, {
                            icon_options: {}
                        });
                        $("input[name=default_location_lat]").attr("value", dataLatLng[0]);
                        $("input[name=default_location_lng]").attr("value", dataLatLng[1]);
                    });
                    engineMap.searchBox($('.bravo_searchbox'),function (dataLatLng) {
                        engineMap.clearMarkers();
                        engineMap.addMarker(dataLatLng, {
                            icon_options: {}
                        });
                        $("input[name=default_location_lat]").attr("value", dataLatLng[0]);
                        $("input[name=default_location_lng]").attr("value", dataLatLng[1]);
                    });
                }
            });

        })
    </script>
@endsection
