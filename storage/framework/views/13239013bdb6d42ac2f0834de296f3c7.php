<?php if($row->video): ?>
    <!-- Video Box -->
    <div class="video-outer">
        <h4><?php echo e(__('Job Video')); ?></h4>
        <div class="video-box">
            <figure class="image">
                <a href="<?php echo e($row->video); ?>" class="play-now" data-fancybox="gallery" data-caption="">
                    <?php if($row->video_cover_id): ?>
                        <img src="<?php echo e(get_file_url($row->video_cover_id, 'full')); ?>" alt="">
                    <?php else: ?>
                        <img src="<?php echo e(asset('images/resource/video-img.jpg')); ?>" alt="">
                    <?php endif; ?>
                    <i class="icon flaticon-play-button-3" aria-hidden="true"></i>
                </a>
            </figure>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH /Users/imac/Sites/localhost/Superio.2.6.1/superio.2.6.1/themes/Superio/Job/Views/frontend/layouts/details/video.blade.php ENDPATH**/ ?>