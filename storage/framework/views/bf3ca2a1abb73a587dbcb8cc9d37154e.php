<?php if(!is_api() && empty($footer_null)): ?>
    <!-- Main Footer -->
    <?php
        $footer_style = $row->footer_style ?? '';
        if(empty($footer_style)) $footer_style = setting_item_with_lang('footer_style');
    ?>
    <footer class="main-footer <?php echo e($footer_style); ?> <?php if($footer_style == 'style_1' && empty($is_home)): ?> alternate5 <?php endif; ?>">
        <div class="auto-container">
            <!--Widgets Section-->
            <div class="widgets-section wow fadeInUp">
                <div class="row">
                    <?php if(!empty($info_contact = clean(setting_item_with_lang('footer_info_text')))): ?>
                        <div class="big-column col-xl-4 col-lg-3 col-md-12">
                            <div class="footer-column about-widget">
                                <?php
                                    $logo_id = setting_item("logo_id");
                                    if($footer_style == 'style-two' || $footer_style == 'style-six') $logo_id = setting_item("logo_white_id");;
                                    $logo = get_file_url($logo_id,'full');
                                ?>
                                <div class="logo">
                                    <a href="<?php echo e(url(app_get_locale(false,'/'))); ?>">
                                        <img src="<?php echo e($logo); ?>" alt="logo footer">
                                    </a>
                                </div>
                                <?php echo clean($info_contact); ?>

                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="big-column col-xl-8 col-lg-9 col-md-12">
                        <div class="row">
                            <?php if($list_widget_footers = setting_item_with_lang("list_widget_footer")): ?>
                                <?php $list_widget_footers = json_decode($list_widget_footers);?>
                                <?php $__currentLoopData = $list_widget_footers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="footer-column col-lg-<?php echo e($item->size ?? '3'); ?> col-md-6 col-sm-12">
                                        <div class="footer-widget links-widget">
                                            <h4 class="widget-title"><?php echo e($item->title); ?></h4>
                                            <div class="widget-content">
                                                <?php echo clean($item->content); ?>

                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Bottom-->
        <div class="footer-bottom">
            <div class="auto-container">
                <div class="outer-box">
                    <div class="copyright-text">
                        <?php echo @clean(setting_item_with_lang('copyright')); ?>

                    </div>
                    <div class="social-links">
                        <?php echo @clean(setting_item_with_lang('footer_socials')); ?>

                    </div>
                </div>
            </div>
        </div>

        <!-- Scroll To Top -->
        <div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-angle-up"></span></div>
    </footer>
    <!-- End Main Footer -->

<?php endif; ?>

