<!-- Job Block-three -->
<?php
    $translation = $row->translateOrOrigin(app()->getLocale());
?>
<div class="inner-box">
    <div class="content">
        <?php if($row->company && $company_logo = $row->company->getLogoUrl()): ?>
            <span class="company-logo">
                <a href="<?php echo e($row->company->getDetailUrl()); ?>"><img src="<?php echo e($company_logo); ?>" alt="<?php echo e($row->company->name); ?>"></a>
            </span>
        <?php endif; ?>
        <h4><a href="<?php echo e($row->getDetailUrl()); ?>"><?php echo e($translation->title); ?></a></h4>
        <ul class="job-info">
            <?php if($row->category): ?>
                <?php $cat_translation = $row->category->translateOrOrigin(app()->getLocale()) ?>
                <li><span class="icon flaticon-briefcase"></span> <?php echo e($cat_translation->name); ?></li>
            <?php endif; ?>
            <?php if($row->location): ?>
                <?php $location_translation = $row->location->translateOrOrigin(app()->getLocale()) ?>
                <li><span class="icon flaticon-map-locator"></span> <?php echo e($location_translation->name); ?></li>
            <?php endif; ?>
        </ul>
    </div>
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
    <button class="bookmark-btn <?php if($row->wishlist): ?> active <?php endif; ?> service-wishlist" data-id="<?php echo e($row->id); ?>" data-type="<?php echo e($row->type); ?>">
        <img src="<?php echo e(asset('images/loading.gif')); ?>" class="loading-icon" alt="loading" />
        <span class="flaticon-bookmark"></span>
    </button>
</div>
<?php /**PATH /Users/imac/Sites/localhost/Superio.2.6.1/superio.2.6.1/themes/Superio/Job/Views/frontend/layouts/loop/job-item-3.blade.php ENDPATH**/ ?>