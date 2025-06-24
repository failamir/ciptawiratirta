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
            checkout:'{{is_api() ? route('api.booking.doCheckout') : route('booking.doCheckout')}}',
            applyJob: '{{ route('job.apply-job') }}'
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
    @if(auth()->user())
        jobCore.media = {
        groups:{!! json_encode(config('bc.media.groups')) !!},
    }
    @endif
    var i18n = {
        warning:"{{__("Warning")}}",
        success:"{{__("Success")}}",
        applied:"{{ __("Applied") }}",
        chooseACv:"{{ __("Choose a cv") }}",
        follow_save:"{{__('Follow')}}",
        follow_saved:"{{__('Following')}}",
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
