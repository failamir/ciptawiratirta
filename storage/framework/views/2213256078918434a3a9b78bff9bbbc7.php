<?php if($row->getGallery()): ?>
    <div class="portfolio-outer">
        <h4 class="mb-md-4 mb-2"><?php echo e(__('Photos')); ?></h4>
        <div class="row">
            <?php $__currentLoopData = $row->getGallery(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(!empty($item['thumb'])): ?>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-6">
                        <figure class="image">
                            <a href="<?php echo e($item['large']); ?>" class="lightbox-image"><img src="<?php echo e($item['thumb']); ?>" alt="gallery"></a>
                            <span class="icon flaticon-plus"></span>
                        </figure>
                    </div>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH /Users/imac/Sites/localhost/Superio.2.6.1/superio.2.6.1/themes/Superio/Job/Views/frontend/layouts/details/gallery.blade.php ENDPATH**/ ?>