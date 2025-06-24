<?php
    $translation = $row->translateOrOrigin(app()->getLocale());
?>

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
            <a href="<?php echo e($row->company->getDetailUrl()); ?>"><img src="<?php echo e($company_logo); ?>" alt="<?php echo e($row->company->name); ?>" class="full-width object-cover"></a>
        </span>
    <?php endif; ?>
    <span class="company-name"><?php echo e($row->company->name ?? ''); ?></span>
    <h4><a href="<?php echo e($row->getDetailUrl()); ?>"><?php echo e($translation->title); ?></a></h4>
    <?php if($row->location): ?>
        <?php $location_translation = $row->location->translateOrOrigin(app()->getLocale()) ?>
        <div class="location"><span class="icon flaticon-map-locator"></span><?php echo e($location_translation->name); ?></div>
    <?php endif; ?>
    <ul class="post-tags">
        <?php if(!empty($row->skills)): ?>
            <?php $counter = count($row->skills) - 3; ?>
            <?php $__currentLoopData = $row->skills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($k > 2): ?> <?php continue; ?> <?php endif; ?>
                <?php $translation = $skill->translateOrOrigin(app()->getLocale()); ?>
                <li><a href="<?php echo e($skill->getDetailUrl()); ?>"><?php echo e(ucfirst($translation->name)); ?></a></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php if($counter > 0): ?>
                <li class="colored">+<?php echo e($counter); ?></li>
            <?php endif; ?>
        <?php endif; ?>
    </ul>
</div>
<?php /**PATH /Users/imac/Sites/localhost/Superio.2.6.1/superio.2.6.1/themes/Superio/Job/Views/frontend/layouts/loop/job-item-5.blade.php ENDPATH**/ ?>