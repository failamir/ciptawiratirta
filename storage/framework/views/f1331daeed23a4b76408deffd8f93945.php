<section class="job-section-four alternate">
    <div class="auto-container">
        <div class="sec-title text-center">
            <h2><?php echo e($title); ?></h2>
            <div class="text"><?php echo e($sub_title); ?></div>
        </div>

        <div class="row wow fadeInUp">
            <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $translation = $row->translateOrOrigin(app()->getLocale());
                ?>
                <div class="job-block-four col-xl-3 col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <ul class="job-other-info">
                            <?php if($row->jobType): ?>
                                <?php $jobType_translation = $row->jobType->translateOrOrigin(app()->getLocale()) ?>
                                <li class="time"><?php echo e($jobType_translation->name); ?></li>
                            <?php endif; ?>
                            <?php if($row->is_featured): ?>
                                <li class="privacy"><?php echo e(__("Featured")); ?></li>
                            <?php endif; ?>
                            <?php if($row->is_urgent): ?>
                                <li class="required"><?php echo e(__("Urgent")); ?></li>
                            <?php endif; ?>
                        </ul>
                        <?php if($row->company && $company_logo = $row->company->getLogoUrl()): ?>
                            <span class="company-logo">
                                <img src="<?php echo e($company_logo); ?>" alt="<?php echo e($row->company->name); ?>">
                            </span>
                        <?php endif; ?>
                        <?php if($row->company): ?>
                            <span class="company-name"><?php echo e($row->company ? $row->company->name : 'company'); ?></span>
                        <?php endif; ?>
                        <h4><a href="<?php echo e($row->getDetailUrl()); ?>"><?php echo e($translation->title); ?></a></h4>
                        <?php if($row->location): ?>
                            <?php $location_translation = $row->location->translateOrOrigin(app()->getLocale()) ?>
                            <div class="location"><span class="icon flaticon-map-locator"></span> <?php echo e($location_translation->name); ?></div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <?php if(!empty($load_more_url)): ?>
            <div class="btn-box">
                <a href="<?php echo e($load_more_url); ?>" class="theme-btn btn-style-one"><?php echo e(__("Load More Listing")); ?></a>
            </div>
        <?php endif; ?>
    </div>
</section>
<?php /**PATH /Users/imac/Sites/localhost/Superio.2.6.1/superio.2.6.1/themes/Superio/Job/Views/frontend/layouts/blocks/jobs-list/style_9.blade.php ENDPATH**/ ?>