<?php
    $translation = $row->translateOrOrigin(app()->getLocale());
?>
<div class="company-block">
    <div class="inner-box">
        <figure class="image">
            <?php if($image_tag = get_image_tag($row->avatar_id,'full',['alt'=>$translation->title])): ?>
                <?php echo $image_tag; ?>

            <?php endif; ?>
        </figure>
        <h4 class="name"><?php echo e($translation->name); ?></h4>
        <?php if($row->location): ?>
            <div class="location"><i class="flaticon-map-locator"></i> <?php echo e($row->location->name); ?></div>
        <?php endif; ?>
        <a href="<?php echo e($row->getDetailUrl()); ?>" class="theme-btn <?php echo e($btn_class ?? 'btn-style-three'); ?>"><?php echo e(__(":count Open Position",["count"=> number_format($row->jobs_count)])); ?></a>
    </div>
</div>
<?php /**PATH /Users/imac/Sites/localhost/Superio.2.6.1/superio.2.6.1/themes/Superio/Company/Views/frontend/blocks/list-company/loop.blade.php ENDPATH**/ ?>