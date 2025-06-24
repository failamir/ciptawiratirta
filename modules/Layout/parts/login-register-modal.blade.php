<div class="modal fade" id="login">
    <div class="modal-dialog  modal-dialog-centered" role="document">
        <div class="modal-content">
            <a href="#" rel="modal:close" class="close-modal " data-dismiss="modal" aria-label="Close">{{ __("Close") }}</a>
            <div id="login-modal">
                <div class="login-form default-form">
                    <div class="form-inner">
                        @if($site_title = setting_item("site_title"))
                            <h3>{{ __("Login to :site_title", ['site_title' => $site_title]) }}</h3>
                        @else
                            <h3>{{ __("Login") }}</h3>
                        @endif

                        @include('Layout::auth/login-form',['popup'=>true])
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="register">
    <div class="modal-dialog  modal-dialog-centered" role="document">
        <div class="modal-content">
            <a href="#" rel="modal:close" class="close-modal " data-dismiss="modal" aria-label="Close">{{ __("Close") }}</a>
            <div id="login-modal">
                <div class="login-form default-form">
                    <div class="form-inner">
                        @if($site_title = setting_item("site_title"))
                            <h3>{{ __("Create a Free :site_title Account", ['site_title' => $site_title]) }}</h3>
                        @else
                            <h3>{{ __("Sign Up") }}</h3>
                        @endif
                        @include('Layout::auth/register-form')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
