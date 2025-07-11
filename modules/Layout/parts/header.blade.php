<!-- Preloader -->
@php
    $site_favicon = setting_item('site_favicon');
@endphp
@if(setting_item('enable_preloader'))
    <div class="preloader bc-preload">
        @php
        $preloader_image = setting_item('preloader_image');
        @endphp
        @if(!empty($preloader_image))
            <img class="icon" src="{{ get_file_url($preloader_image, 'full') }}" alt="{{ setting_item("site_title") }}" />
        @else
            <span class="text">{{ __("LOADING") }}</span>

            @if($site_favicon)
                <img class="icon" src="{{ get_file_url($site_favicon, 'full') }}" alt="{{ setting_item("site_title") }}" />
            @endif
        @endif
    </div>
@endif
<!-- End Preloader -->

@php
    $header_class = $header_style = $row->header_style ?? 'normal';
    $logo_id = setting_item("logo_id");
    if($header_style == 'header-style-two'){
        $logo_id = setting_item('logo_white_id');
    }
    if(empty($is_home) && $header_style == 'normal' && empty($disable_header_shadow)){
        $header_class .= ' header-shaddow';
    }
@endphp
@if($header_style == 'normal')
    <!-- Header Span -->
    <span class="header-span"></span>
@endif
<!-- Main Header-->
<header class="main-header {{ $header_class }}">
    <!-- Main box -->
    <div class="main-box">
        <!--Nav Outer -->
        <div class="nav-outer">
            <div class="logo-box">
                <div class="logo">
                    <a href="{{ home_url() }}">
                        @if($logo_id)
                            @php $logo = get_file_url($logo_id,'full') @endphp
                            <img src="{{ $logo }}" alt="{{setting_item("site_title")}}">
                        @else
                            <img src="{{ asset('/images/logo.svg') }}" alt="logo">
                        @endif
                    </a>
                </div>
            </div>

            <nav class="nav main-menu">
                <?php generate_menu('primary') ?>
            </nav>
            <!-- Main Menu End-->
        </div>

        <div class="outer-box">
            <ul class="multi-lang">
                @include('Language::frontend.switcher-dropdown')
            </ul>
            <!--
            @if(Auth::user())
                <a href="{{route('user.wishList.index')}}" class="menu-btn wishlist-button">
                    @if(auth()->check())
                        <span class="count wishlist_count text-center">{{(int) auth()->user()->wishlist_count}}</span>
                    @endif
                    <span class="icon la la-bookmark-o"></span>
                </a>
            @endif
            -->
            @if(Auth::user())
                @include('Layout::parts.notification')
            @endif
            @if(!(isset($exception) && $exception->getStatusCode() == 404))
                <!-- Login/Register -->
                <div class="btn-box">
                    @if(!Auth::user())
                        <a href="#" class="theme-btn btn-style-three "><span class="bc-call-modal login">{{__("Login")}}</span>/ <span class="bc-call-modal signup">{{ __("Register") }}</span></a>
                    @else
                        <div class="login-item dropmenu-right dropdown show">
                            <a href="#" class="is_login dropdown-toggle" id="dropdownMenuUser" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                @if($avatar_url = Auth::user()->getAvatarUrl())
                                    <img class="avatar" src="{{$avatar_url}}" alt="{{ Auth::user()->getDisplayName()}}">
                                @else
                                    <span class="avatar-text">{{ucfirst( Auth::user()->getDisplayName()[0])}}</span>
                                @endif
                                <span class="full-name">{{Auth::user()->getDisplayName()}}</span>
                                <i class="flaticon-down-arrow"></i>
                            </a>
                            <ul class="dropdown-menu text-left" aria-labelledby="dropdownMenuUser">
                                @include('Layout::parts.user-menu')
                            </ul>
                            <form id="logout-form" action="{{ route('auth.logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    @endif
                    @if(is_employer())
                        <div class="d-flex align-items-center">
                            <a href="{{ route('user.create.job') }}" class="theme-btn @if($header_style == 'header-style-two') btn-style-five @else btn-style-one @endif @if(!auth()->check()) bc-call-modal login @endif">{{ __("Job Post") }}</a>
                        </div>
                    @endif
                </div>
            @endif
        </div>
    </div>

    <!-- Mobile Header -->
    <div class="mobile-header">
        <div class="logo">
            <a href="{{ url(app_get_locale(false,'/')) }}">
                @if($logo_id = setting_item("logo_id"))
                    @php $logo = get_file_url($logo_id,'full') @endphp
                    <img src="{{ $logo }}" alt="{{setting_item("site_title")}}">
                @else
                    <img src="{{ asset('/images/logo.svg') }}" alt="logo">
                @endif
            </a>
        </div>

        <!--Nav Box-->
        <div class="nav-outer clearfix">

            <div class="outer-box">
                @if(Auth::user())
                    @include('Layout::parts.notification')
                @endif
                <!-- Login/Register -->
                <div class="login-box">
                    @if(!Auth::user())
                        <a href="#" class="bc-call-modal login"><span class="icon-user"></span></a>
                    @else

                        <a href="#" class="is_login dropdown-toggle" id="dropdownMenuUser" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            @if($avatar_url = Auth::user()->getAvatarUrl())
                                <img class="avatar" src="{{$avatar_url}}" alt="{{ Auth::user()->getDisplayName()}}">
                            @else
                                <span class="avatar-text">{{ucfirst( Auth::user()->getDisplayName()[0])}}</span>
                            @endif
                        </a>
                        <ul class="dropdown-menu text-left" aria-labelledby="dropdownMenuUser">
                            @include('Layout::parts.user-menu')
                        </ul>
                    @endif
                </div>

                <a href="#nav-mobile" class="mobile-nav-toggler"><span class="flaticon-menu-1"></span></a>
            </div>
        </div>
    </div>

    <!-- Mobile Nav -->
    <div id="nav-mobile"></div>
</header>
<!--End Main Header -->

