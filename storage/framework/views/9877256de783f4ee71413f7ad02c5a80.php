<section class="call-to-action-two" <?php if(!empty($bg_image_url)): ?> style="background-image: url(<?php echo e($bg_image_url ?? ""); ?>) !important;" <?php endif; ?>>
    <div class="auto-container">
        <div class="sec-title light text-center">
            <h2><?php echo e($title); ?></h2>
            <div class="text"><?php echo e($sub_title); ?></div>
        </div>

        <div class="btn-box">
            <?php if(!empty($link_search)): ?>
                <a href="<?php echo e($url_search); ?>" class="theme-btn btn-style-three"><?php echo e($link_search); ?></a>
            <?php endif; ?>
            <?php if(!empty($link_apply)): ?>
                <a href="<?php echo e($url_apply); ?>" class="theme-btn btn-style-two"><?php echo e($link_apply); ?></a>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php /**PATH /Users/imac/Sites/localhost/Superio.2.6.1/superio.2.6.1/themes/Superio/Template/Views/frontend/blocks/call-to-action/style_1.blade.php ENDPATH**/ ?>