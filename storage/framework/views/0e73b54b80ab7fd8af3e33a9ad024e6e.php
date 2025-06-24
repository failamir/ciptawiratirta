<form class="form bravo-form-register" method="post">
    <?php echo csrf_field(); ?>
    <div class="form-group">
        <div class="btn-box row">
            <div class="col-lg-6 col-md-12">
                <input class="checked" type="radio" name="type" id="checkbox1" value="candidate" checked/>
                <label for="checkbox1" class="theme-btn btn-style-four"><i class="la la-user"></i> <?php echo e(__("Candidate")); ?></label>
            </div>
            <div class="col-lg-6 col-md-12">
                <input class="checked" type="radio" name="type" id="checkbox2" value="employer"/>
                <label for="checkbox2" class="theme-btn btn-style-four"><i class="la la-briefcase"></i> <?php echo e(__("Employer")); ?></label>
            </div>
        </div>
    </div>


    <div class="row form-group">
        <div class="col-lg-6 col-md-12">
            <div class="form-group">
                <label><?php echo e(__('First Name')); ?></label>
                <input type="text" class="form-control" name="first_name" autocomplete="off" placeholder="<?php echo e(__("First Name")); ?>">
                <i class="input-icon field-icon icofont-waiter-alt"></i>
                <span class="invalid-feedback error error-first_name"></span>
            </div>
        </div>
        <div class="col-lg-6 col-md-12">
            <div class="form-group">
                <label><?php echo e(__('Last Name')); ?></label>
                <input type="text" class="form-control" name="last_name" autocomplete="off" placeholder="<?php echo e(__("Last Name")); ?>">
                <i class="input-icon field-icon icofont-waiter-alt"></i>
                <span class="invalid-feedback error error-last_name"></span>
            </div>
        </div>
    </div>

    <div class="form-group input-condition" data-type="employer" style="display: none">
        <label><?php echo e(__('Company name')); ?></label>
        <input type="text" name="company_name" placeholder="<?php echo e(__('Company name')); ?>">
        <span class="invalid-feedback error error-company_name"></span>
    </div>

    <div class="form-group">
        <label><?php echo e(__('Email address')); ?></label>
        <input type="email" name="email" placeholder="<?php echo e(__('Email address')); ?>" required>
        <span class="invalid-feedback error error-email"></span>
    </div>

    <div class="form-group">
        <label><?php echo e(__("Password")); ?></label>
        <input id="password-field" type="password" name="password" value="" placeholder="<?php echo e(__("Password")); ?>">
        <span class="invalid-feedback error error-password"></span>
    </div>
    <div class="form-group">
        <label><?php echo e(__("Re-Password")); ?></label>
        <input id="re-password-field" type="password" name="password_confirmation" value="" placeholder="<?php echo e(__("Re-Password")); ?>">
        <span class="invalid-feedback error error-password_confirmation"></span>
    </div>

    <?php if(setting_item("recaptcha_enable")): ?>
        <div class="form-group">
            <?php echo e(recaptcha_field($captcha_action ?? 'register')); ?>

            <span class="invalid-feedback error error-recaptcha"></span>
        </div>
    <?php endif; ?>

    <div class="form-group">
        <button class="theme-btn btn-style-one " type="submit" name="Register"><?php echo e(__('Sign Up')); ?>

            <span class="spinner-grow spinner-grow-sm icon-loading" role="status" aria-hidden="true"></span>
        </button>
    </div>
    <?php if(setting_item('facebook_enable') or setting_item('google_enable') or setting_item('twitter_enable') or setting_item('linkedin_enable')): ?>
        <div class="bottom-box">
            <div class="divider"><span><?php echo e(__("or")); ?></span></div>
            <div class="btn-box row">
                <?php if(setting_item('facebook_enable')): ?>
                    <div class="col-lg-6 col-md-12">
                        <a href="<?php echo e(url('/social-login/facebook')); ?>" class="theme-btn social-btn-two facebook-btn btn_login_fb_link"><i class="fab fa-facebook-f"></i><?php echo e(__('Facebook')); ?></a>
                    </div>
                <?php endif; ?>
                <?php if(setting_item('google_enable')): ?>
                    <div class="col-lg-6 col-md-12">
                        <a href="<?php echo e(url('social-login/google')); ?>" class="theme-btn social-btn-two google-btn btn_login_gg_link"><i class="fab fa-google"></i><?php echo e(__('Google')); ?></a>
                    </div>
                <?php endif; ?>
                <?php if(setting_item('twitter_enable')): ?>
                    <div class="col-lg-6 col-md-12">
                        <a href="<?php echo e(url('social-login/twitter')); ?>" class="theme-btn social-btn-two twitter-btn btn_login_tw_link"><i class="fab fa-twitter"></i> <?php echo e(__("Log In via Twitter")); ?></a>
                    </div>
                <?php endif; ?>
                <?php if(setting_item('linkedin_enable')): ?>
                    <div class="col-lg-6 col-md-12">
                        <a href="<?php echo e(url('social-login/linkedin')); ?>" class="theme-btn social-btn-two linkedin-btn btn_login_lk_link"><i class="fab fa-linkedin"></i> <?php echo e(__("Log In via LinkedIn")); ?></a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>
</form>
<?php /**PATH /Users/imac/Sites/localhost/Superio.2.6.1/superio.2.6.1/modules/Layout/auth/register-form.blade.php ENDPATH**/ ?>