<?php if(!empty($list_item)): ?>
    <section class="testimonial-section-two style-two">
        <div class="container-fluid">
            <?php if(!empty($banner_image)): ?>
                <div class="testimonial-left"><img src="<?php echo e($banner_image_url); ?>" alt=""></div>
            <?php endif; ?>
            <?php if(!empty($banner_image_2)): ?>
                <div class="testimonial-right"><img src="<?php echo e($banner_image_2_url); ?>" alt=""></div>
            <?php endif; ?>
            <!-- Sec Title -->
            <div class="sec-title text-center">
                <h2><?php echo e($title ?? ''); ?></h2>
                <div class="text"><?php echo e($sub_title ?? ''); ?></div>
            </div>

            <div class="carousel-outer wow fadeInUp">
                <!-- Testimonial Carousel -->
                <?php $__currentLoopData = $list_item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="testimonial-carousel owl-carousel owl-theme">
                    <!--Testimonial Block -->
                    <div class="testimonial-block-two">
                        <div class="inner-box">
                            <div class="thumb"><img src="<?php echo e(get_file_url($item['avatar'],'full')); ?>" alt="<?php echo e($item['info_name']); ?>"></div>
                            <h4 class="title"><?php echo e($item['title'] ?? ''); ?></h4>
                            <div class="text"><?php echo e($item['desc'] ?? ''); ?></div>
                            <div class="info-box">
                                <h4 class="name"><?php echo e($item['info_name'] ?? ''); ?></h4>
                                <span class="designation"><?php echo e($item['position'] ?? ''); ?></span>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php /**PATH /Users/imac/Sites/localhost/Superio.2.6.1/superio.2.6.1/themes/Superio/Template/Views/frontend/blocks/testimonial/style_5.blade.php ENDPATH**/ ?>