<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="{{$html_class ?? ''}}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @php event(new \Modules\Layout\Events\LayoutBeginHead()); @endphp
    @php
        $favicon = setting_item('site_favicon');
    @endphp
    @if($favicon)
        @php
            $file = (new \Modules\Media\Models\MediaFile())->findById($favicon);
        @endphp
        @if(!empty($file))
            <link rel="icon" type="{{$file['file_type']}}" href="{{asset('uploads/'.$file['file_path'])}}" />
        @else:
        <link rel="icon" type="image/png" href="{{url('images/favicon.png')}}" />
        @endif
    @endif

    @include('Layout::parts.seo-meta')
    <style>
        :root{
            --main-color:{{setting_item('style_main_color','#1967D2')}}
        }
    </style>
<!-- Stylesheets -->
    <link href="{{ asset('themes/superio/assets/css/font.css') }}" rel="stylesheet">
    <link href="{{ asset('themes/superio/assets/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('themes/superio/assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('themes/superio/assets/css/responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('dist/frontend/css/app.css') }}" rel="stylesheet">

    {!! \App\Helpers\Assets::css() !!}
    {!! \App\Helpers\Assets::js() !!}
    <script>
        var jobCore = {
            url:'{{url( app_get_locale() )}}',
            url_root:'{{ url('') }}',
            booking_decimals:{{(int)get_current_currency('currency_no_decimal',2)}},
            thousand_separator:'{{get_current_currency('currency_thousand')}}',
            decimal_separator:'{{get_current_currency('currency_decimal')}}',
            currency_position:'{{get_current_currency('currency_format')}}',
            currency_symbol:'{{currency_symbol()}}',
            currency_rate:'{{get_current_currency('rate',1)}}',
            date_format:'{{get_moment_date_format()}}',
            map_provider:'{{setting_item('map_provider')}}',
            map_gmap_key:'{{setting_item('map_gmap_key')}}',
            routes:{
                login:'{{route('auth.login')}}',
                register:'{{route('auth.register')}}',
                checkout:'{{is_api() ? route('api.booking.doCheckout') : route('booking.doCheckout')}}'
            },
            module:{
                job:'',
            },
            currentUser: {{(int)Auth::id()}},
            isAdmin : {{is_admin() ? 1 : 0}},
            rtl: {{ setting_item_with_lang('enable_rtl') ? "1" : "0" }},
            markAsRead:'{{route('core.notification.markAsRead')}}',
            markAllAsRead:'{{route('core.notification.markAllAsRead')}}',
            loadNotify : '{{route('core.notification.loadNotify')}}',
            pusher_api_key : '{{setting_item("pusher_api_key")}}',
            pusher_cluster : '{{setting_item("pusher_cluster")}}',
        };
        var i18n = {
            warning:"{{__("Warning")}}",
            success:"{{__("Success")}}",
        };
        var daterangepickerLocale = {
            "applyLabel": "{{__('Apply')}}",
            "cancelLabel": "{{__('Cancel')}}",
            "fromLabel": "{{__('From')}}",
            "toLabel": "{{__('To')}}",
            "customRangeLabel": "{{__('Custom')}}",
            "weekLabel": "{{__('W')}}",
            "first_day_of_week": {{ setting_item("site_first_day_of_the_weekin_calendar","1") }},
            "daysOfWeek": [
                "{{__('Su')}}",
                "{{__('Mo')}}",
                "{{__('Tu')}}",
                "{{__('We')}}",
                "{{__('Th')}}",
                "{{__('Fr')}}",
                "{{__('Sa')}}"
            ],
            "monthNames": [
                "{{__('January')}}",
                "{{__('February')}}",
                "{{__('March')}}",
                "{{__('April')}}",
                "{{__('May')}}",
                "{{__('June')}}",
                "{{__('July')}}",
                "{{__('August')}}",
                "{{__('September')}}",
                "{{__('October')}}",
                "{{__('November')}}",
                "{{__('December')}}"
            ],
        };
    </script>
    <!-- Styles -->
    @yield('head')
    @if(setting_item_with_lang('enable_rtl'))
        <link href="{{ asset('dist/frontend/css/rtl.css') }}" rel="stylesheet">
    @endif
    {!! setting_item('head_scripts') !!}
    {!! setting_item_with_lang_raw('head_scripts') !!}

    @php event(new \Modules\Layout\Events\LayoutEndHead()); @endphp

</head>
<body class="frontend-page {{$body_class ?? ''}} @if(!empty($is_home) or !empty($header_transparent)) header_transparent @endif @if(setting_item_with_lang('enable_rtl')) is-rtl @endif @if(is_api()) is_api @endif">
@php event(new \Modules\Layout\Events\LayoutBeginBody()); @endphp

{!! setting_item('body_scripts') !!}
{!! setting_item_with_lang_raw('body_scripts') !!}
<div class="bravo_wrap page-wrapper">
    @include('Layout::auth.header')

    @yield('content')
</div>
<script src="{{ asset('libs/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('themes/superio/assets/js/popper.min.js') }}"></script>
<script src="{{ asset('themes/superio/assets/js/chosen.min.js') }}"></script>
<script src="{{ asset('themes/superio/assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('themes/superio/assets/js/jquery.fancybox.js') }}"></script>
<script src="{{ asset('themes/superio/assets/js/jquery.modal.min.js') }}"></script>
<script src="{{ asset('themes/superio/assets/js/mmenu.polyfills.js') }}"></script>
<script src="{{ asset('themes/superio/assets/js/mmenu.js') }}"></script>
<script src="{{ asset('themes/superio/assets/js/appear.js') }}"></script>
<script src="{{ asset('themes/superio/assets/js/owl.js') }}"></script>
<script src="{{ asset('themes/superio/assets/js/wow.js') }}"></script>
<script src="{{ asset('themes/superio/assets/js/script.js') }}"></script>
<script src="{{ asset('js/home.js?_ver='.config('app.asset_version')) }}"></script>

{!! setting_item('footer_scripts') !!}
{!! setting_item_with_lang_raw('footer_scripts') !!}
@php event(new \Modules\Layout\Events\LayoutEndBody()); @endphp
@php \App\Helpers\ReCaptchaEngine::scripts() @endphp

</body>
</html>
