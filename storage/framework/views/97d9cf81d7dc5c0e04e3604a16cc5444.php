
<div class="candidate-block">
    <div class="inner-box">
        <figure class="image">
            <?php if($row->user): ?>
                <img src="<?php echo e($row->user->getAvatarUrl()); ?>" alt="<?php echo e($row->title ?? ''); ?>">
            <?php endif; ?>
        </figure>
        <h4 class="name"><?php echo e($row->user->getDisplayName()); ?></h4>
        <span class="designation"><?php echo e($row->title); ?></span>
        <div class="location"><i class="flaticon-map-locator"></i> <?php echo e($row->city); ?>, <?php echo e($row->country); ?></div>
        <a href="<?php echo e($row->getDetailUrl()); ?>" class="theme-btn btn-style-one"><span class="btn-title"><?php echo e(__('View Profile')); ?></span></a>
    </div>
</div>
<?php /**PATH /Users/imac/Sites/localhost/Superio.2.6.1/superio.2.6.1/themes/Superio/Candidate/Views/frontend/blocks/list-candidates/loop.blade.php ENDPATH**/ ?>