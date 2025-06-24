<!--Login Form-->
<form method="post" class="bravo-form-login" action="<?php echo e(route('login')); ?>">
    <input type="hidden" name="redirect" value="<?php echo e(request()->query('redirect')); ?>">
    <?php echo csrf_field(); ?>
    <div class="form-group">
        <label><?php echo e(__('Email address')); ?></label>
        <input type="text" name="email" placeholder="<?php echo e(__('Email address')); ?>" required>
        <span class="invalid-feedback error error-email"></span>
    </div>

    <div class="form-group">
        <label><?php echo e(__("Password")); ?></label>
        <input type="password" name="password" value="" placeholder="<?php echo e(__("Password")); ?>">
        <span class="invalid-feedback error error-password"></span>
    </div>

    <div class="form-group">
        <div class="field-outer">
            <div class="input-group checkboxes square">
                <input type="checkbox" name="remember" value="1" id="remember">
                <label for="remember" class="remember"><span class="custom-checkbox"></span> <?php echo e(__("Remember me")); ?></label>
            </div>
            <a href="<?php echo e(route("password.request")); ?>" class="pwd"><?php echo e(__("Forgot password?")); ?></a>
        </div>
    </div>
    <?php if(setting_item("recaptcha_enable")): ?>
        <div class="form-group">
            <?php echo e(recaptcha_field($captcha_action ?? 'login')); ?>

            <span class="invalid-feedback error error-recaptcha"></span>
        </div>
    <?php endif; ?>

    <div class="form-group">
        <button class="theme-btn btn-style-one" type="submit" name="log-in"><?php echo e(__("Log In")); ?>

            <span class="spinner-grow spinner-grow-sm icon-loading" role="status" aria-hidden="true"></span>
        </button>
    </div>
    <div class="bottom-box">
        <div class="text"><?php echo e(__("Don't have an account?")); ?> <a href="<?php echo e(route('register')); ?>" class="<?php echo e((isset($popup) && $popup) ? 'bc-call-modal' : ''); ?> signup"><?php echo e(__("Signup")); ?></a></div>
        <?php if(setting_item('facebook_enable') or setting_item('google_enable') or setting_item('linkedin_enable') or setting_item('twitter_enable')): ?>
            <div class="divider"><span><?php echo e(__("or")); ?></span></div>
            <div class="btn-box row">
                <?php if(setting_item('facebook_enable')): ?>
                    <div class="col-lg-6 col-md-12">
                        <a href="<?php echo e(url('/social-login/facebook')); ?>" data-channel="facebook" class="theme-btn social-btn-two facebook-btn"><i class="fab fa-facebook-f"></i> <?php echo e(__("Log In via Facebook")); ?></a>
                    </div>
                <?php endif; ?>
                <?php if(setting_item('google_enable')): ?>
                    <div class="col-lg-6 col-md-12">
                        <a href="<?php echo e(url('social-login/google')); ?>" data-channel="google" class="theme-btn social-btn-two google-btn"><i class="fab fa-google"></i> <?php echo e(__("Log In via Gmail")); ?></a>
                    </div>
                <?php endif; ?>
                <?php if(setting_item('twitter_enable')): ?>
                    <div class="col-lg-6 col-md-12">
                        <a href="<?php echo e(url('social-login/twitter')); ?>" data-channel="twitter" class="theme-btn social-btn-two twitter-btn"><i class="fab fa-twitter"></i> <?php echo e(__("Log In via Twitter")); ?></a>
                    </div>
                <?php endif; ?>
                <?php if(setting_item('linkedin_enable')): ?>
                    <div class="col-lg-6 col-md-12">
                        <a href="<?php echo e(url('social-login/linkedin')); ?>" data-channel="linkedin" class="theme-btn social-btn-two linkedin-btn"><i class="fab fa-linkedin"></i> <?php echo e(__("Log In via LinkedIn")); ?></a>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>

</form>
<?php /**PATH /Users/imac/Sites/localhost/Superio.2.6.1/superio.2.6.1/modules/Layout/auth/login-form.blade.php ENDPATH**/ ?>