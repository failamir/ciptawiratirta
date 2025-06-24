<!-- Job Section -->
<section class="job-section">
    <div class="auto-container">
        <div class="sec-title text-center">
            <h2><?php echo e($title); ?></h2>
            <div class="text"><?php echo e($sub_title); ?></div>
        </div>

        <div class="row wow fadeInUp">
            <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="job-block-three col-lg-4 col-md-6 col-sm-12">
                    <?php echo $__env->make("Job::frontend.layouts.loop.job-item-3", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <div class="btn-box">
            <a href="<?php echo e($load_more_url); ?>" class="theme-btn btn-style-one bg-blue"><span class="btn-title"><?php echo e(__("Load More Listing")); ?></span></a>
        </div>
    </div>
</section>
<!-- End Job Section -->
<?php /**PATH /Users/imac/Sites/localhost/Superio.2.6.1/superio.2.6.1/themes/Superio/Job/Views/frontend/layouts/blocks/jobs-list/style_3.blade.php ENDPATH**/ ?>