<?php if(!empty($job_related) && count($job_related) > 0): ?>
    <!-- Related Jobs -->
    <div class="related-jobs">
        <div class="title-box">
            <h3><?php echo e(__("Related Jobs")); ?></h3>
        </div>
        <?php if(!empty($item_style) && $item_style == 'job-item-4'): ?>
            <div class="row">
                <?php $__currentLoopData = $job_related; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="job-block-four col-lg-6 col-md-6 col-sm-12">
                        <?php echo $__env->make("Job::frontend.layouts.loop." . $item_style, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php else: ?>
            <?php $__currentLoopData = $job_related; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="job-block">
                    <?php echo $__env->make("Job::frontend.layouts.loop.job-item-1", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </div>
<?php endif; ?>
<?php /**PATH /Users/imac/Sites/localhost/Superio.2.6.1/superio.2.6.1/themes/Superio/Job/Views/frontend/layouts/details/related.blade.php ENDPATH**/ ?>