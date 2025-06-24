<!-- News Section Two -->
<section class="news-section-two">
    <div class="auto-container">
        <div class="sec-title text-center">
            <h2><?php echo e($title); ?></h2>
            <?php if(!empty($sub_title)): ?>
                <div class="text"><?php echo e($sub_title); ?></div>
            <?php endif; ?>
        </div>

        <div class="row wow fadeInUp">
            <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <!-- News Block -->
                <div class="news-block col-lg-4 col-md-6 col-sm-12">
                    <?php echo $__env->make('News::frontend.blocks.list-news.loop_2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<!-- End News Section -->
<?php /**PATH /Users/imac/Sites/localhost/Superio.2.6.1/superio.2.6.1/modules/News/Views/frontend/blocks/list-news/style_2.blade.php ENDPATH**/ ?>