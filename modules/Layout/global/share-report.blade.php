@php
$title = $title ?? __("Share");
$type = $type ?? 'job';
@endphp
<div class="other-options">
    <div class="row">
        <div class="col-8">
            <div class="social-share">
                <h5>{{ $title }}</h5>
                <a href="https://www.facebook.com/sharer/sharer.php?u={{ $row->getDetailUrl() }}&amp;title={{ $translation->title }}" target="_blank" class="facebook">
                    <i class="fab fa-facebook-f"></i>
                    <span class="d-md-inline-flex d-none">{{ __("Facebook") }}</span>
                </a>
                <a href="https://twitter.com/share?url={{ $row->getDetailUrl() }}&amp;title={{ $translation->title }}" target="_blank" class="twitter">
                    <i class="fab fa-twitter"></i>
                    <span class="d-md-inline-flex d-none">{{ __("Twitter") }}</span>
                </a>
                <a href="http://pinterest.com/pin/create/button/?url={{ $row->getDetailUrl() }}&description={{ $translation->title }}" target="_blank" class="google">
                    <i class="fab fa-pinterest"></i>
                    <span class="d-md-inline-flex d-none">{{ __("Pinterest") }}</span>
                </a>
            </div>

        </div>
        <div class="col-4 text-right align-items-end justify-content-end">
            <a href="#customer-report" class="theme-btn btn-style-two sup-report bc-call-modal customer-report"><i class="far fa-flag"></i> {{ __("Report") }}</a>
        </div>
    </div>

</div>

<div class="modal fade" id="customer-report">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div id="report-modal" class="bc-modal-body">
        <div class="form-inner">
            <h3 class="text-center mb-2">{{ __("Report") }}</h3>
            <form method="POST" class="report-form" action="{{ route('customer.report') }}">
                @csrf
                <input type="hidden" name="service_id" value="{{ $row->id }}">
                <input type="hidden" name="service_type" value="{{ $type }}">
                <div class="form-group">
                    <label for="report_name">{{ __("Name") }} <span class="text-danger">*</span></label>
                    <input type="text" id="report_name" name="name" class="form-control" value="">
                    <span class="invalid-feedback error error-name"></span>
                </div>
                <div class="form-group">
                    <label for="report_email">{{ __("Email") }} <span class="text-danger">*</span></label>
                    <input type="email" id="report_email" name="email" class="form-control" value="">
                    <span class="invalid-feedback error error-email"></span>
                </div>
                <div class="form-group">
                    <label for="report_description">{{ __("Description") }} <span class="text-danger">*</span></label>
                    <textarea id="report_description" name="description" class="form-control"></textarea>
                    <span class="invalid-feedback error error-description"></span>
                </div>
                @if(setting_item("recaptcha_enable"))
                    <div class="form-group">
                        {{ recaptcha_field($captcha_action ?? 'report') }}
                        <span class="invalid-feedback error error-recaptcha"></span>
                    </div>
                @endif
                <div class="text-right">
                    <button type="submit" class="theme-btn btn-style-one">{{ __("Report") }}
                        <span class="spinner-grow spinner-grow-sm icon-loading" role="status" aria-hidden="true"></span>
                    </button>
                </div>
                <div class="col-sm-12 mt-3">
                    <div class="form-mess text-center"></div>
                </div>
            </form>
        </div>
    </div>
        </div>
    </div>
</div>
