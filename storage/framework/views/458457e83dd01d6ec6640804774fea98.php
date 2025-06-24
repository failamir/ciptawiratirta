<section class="top-companies">
    <div class="auto-container">
        <div class="sec-title">
            <h2><?php echo e($title); ?></h2>
            <div class="text"><?php echo e($sub_title); ?></div>
        </div>

        <div class="carousel-outer wow fadeInUp">
            <div class="companies-carousel-two owl-carousel owl-theme default-dots" data-items="<?php echo e($rows->count()); ?>">
                <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $translation = $row->translateOrOrigin(app()->getLocale());
                    ?>
                    <div class="company-block">
                        <div class="inner-box bg-clr-1">
                            <figure class="image">
                                <?php if($image_tag = get_image_tag($row->avatar_id,'full',['alt'=>$translation->title])): ?>
                                    <?php echo $image_tag; ?>

                                <?php endif; ?>
                            </figure>
                            <h4 class="name"><?php echo e($translation->name); ?></h4>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</section>
<?php /**PATH /Users/imac/Sites/localhost/Superio.2.6.1/superio.2.6.1/themes/Superio/Company/Views/frontend/blocks/list-company/style_4.blade.php ENDPATH**/ ?>