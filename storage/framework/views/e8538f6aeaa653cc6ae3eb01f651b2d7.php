<?php if(!empty($list_item)): ?>
    <section class="process-section pt-0">
        <div class="auto-container">
            <div class="sec-title text-center">
                <h2><?php echo e($title ?? ''); ?></h2>
                <div class="text"><?php echo e($sub_title ?? ''); ?></div>
            </div>

            <div class="row wow fadeInUp">
                <?php $__currentLoopData = $list_item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="process-block col-lg-4 col-md-6 col-sm-12">
                        <div class="icon-box"><img src="<?php echo e(get_file_url($item['icon_image'])); ?>" alt="<?php echo e($item['title']); ?>"></div>
                        <h4><?php echo clean($item['title']) ?? ''; ?></h4>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php /**PATH /Users/imac/Sites/localhost/Superio.2.6.1/superio.2.6.1/themes/Superio/Template/Views/frontend/blocks/how-it-work/style_3.blade.php ENDPATH**/ ?>