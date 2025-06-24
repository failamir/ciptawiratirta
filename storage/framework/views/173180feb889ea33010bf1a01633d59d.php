<!-- App Section -->
<section class="app-section app-download-block">
    <div class="auto-container">
        <div class="row">
            <!-- Image Column -->
            <div class="image-column col-lg-6 col-md-12 col-sm-12">
                <?php if($featured_image): ?>
                    <figure class="image wow fadeInLeft">
                        <img src="<?php echo e($featured_image_url); ?>" alt="app">
                    </figure>
                <?php endif; ?>
            </div>

            <div class="content-column col-lg-6 col-md-12 col-sm-12">
                <div class="inner-column wow fadeInRight">
                    <div class="sec-title">
                        <span class="sub-title"><?php echo e($sub_title); ?></span>
                        <h2><?php echo @clean($title); ?></h2>
                        <div class="text"><?php echo @clean($desc); ?></div>
                    </div>
                    <div class="download-btn">
                        <?php if($button_image_1 && $button_url_1): ?>
                            <a href="<?php echo e($button_url_1); ?>" target="_blank"><img src="<?php echo e($button_image_1_url); ?>" alt="button 1"></a>
                        <?php endif; ?>
                        <?php if($button_image_2 && $button_url_2): ?>
                            <a href="<?php echo e($button_url_2); ?>" target="_blank"><img src="<?php echo e($button_image_2_url); ?>" alt="button 1"></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End App Section -->
<?php /**PATH /Users/imac/Sites/localhost/Superio.2.6.1/superio.2.6.1/themes/Superio/Template/Views/frontend/blocks/app-download/style_1.blade.php ENDPATH**/ ?>