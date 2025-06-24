<?php
$title = $title ?? __("Share");
$type = $type ?? 'job';
?>
<div class="other-options">
    <div class="row">
        <div class="col-8">
            <div class="social-share">
                <h5><?php echo e($title); ?></h5>
                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo e($row->getDetailUrl()); ?>&amp;title=<?php echo e($translation->title); ?>" target="_blank" class="facebook">
                    <i class="fab fa-facebook-f"></i>
                    <span class="d-md-inline-flex d-none"><?php echo e(__("Facebook")); ?></span>
                </a>
                <a href="https://twitter.com/share?url=<?php echo e($row->getDetailUrl()); ?>&amp;title=<?php echo e($translation->title); ?>" target="_blank" class="twitter">
                    <i class="fab fa-twitter"></i>
                    <span class="d-md-inline-flex d-none"><?php echo e(__("Twitter")); ?></span>
                </a>
                <a href="http://pinterest.com/pin/create/button/?url=<?php echo e($row->getDetailUrl()); ?>&description=<?php echo e($translation->title); ?>" target="_blank" class="google">
                    <i class="fab fa-pinterest"></i>
                    <span class="d-md-inline-flex d-none"><?php echo e(__("Pinterest")); ?></span>
                </a>
            </div>

        </div>
        <div class="col-4 text-right align-items-end justify-content-end">
            <a href="#customer-report" class="theme-btn btn-style-two sup-report bc-call-modal customer-report"><i class="far fa-flag"></i> <?php echo e(__("Report")); ?></a>
        </div>
    </div>

</div>

<div class="modal fade" id="customer-report">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div id="report-modal" class="bc-modal-body">
        <div class="form-inner">
            <h3 class="text-center mb-2"><?php echo e(__("Report")); ?></h3>
            <form method="POST" class="report-form" action="<?php echo e(route('customer.report')); ?>">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="service_id" value="<?php echo e($row->id); ?>">
                <input type="hidden" name="service_type" value="<?php echo e($type); ?>">
                <div class="form-group">
                    <label for="report_name"><?php echo e(__("Name")); ?> <span class="text-danger">*</span></label>
                    <input type="text" id="report_name" name="name" class="form-control" value="">
                    <span class="invalid-feedback error error-name"></span>
                </div>
                <div class="form-group">
                    <label for="report_email"><?php echo e(__("Email")); ?> <span class="text-danger">*</span></label>
                    <input type="email" id="report_email" name="email" class="form-control" value="">
                    <span class="invalid-feedback error error-email"></span>
                </div>
                <div class="form-group">
                    <label for="report_description"><?php echo e(__("Description")); ?> <span class="text-danger">*</span></label>
                    <textarea id="report_description" name="description" class="form-control"></textarea>
                    <span class="invalid-feedback error error-description"></span>
                </div>
                <?php if(setting_item("recaptcha_enable")): ?>
                    <div class="form-group">
                        <?php echo e(recaptcha_field($captcha_action ?? 'report')); ?>

                        <span class="invalid-feedback error error-recaptcha"></span>
                    </div>
                <?php endif; ?>
                <div class="text-right">
                    <button type="submit" class="theme-btn btn-style-one"><?php echo e(__("Report")); ?>

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
<?php /**PATH /Users/imac/Sites/localhost/Superio.2.6.1/superio.2.6.1/modules/Layout/global/share-report.blade.php ENDPATH**/ ?>