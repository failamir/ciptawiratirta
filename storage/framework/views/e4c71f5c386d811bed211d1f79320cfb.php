
<?php $__env->startSection('content'); ?>
    <?php if($row->template_id): ?>
        <div class="page-template-content page-<?php echo e($row->slug); ?>">
            <?php echo $row->getProcessedContent(); ?>

        </div>
    <?php else: ?>
        <section class="tnc-section">
            <div class="auto-container">
                <div class="sec-title text-center">
                    <h2><?php echo e($translation->title); ?></h2>
                    <div class="text"><a href="<?php echo e(home_url()); ?>"><?php echo e(__("Home")); ?></a> / <?php echo e($translation->title); ?></div>
                </div>
                <div class="blog-content">
                    <?php echo $translation->content; ?>

                </div>
            </div>
        </section>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/imac/Sites/localhost/Superio.2.6.1/superio.2.6.1/modules/Page/Views/frontend/detail.blade.php ENDPATH**/ ?>