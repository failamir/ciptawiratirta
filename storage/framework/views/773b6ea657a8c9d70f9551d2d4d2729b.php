<div class="modal fade" id="login">
    <div class="modal-dialog  modal-dialog-centered" role="document">
        <div class="modal-content">
            <a href="#" rel="modal:close" class="close-modal " data-dismiss="modal" aria-label="Close"><?php echo e(__("Close")); ?></a>
            <div id="login-modal">
                <div class="login-form default-form">
                    <div class="form-inner">
                        <?php if($site_title = setting_item("site_title")): ?>
                            <h3><?php echo e(__("Login to :site_title", ['site_title' => $site_title])); ?></h3>
                        <?php else: ?>
                            <h3><?php echo e(__("Login")); ?></h3>
                        <?php endif; ?>

                        <?php echo $__env->make('Layout::auth/login-form',['popup'=>true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="register">
    <div class="modal-dialog  modal-dialog-centered" role="document">
        <div class="modal-content">
            <a href="#" rel="modal:close" class="close-modal " data-dismiss="modal" aria-label="Close"><?php echo e(__("Close")); ?></a>
            <div id="login-modal">
                <div class="login-form default-form">
                    <div class="form-inner">
                        <?php if($site_title = setting_item("site_title")): ?>
                            <h3><?php echo e(__("Create a Free :site_title Account", ['site_title' => $site_title])); ?></h3>
                        <?php else: ?>
                            <h3><?php echo e(__("Sign Up")); ?></h3>
                        <?php endif; ?>
                        <?php echo $__env->make('Layout::auth/register-form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /Users/imac/Sites/localhost/Superio.2.6.1/superio.2.6.1/modules/Layout/parts/login-register-modal.blade.php ENDPATH**/ ?>