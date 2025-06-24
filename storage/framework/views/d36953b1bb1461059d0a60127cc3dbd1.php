<section class="features-section">
    <div class="auto-container">
        <div class="sec-title-outer">
            <div class="sec-title">
                <h2><?php echo e($title); ?></h2>
                <div class="text"><?php echo e($sub_title); ?></div>
            </div>
            <?php if(!empty($load_more_url)): ?>
                <a href="<?php echo e($load_more_url); ?>" class="link"><?php echo e($load_more_name); ?><span class="fa fa-angle-right"></span></a>
            <?php endif; ?>
        </div>
        <div class="row wow fadeInUp">
            <?php if(!empty($rows)): ?>
                <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($key == 0): ?>
                        <div class="column col-lg-4 col-md-6 col-sm-12">
                            <?php echo $__env->make("Location::frontend.blocks.list-locations.loop", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    <?php else: ?>
                        <?php if($key == 1 || $key == 3 || $key > 4): ?>
                            <div class="column col-lg-4 col-md-6 col-sm-12">
                        <?php endif; ?>
                            <?php echo $__env->make("Location::frontend.blocks.list-locations.loop", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php if($key == 2 || $key == 4 || (count($rows) == 2 && $key == 1) || (count($rows) == 4 && $key == 3) || $key > 4): ?>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php /**PATH /Users/imac/Sites/localhost/Superio.2.6.1/superio.2.6.1/modules/Location/Views/frontend/blocks/list-locations/style_2.blade.php ENDPATH**/ ?>