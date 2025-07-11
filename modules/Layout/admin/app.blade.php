<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $page_title ?? 'Dashboard'}} - {{setting_item('site_title') ?? 'JobCore'}}</title>

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

    <meta name="robots" content="noindex, nofollow" />
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <!-- Styles -->
    <link href="{{ asset('libs/select2/css/select2.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/vue-select@3.0.0/dist/vue-select.css">
    <link href="{{ asset('libs/flags/css/flag-icon.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{url('libs/daterange/daterangepicker.css')}}"/>
    <link href="{{ asset('themes/admin/libs/bootstrap-4.6.2-dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('themes/admin/libs/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dist/admin/css/app.css') }}" rel="stylesheet">
    {!! \App\Helpers\Assets::css() !!}
    {!! \App\Helpers\Assets::js() !!}
    <script>
        var jobCore  = {
            url:'{{url('/')}}',
            admin_url:'{{route('admin.index')}}',
            map_provider:'{{setting_item('map_provider')}}',
            map_gmap_key:'{{setting_item('map_gmap_key')}}',
            csrf:'{{csrf_token()}}',
            date_format:'{{get_moment_date_format()}}',
            markAsRead:'{{route('core.admin.notification.markAsRead')}}',
            markAllAsRead:'{{route('core.admin.notification.markAllAsRead')}}',
            loadNotify : '{{route('core.admin.notification.loadNotify')}}',
            pusher_api_key : '{{setting_item("pusher_api_key")}}',
            pusher_cluster : '{{setting_item("pusher_cluster")}}',
            isAdmin : {{is_admin() ? 1 : 0}},
            currentUser: {{(int)Auth::id()}},
            media:{
                groups:{!! json_encode(config('bc.media.groups')) !!}
            }
        };
        var i18n = {
            warning:"{{__("Warning")}}",
            success:"{{__("Success")}}",
            confirm_delete:"{{__("Do you want to delete?")}}",
            confirm_recovery:"{{__("Do you want to restore?")}}",
            confirm:"{{__("Confirm")}}",
            cancel:"{{__("Cancel")}}",
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

        var image_editer = {
            language: '{{ app()->getLocale() }}',
            translations: {
        {{ app()->getLocale() }}: {
            'header.image_editor_title': '{{ __('Image Editor') }}',
                'header.toggle_fullscreen': '{{ __('Toggle fullscreen') }}',
                'header.close': '{{ __('Close') }}',
                'header.close_modal': '{{ __('Close window') }}',
                'toolbar.download': '{{ __('Save Change') }}',
                'toolbar.save': '{{ __('Save') }}',
                'toolbar.apply': '{{ __('Apply') }}',
                'toolbar.saveAsNewImage': '{{ __('Save As New Image') }}',
                'toolbar.cancel': '{{ __('Cancel') }}',
                'toolbar.go_back': '{{ __('Go Back') }}',
                'toolbar.adjust': '{{ __('Adjust') }}',
                'toolbar.effects': '{{ __('Effects') }}',
                'toolbar.filters': '{{ __('Filters') }}',
                'toolbar.orientation': '{{ __('Orientation') }}',
                'toolbar.crop': '{{ __('Crop') }}',
                'toolbar.resize': '{{ __('Resize') }}',
                'toolbar.watermark': '{{ __('Watermark') }}',
                'toolbar.focus_point': '{{ __('Focus point') }}',
                'toolbar.shapes': '{{ __('Shapes') }}',
                'toolbar.image': '{{ __('Image') }}',
                'toolbar.text': '{{ __('Text') }}',
                'adjust.brightness': '{{ __('Brightness') }}',
                'adjust.contrast': '{{ __('Contrast') }}',
                'adjust.exposure': '{{ __('Exposure') }}',
                'adjust.saturation': '{{ __('Saturation') }}',
                'orientation.rotate_l': '{{ __('Rotate Left') }}',
                'orientation.rotate_r': '{{ __('Rotate Right') }}',
                'orientation.flip_h': '{{ __('Flip Horizontally') }}',
                'orientation.flip_v': '{{ __('Flip Vertically') }}',
                'pre_resize.title': '{{ __('Would you like to reduce resolution before editing the image?') }}',
                'pre_resize.keep_original_resolution': '{{ __('Keep original resolution') }}',
                'pre_resize.resize_n_continue': '{{ __('Resize & Continue') }}',
                'footer.reset': '{{ __('Reset') }}',
                'footer.undo': '{{ __('Undo') }}',
                'footer.redo': '{{ __('Redo') }}',
                'spinner.label': '{{ __('Processing...') }}',
                'warning.too_big_resolution': '{{ __('The resolution of the image is too big for the web. It can cause problems with Image Editor performance.') }}',
                'common.x': '{{ __('x') }}',
                'common.y': '{{ __('y') }}',
                'common.width': '{{ __('width') }}',
                'common.height': '{{ __('height') }}',
                'common.custom': '{{ __('custom') }}',
                'common.original': '{{ __('original') }}',
                'common.square': '{{ __('square') }}',
                'common.opacity': '{{ __('Opacity') }}',
                'common.apply_watermark': '{{ __('Apply watermark') }}',
                'common.url': '{{ __('URL') }}',
                'common.upload': '{{ __('Upload') }}',
                'common.gallery': '{{ __('Gallery') }}',
                'common.text': '{{ __('Text') }}',
        }
        }
        };

    </script>
    <script src="{{ asset('libs/tinymce/js/tinymce/tinymce.min.js') }}" ></script>
    @yield('script.head')

</head>
<body class="{{($enable_multi_lang ?? '') ? 'enable_multi_lang' : '' }} @if(setting_item('site_enable_multi_lang')) site_enable_multi_lang @endif">
<div id="app">
    <div class="main-header d-flex">
        @include('Layout::admin.parts.header')
    </div>
    <div class="main-sidebar">
        @include('Layout::admin.parts.sidebar')
    </div>
    <div class="main-content">
        @include('Layout::admin.parts.bc')
        @yield('content')
        <footer class="main-footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 copy-right" >
                        {{date('Y')}} &copy; {{__('JobCore by')}} <a href="{{__('https://www.bookingcore.co')}}" target="_blank">{{__('BC Team')}}</a>
                    </div>
                    <div class="col-md-6">
                        <div class="text-md-right footer-links d-none d-sm-block">
                            <a href="{{__('https://www.facebook.com/bookingcore')}}" target="_blank">{{__('About Us')}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <div class="backdrop-sidebar-mobile"></div>
</div>

@include('Media::browser')

<!-- Scripts -->
{!! \App\Helpers\Assets::css(true) !!}
<script src="{{ asset('libs/pusher.min.js') }}"></script>
<script src="{{ asset('libs/jquery-3.6.3.min.js?_ver='.config('app.asset_version')) }}" ></script>
<script src="{{ asset('themes/admin/libs/bootstrap-4.6.2-dist/js/bootstrap.bundle.min.js?_ver='.config('app.asset_version')) }}" ></script>
<script src="{{ asset('dist/admin/js/manifest.js?_ver='.config('app.version')) }}" ></script>
<script src="{{ asset('dist/admin/js/vendor.js?_ver='.config('app.version')) }}" ></script>
<script src="{{ asset('libs/filerobot-image-editor/filerobot-image-editor.min.js?_ver='.config('app.asset_version')) }}"></script>

<script src="{{ asset('dist/admin/js/app.js?_ver='.config('app.version')) }}" ></script>
<script src="{{ asset('libs/vue/vue'.(!env('APP_DEBUG') ? '.min':'').'.js') }}"></script>

<script src="{{ asset('libs/select2/js/select2.min.js') }}" ></script>
<script src="{{ asset('libs/bootbox/bootbox.min.js') }}"></script>

<script src="{{url('libs/daterange/moment.min.js')}}"></script>
<script src="{{url('libs/daterange/daterangepicker.min.js?_ver='.config('app.version'))}}"></script>

{!! \App\Helpers\Assets::js(true) !!}

@yield('script.body')

</body>
</html>
