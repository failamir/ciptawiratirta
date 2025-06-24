<?php if(!empty($list_item)): ?>
    <section class="testimonial-section-two">
        <div class="container-fluid">
            <div class="testimonial-left"><img src="<?php echo e(asset('module/superio/images/testimonial-left.png')); ?>" alt=""></div>
            <div class="testimonial-right"><img src="<?php echo e(asset('module/superio/images/testimonial-right.png')); ?>" alt=""></div>
            <!-- Sec Title -->
            <div class="sec-title text-center">
                <h2><?php echo e($title ?? ''); ?></h2>
                <div class="text"><?php echo e($sub_title ?? ''); ?></div>
            </div>

            <div class="carousel-outer">
                <div class="testimonial-carousel owl-carousel owl-theme">
                    <?php $__currentLoopData = $list_item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="testimonial-block-two">
                            <div class="inner-box">
                                <div class="thumb"><img src="<?php echo e(get_file_url($item['avatar'])); ?>" alt="<?php echo e($item['info_name']); ?>"></div>
                                <h4 class="title"><?php echo e($item['title'] ?? ''); ?></h4>
                                <div class="text"><?php echo e($item['desc'] ?? ''); ?></div>
                                <div class="info-box">
                                    <h4 class="name"><?php echo e($item['info_name'] ?? ''); ?></h4>
                                    <span class="designation"><?php echo e($item['info_desc'] ?? ''); ?></span>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php /**PATH /Users/imac/Sites/localhost/Superio.2.6.1/superio.2.6.1/themes/Superio/Template/Views/frontend/blocks/testimonial/index.blade.php ENDPATH**/ ?>