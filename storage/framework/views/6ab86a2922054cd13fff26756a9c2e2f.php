<section class="recruiter-section">
    <div class="outer-box">
        <div class="image-column">
            <?php if(!empty($bg_image_url)): ?>
                <figure class="image">
                    <img src="<?php echo e($bg_image_url); ?>" alt="">
                </figure>
            <?php endif; ?>
        </div>
        <div class="content-column">
            <div class="inner-column wow fadeInUp">
                <div class="sec-title">
                    <h2><?php echo e($title); ?></h2>
                    <div class="text"><?php echo e($sub_title); ?></div>
                    <?php if($url_search): ?>
                        <a href="<?php echo e($url_search); ?>" class="theme-btn btn-style-one"><?php echo e($link_search); ?></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php /**PATH /Users/imac/Sites/localhost/Superio.2.6.1/superio.2.6.1/themes/Superio/Template/Views/frontend/blocks/call-to-action/style_4.blade.php ENDPATH**/ ?>