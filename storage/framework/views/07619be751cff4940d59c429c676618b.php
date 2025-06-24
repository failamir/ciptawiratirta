<section class="job-section-five">
    <div class="auto-container">

        <div class="sec-title-outer">
            <div class="sec-title">
                <h2><?php echo e($title); ?></h2>
                <div class="text"><?php echo e($sub_title); ?></div>
            </div>
            <a href="<?php echo e($load_more_url); ?>" class="link"><?php echo e(__('Browse All')); ?> <span class="icon fa fa-angle-right"></span></a>
        </div>

        <div class="outer-box wow fadeInUp">
            <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="job-block-five">
                    <?php echo $__env->make("Job::frontend.layouts.loop.job-item-6", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<?php /**PATH /Users/imac/Sites/localhost/Superio.2.6.1/superio.2.6.1/themes/Superio/Job/Views/frontend/layouts/blocks/jobs-list/style_6.blade.php ENDPATH**/ ?>