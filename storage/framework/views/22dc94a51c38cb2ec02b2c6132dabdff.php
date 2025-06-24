<?php if(!empty($list_item)): ?>
<!-- Fun Fact Section -->
<div class="fun-fact-section">
    <div class="auto-container">
        <div class="row">
            <?php $__currentLoopData = $list_item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <!--Column-->
            <div class="counter-column col-lg-4 col-md-4 col-sm-12 wow fadeInUp">
                <div class="count-box"><span class="count-text" data-speed="3000" data-stop="<?php echo e($val['number'] ?? ''); ?>">0</span><?php echo e($val['symbol'] ?? ''); ?></div>
                <h4 class="counter-title"><?php echo e($val['desc'] ?? ''); ?></h4>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
<!-- Fun Fact Section -->
<?php endif; ?>
<?php /**PATH /Users/imac/Sites/localhost/Superio.2.6.1/superio.2.6.1/themes/Superio/Template/Views/frontend/blocks/count-number/style_2.blade.php ENDPATH**/ ?>