<section class="top-companies">
    <div class="auto-container">
        <div class="sec-title">
            <h2><?php echo e($title); ?></h2>
            <div class="text"><?php echo e($sub_title); ?></div>
        </div>

        <div class="carousel-outer wow fadeInUp">
            <div class="companies-carousel owl-carousel owl-theme default-dots" data-items="<?php echo e($rows->count()); ?>">
                <!-- Company Block -->
                <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo $__env->make('Company::frontend.blocks.list-company.loop', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</section>
<?php /**PATH /Users/imac/Sites/localhost/Superio.2.6.1/superio.2.6.1/themes/Superio/Company/Views/frontend/blocks/list-company/style_1.blade.php ENDPATH**/ ?>