<section class="job-section pt-0 style-7">
    <div class="auto-container">
        <div class="sec-title-outer">
            <div class="sec-title">
                <h2><?php echo e($title); ?></h2>
                <div class="text"><?php echo e($sub_title); ?></div>
            </div>
            <?php if(!empty($categories)): ?>
            <div class="select-box-outer">
                <span class="icon fa fa-angle-down"></span>
                <select name="category_id">
                    <option value=""><?php echo e(__("All Categories")); ?></option>
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $translation = $cat->translateOrOrigin(app()->getLocale()); ?>
                        <option value="<?php echo e($cat->id); ?>"><?php echo e($translation->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <?php endif; ?>
        </div>

        <div class="row wow fadeInUp">
            <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="job-block col-lg-6 col-md-12 col-sm-12 <?php if($row->category): ?> category_<?php echo e($row->category->id); ?> <?php endif; ?>">
                    <?php echo $__env->make("Job::frontend.layouts.loop.job-item-7", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <?php if(!empty($load_more_url)): ?>
        <div class="btn-box">
            <a href="<?php echo e($load_more_url); ?>" class="theme-btn btn-style-one bg-blue"><span class="btn-title"><?php echo e(__("Load More Listing")); ?></span></a>
        </div>
        <?php endif; ?>
    </div>
</section>
<?php /**PATH /Users/imac/Sites/localhost/Superio.2.6.1/superio.2.6.1/themes/Superio/Job/Views/frontend/layouts/blocks/jobs-list/style_7.blade.php ENDPATH**/ ?>