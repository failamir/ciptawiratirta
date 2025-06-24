<section class="candidates-section-two">
    <div class="auto-container">
        <div class="sec-title">
            <h2><?php echo e($title); ?></h2>
            <div class="text"><?php echo e($desc); ?></div>
        </div>

        <div class="carousel-outer wow fadeInUp">
            <div class="row">
                <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="candidate-block-two col-lg-6 col-md-12 col-sm-12">
                        <div class="inner-box">
                            <div class="content-box">
                                <figure class="image"><img src="<?php echo e(get_file_url($row->user->avatar_id,'medium')); ?>" alt="<?php echo e($row->title ?? ''); ?>"></figure>
                                <h4 class="name"><?php echo e($row->user->getDisplayName()); ?></h4>
                                <span class="designation"><?php echo e($row->title); ?></span>
                                <div class="location"><i class="flaticon-map-locator"></i> <?php echo e($row->city); ?>, <?php echo e($row->country); ?></div>
                            </div>
                            <a href="<?php echo e($row->getDetailUrl()); ?>" class="theme-btn btn-style-three"><?php echo e(__('View Profile')); ?></a>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</section>
<?php /**PATH /Users/imac/Sites/localhost/Superio.2.6.1/superio.2.6.1/themes/Superio/Candidate/Views/frontend/blocks/list-candidates/style_2.blade.php ENDPATH**/ ?>