<!DOCTYPE html>
<html {{ setting_item_with_lang('enable_rtl') ? 'dir="rtl"' : '' }} lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="{{$html_class ?? ''}}">
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

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Noto+Sans+JP:wght@400;500;700;900&display=swap" rel="stylesheet">

    <link href="{{ asset('libs/font-awesome/css/font-awesome.css') }}" rel="stylesheet">

    <!-- Stylesheets -->

    <link href="{{ asset('themes/superio/assets/css/font.css') }}" rel="stylesheet">
    <link href="{{ asset('themes/superio/assets/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('libs/carousel-2/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('themes/superio/assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('themes/superio/assets/css/responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('themes/superio/dist/frontend/css/app.css?_ver='.config('app.asset_version')) }}" rel="stylesheet">

    @if(setting_item('enable_cookie_consent'))
        <link rel="stylesheet" href="{{asset('libs/cookie-consent/cookieconsent.css')}}" media="print" onload="this.media='all'">
    @endif

    {!! \App\Helpers\Assets::css() !!}
    {!! \App\Helpers\Assets::js() !!}
    @include('Layout::parts.global-script')
    <!-- Styles -->
    @yield('head')
    <style>
        :root{
            --main-color:{{setting_item('style_main_color','#1967D2')}}
        }
    </style>
    {{--Custom Style--}}
    <link href="{{ route('core.style.customCss') }}" rel="stylesheet">

    @if(setting_item_with_lang('enable_rtl'))
        <link href="{{ asset('themes/superio/dist/frontend/css/rtl.css?_ver='.config('app.asset_version')) }}" rel="stylesheet">
    @endif
    {!! setting_item('head_scripts') !!}
    {!! setting_item_with_lang_raw('head_scripts') !!}

    @php event(new \Modules\Layout\Events\LayoutEndHead()); @endphp

</head>
<body data-anm=".anm" class="frontend-page {{$body_class ?? ''}} @if(!empty($is_home) or !empty($header_transparent)) header_transparent @endif @if(setting_item_with_lang('enable_rtl')) is-rtl @endif @if(is_api()) is_api @endif">
    @php event(new \Modules\Layout\Events\LayoutBeginBody()); @endphp

    {!! setting_item('body_scripts') !!}
    {!! setting_item_with_lang_raw('body_scripts') !!}
    <div class="bravo_wrap page-wrapper">
        @if(!is_api())
            @include('Layout::parts.header')
        @endif

        @yield('content')

        @include('Layout::parts.footer')
    </div>
    {!! setting_item('footer_scripts') !!}
    {!! setting_item_with_lang_raw('footer_scripts') !!}
    @php event(new \Modules\Layout\Events\LayoutEndBody()); @endphp

</body>
</html>
