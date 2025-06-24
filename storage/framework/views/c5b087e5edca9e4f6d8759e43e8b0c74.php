<section class="ads-section">
    <div class="auto-container">
        <div class="row wow fadeInUp">
            <?php if(!empty($list_item)): ?>
                <?php $__currentLoopData = $list_item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="advrtise-block col-lg-4 col-md-6 col-sm-12">
                        <div class="inner-box" style="background-image: url(<?php echo e(get_file_url($item['image_id'],'full')); ?>);">
                            <h4><span><?php echo e($item['title']); ?> </span><?php echo e($item['sub_title']); ?></h4>
                            <?php if($item['ads_link']): ?><a href="<?php echo e($item['ads_link']); ?>" class="theme-btn btn-style-one"><?php echo e($item['button_name']); ?></a><?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php /**PATH /Users/imac/Sites/localhost/Superio.2.6.1/superio.2.6.1/themes/Superio/Template/Views/frontend/blocks/ads/style_1.blade.php ENDPATH**/ ?>