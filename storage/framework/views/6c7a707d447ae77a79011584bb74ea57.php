<section class="job-section alternate">
    <div class="auto-container">
        <div class="sec-title text-center">
            <h2><?php echo e($title); ?></h2>
            <div class="text"><?php echo e($sub_title); ?></div>
        </div>

        <?php if(!empty($categories)): ?>
            <div class="default-tabs tabs-box">
                <ul class="tab-buttons">
                    <li class="tab-btn active-btn" data-tab="#tab0">All</li>
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $translation = $cat->translateOrOrigin(app()->getLocale()); ?>
                        <li class="tab-btn" data-tab="#tab<?php echo e($k + 1); ?>"><?php echo e($translation->name); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
                <div class="tabs-content wow fadeInUp">
                    <div class="tab active-tab" id="tab0">
                        <div class="row">
                            <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="job-block-three col-lg-6 col-md-12 col-sm-12">
                                    <?php echo $__env->make("Job::frontend.layouts.loop.job-item-3", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="tab" id="tab<?php echo e($k + 1); ?>">
                            <div class="row">
                                <?php $__currentLoopData = $tabs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($cat->id == $row->category_id): ?>
                                        <div class="job-block-three col-lg-6 col-md-12 col-sm-12">
                                            <?php echo $__env->make("Job::frontend.layouts.loop.job-item-3", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>
<?php /**PATH /Users/imac/Sites/localhost/Superio.2.6.1/superio.2.6.1/themes/Superio/Job/Views/frontend/layouts/blocks/jobs-list/style_4.blade.php ENDPATH**/ ?>