<?php if(!empty($list_item)): ?>
    <section class="testimonial-section-three">
        <div class="auto-container">
            <!-- Sec Title -->
            <div class="sec-title text-center">
                <h2><?php echo e($title ?? ''); ?></h2>
                <div class="text"><?php echo e($sub_title ?? ''); ?></div>
            </div>

            <div class="carousel-outer wow fadeInUp">
                <div class="testimonial-carousel-two owl-carousel owl-theme">
                    <?php $__currentLoopData = $list_item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="slide-item">
                            <div class="image-column">
                                <figure class="image">
                                    <img src="<?php echo e(get_file_url($item['avatar'],'full')); ?>" alt="<?php echo e($item['info_name']); ?>">
                                </figure>
                            </div>
                            <div class="content-column">
                                <!--Testimonial Block -->
                                <div class="testimonial-block-three">
                                    <div class="inner-box">
                                        <h4 class="title"><?php echo e($item['title'] ?? ''); ?></h4>
                                        <div class="text"><?php echo e($item['desc'] ?? ''); ?></div>
                                        <div class="info-box">
                                            <h4 class="name"><?php echo e($item['info_name'] ?? ''); ?></h4>
                                            <span class="designation"><?php echo e($item['position'] ?? ''); ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php /**PATH /Users/imac/Sites/localhost/Superio.2.6.1/superio.2.6.1/themes/Superio/Template/Views/frontend/blocks/testimonial/style_4.blade.php ENDPATH**/ ?>