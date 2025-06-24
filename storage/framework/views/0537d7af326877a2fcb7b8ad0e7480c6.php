<?php
    $translation = $row->translateOrOrigin(app()->getLocale());
?>
<div class="inner-box">
    <div class="image-box">
        <a href="<?php echo e($row->getDetailUrl()); ?>">
            <figure class="image">
                <?php if($row->image_id): ?>
                    <?php if(!empty($disable_lazyload)): ?>
                        <img src="<?php echo e(get_file_url($row->image_id,'medium')); ?>" alt="<?php echo e($translation->name ?? ''); ?>">
                    <?php else: ?>
                        <?php echo get_image_tag($row->image_id,'medium',['alt'=>$row->title]); ?>

                    <?php endif; ?>
                <?php endif; ?>
            </figure>
        </a>
    </div>
    <div class="lower-content">
        <ul class="post-meta">
            <li><?php echo e(display_date($row->updated_at)); ?></li>
            <?php if($row->getReviewEnable()): ?>
                <li><a href="<?php echo e($row->getDetailUrl().'#reviews'); ?>"><?php echo e($row->reviewsCount(true)); ?></a></li>
            <?php endif; ?>
        </ul>
        <h3><a href="<?php echo e($row->getDetailUrl()); ?>"><?php echo e($translation->title); ?></a></h3>
        <p class="text"><?php echo \Illuminate\Support\Str::words(strip_tags($translation->content), 12, '....'); ?></p>
        <a href="<?php echo e($row->getDetailUrl()); ?>" class="read-more"><?php echo e(__("Read More")); ?> <i class="fa fa-angle-right"></i></a>
    </div>
</div>
<?php /**PATH /Users/imac/Sites/localhost/Superio.2.6.1/superio.2.6.1/modules/News/Views/frontend/blocks/list-news/loop.blade.php ENDPATH**/ ?>