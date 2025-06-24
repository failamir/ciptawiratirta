<!-- Call To Action -->
<section class="call-to-action">
    <div class="auto-container">
        <div class="outer-box wow fadeInUp">
            <div class="content-column">
                <div class="sec-title">
                    <h2><?php echo e($title); ?></h2>
                    <div class="text"><?php echo @clean($sub_title); ?></div>
                    <?php if($url_search): ?>
                        <a href="<?php echo e($url_search); ?>" class="theme-btn btn-style-one bg-blue">
                            <span class="btn-title"><?php echo e($link_search ?? __("Start Recruiting Now")); ?></span>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="image-column" <?php if(!empty($bg_image_url)): ?> style="background-image: url(<?php echo e($bg_image_url ?? ""); ?>) !important;" <?php endif; ?>>
            </div>
        </div>
    </div>
</section>
<!-- End Call To Action -->
<?php /**PATH /Users/imac/Sites/localhost/Superio.2.6.1/superio.2.6.1/themes/Superio/Template/Views/frontend/blocks/call-to-action/style_2.blade.php ENDPATH**/ ?>