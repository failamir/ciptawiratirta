
<?php $__env->startSection('content'); ?>
    <div class="b-container">
        <div class="b-panel">
            <?php echo $content; ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Email::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/imac/Sites/localhost/Superio.2.6.1/superio.2.6.1/modules/User/Views/emails/registered.blade.php ENDPATH**/ ?>