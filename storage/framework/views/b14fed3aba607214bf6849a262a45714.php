<?php if(!empty($list_item)): ?>
    <div class="bravo-how-it-works work-section">
        <div class="auto-container">
            <div class="sec-title text-center">
                <h2><?php echo e($title ?? ''); ?></h2>
                <div class="text"><?php echo e($sub_title ?? ''); ?></div>
            </div>

            <div class="row">
                <?php $__currentLoopData = $list_item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="work-block col-lg-4 col-md-6 col-sm-12">
                        <div class="inner-box">
                            <figure class="image"><img src="<?php echo e(get_file_url($item['icon_image'])); ?>" alt="<?php echo e($item['title']); ?>"></figure>
                            <h5><?php echo e($item['title'] ?? ''); ?></h5>
                            <p><?php echo e($item['sub_title'] ?? ''); ?></p>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH /Users/imac/Sites/localhost/Superio.2.6.1/superio.2.6.1/themes/Superio/Template/Views/frontend/blocks/how-it-work/style_1.blade.php ENDPATH**/ ?>