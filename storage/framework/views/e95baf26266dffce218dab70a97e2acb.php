
<section class="candidates-section">
    <div class="auto-container">
        <div class="sec-title-outer">
            <div class="sec-title">
                <h2><?php echo e($title); ?></h2>
                <div class="text"><?php echo e($desc); ?></div>
            </div>
            <?php if(!empty($load_more_url)): ?>
                <a href="<?php echo e($load_more_url); ?>" class="link"><?php echo e($load_more_name); ?><span class="fa fa-angle-right"></span></a>
            <?php endif; ?>
        </div>
        <div class="carousel-outer wow fadeInUp">
            <div class="candidates-carousel owl-carousel owl-theme default-dots" data-items="<?php echo e($rows->count()); ?>">
                <!-- Candidate Block -->
                <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo $__env->make('Candidate::frontend.blocks.list-candidates.loop', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</section>
<!-- End Candidates Section -->
<?php /**PATH /Users/imac/Sites/localhost/Superio.2.6.1/superio.2.6.1/themes/Superio/Candidate/Views/frontend/blocks/list-candidates/style_1.blade.php ENDPATH**/ ?>