<?php echo $__env->make('Layout::parts.login-register-modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php if(Auth::user()): ?>
	<?php echo $__env->make('Media::browser', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>

<?php if(!is_candidate() || empty($candidate)): ?>
    <div class="bc-alert-popup">
        <div class="message-box warning"></div>
    </div>
<?php endif; ?>
<link rel="stylesheet" href="<?php echo e(asset('libs/flags/css/flag-icon.min.css')); ?>">

<?php echo \App\Helpers\Assets::css(true); ?>



<script src="<?php echo e(asset('libs/lazy-load/intersection-observer.js')); ?>"></script>
<script async src="<?php echo e(asset('libs/lazy-load/lazyload.min.js')); ?>"></script>
<script>
    // Set the options to make LazyLoad self-initialize
    window.lazyLoadOptions = {
        elements_selector: ".lazy",
        // ... more custom settings?
    };

    // Listen to the initialization event and get the instance of LazyLoad
    window.addEventListener('LazyLoad::Initialized', function (event) {
        window.lazyLoadInstance = event.detail.instance;
    }, false);
</script>
<script src="<?php echo e(asset('libs/jquery-3.6.0.min.js')); ?>"></script>
<script src="<?php echo e(asset('libs/jquery-migrate/jquery-migrate.min.js')); ?>"></script>
<script src="<?php echo e(asset('libs/header.js')); ?>"></script>
<script>
    $(document).on('ready', function () {
        $.jobCoreHeader.init($('#header'));
    });
</script>
<script src="<?php echo e(asset('libs/lodash.min.js')); ?>"></script>
<script src="<?php echo e(asset('libs/vue/vue'.(!env('APP_DEBUG') ? '.min':'').'.js')); ?>"></script>
<script src="<?php echo e(asset('libs/tinymce/js/tinymce/tinymce.min.js')); ?>" ></script>

<script src="<?php echo e(asset('js/functions.js?_ver='.config('app.asset_version'))); ?>"></script>

<script src="<?php echo e(asset('themes/superio/assets/js/popper.min.js')); ?>"></script>
<script src="<?php echo e(asset('themes/superio/assets/js/jquery-ui.min.js')); ?>"></script>
<script src="<?php echo e(asset('themes/superio/assets/js/chosen.min.js')); ?>"></script>
<script src="<?php echo e(asset('libs/select2/js/select2.min.js')); ?>" ></script>
<script src="<?php echo e(asset('themes/superio/assets/js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('libs/bootbox/bootbox.min.js')); ?>"></script>
<script src="<?php echo e(asset('themes/superio/assets/js/jquery.fancybox.js')); ?>"></script>
<script src="<?php echo e(asset('themes/superio/assets/js/mmenu.polyfills.js')); ?>"></script>
<script src="<?php echo e(asset('themes/superio/assets/js/mmenu.js')); ?>"></script>
<script src="<?php echo e(asset('themes/superio/assets/js/appear.js')); ?>"></script>
<script src="<?php echo e(asset('themes/superio/assets/js/anm.min.js')); ?>"></script>
<script src="<?php echo e(asset('themes/superio/assets/js/owl.js')); ?>"></script>
<script src="<?php echo e(asset('themes/superio/assets/js/wow.js')); ?>"></script>
<script src="<?php echo e(asset('themes/superio/assets/js/script.js?_ver='.config('app.asset_version'))); ?>"></script>

<?php if(Auth::user()): ?>
    <script src="<?php echo e(asset('module/media/js/browser.js?_ver='.config('app.asset_version'))); ?>"></script>
<?php endif; ?>

<script src="<?php echo e(asset('libs/pusher.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/home.js?_ver='.config('app.asset_version'))); ?>"></script>

<?php if(!empty($is_user_page)): ?>
	<script src="<?php echo e(asset('module/user/js/user.js?_ver='.config('app.asset_version'))); ?>"></script>
<?php endif; ?>
<?php if(setting_item('cookie_agreement_enable')==1 and request()->cookie('booking_cookie_agreement_enable') !=1 and !is_api()  and !isset($_COOKIE['booking_cookie_agreement_enable'])): ?>
	<div class="booking_cookie_agreement p-3 fixed-bottom">
		<div class="container d-flex ">
            <div class="content-cookie"><?php echo setting_item_with_lang('cookie_agreement_content'); ?></div>
            <button class="btn save-cookie"><?php echo setting_item_with_lang('cookie_agreement_button_text'); ?></button>
        </div>
	</div>
	<script>
        var save_cookie_url = '<?php echo e(route('core.cookie.check')); ?>';
	</script>
	<script src="<?php echo e(asset('js/cookie.js?_ver='.config('app.asset_version'))); ?>"></script>
<?php endif; ?>
<?php echo $__env->make('Layout::parts.cookie-consent-init', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo \App\Helpers\Assets::js(true); ?>


<?php echo $__env->yieldContent('footer'); ?>
<?php echo $__env->yieldPushContent('js'); ?>

<?php \App\Helpers\ReCaptchaEngine::scripts() ?>
<?php /**PATH /Users/imac/Sites/localhost/Superio.2.6.1/superio.2.6.1/themes/Superio/Layout/parts/footer.blade.php ENDPATH**/ ?>