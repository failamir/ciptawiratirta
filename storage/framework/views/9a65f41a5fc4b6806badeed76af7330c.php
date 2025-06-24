<!-- Job Categories -->
<section class="job-categories">
    <div class="auto-container">
        <div class="sec-title text-center">
            <h2><?php echo e($title); ?></h2>
            <?php if(!empty($sub_title)): ?><div class="text"><?php echo e($sub_title); ?></div><?php endif; ?>
        </div>

        <div class="row wow fadeInUp">
            <?php if($job_categories): ?>
                <?php $__currentLoopData = $job_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $translation = $category->translateOrOrigin(app()->getLocale()); ?>
                    <!-- Category Block -->
                    <div class="category-block col-lg-4 col-md-6 col-sm-12">
                        <div class="inner-box">
                            <a href="<?php echo e(route('job.search', ['category' => $category->id])); ?>">
                                <div class="content <?php if(empty($category->icon)): ?> no-icon <?php endif; ?>">
                                    <?php if($category->icon): ?>
                                        <span class="icon <?php echo e($category->icon); ?>"></span>
                                    <?php endif; ?>
                                    <h4><?php echo e($translation->name); ?></h4>
                                    <?php if($category->openJobs->count()): ?>
                                        <p>(<?php echo e($category->openJobs->count()); ?> <?php echo e($category->openJobs->count() > 1 ? __("open positions") : __("open position")); ?>)</p>
                                    <?php endif; ?>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>
    </div>
</section>
<!-- End Job Categories -->
<?php /**PATH /Users/imac/Sites/localhost/Superio.2.6.1/superio.2.6.1/themes/Superio/Job/Views/frontend/layouts/blocks/job-categories/style_1.blade.php ENDPATH**/ ?>