<!-- About Section -->
<section class="about-section-two">
    <div class="auto-container">
        <div class="row">
            <!-- Content Column -->
            <div class="content-column col-lg-6 col-md-12 col-sm-12 order-2">
                <div class="inner-column wow fadeInRight">
                    <h2 class="about-title"><?php echo e($title); ?></h2>
                    <div class="sec-content">
                        <?php echo @clean($content); ?>

                    </div>
                    <?php if($button_url): ?>
                        <a href="<?php echo e($button_url); ?>" target="<?php echo e($button_target ? '_blank' : 'self'); ?>" class="theme-btn btn-style-seven bg-blue"><span class="btn-title"><?php echo e($button_name); ?></span></a>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Image Column -->
            <div class="image-column col-lg-6 col-md-12 col-sm-12">
                <?php if($featured_image): ?>
                    <figure class="image-box wow fadeInLeft">
                        <img src="<?php echo e($featured_image_url); ?>" alt="about">
                    </figure>
                <?php endif; ?>
                <?php if($image_2): ?>
                    <!-- Count Employers -->
                    <div class="applicants-list app-list-2 wow fadeInUp">
                        <img src="<?php echo e($image_2_url); ?>" class="img-option" alt="img">
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<!-- End About Section -->
<?php /**PATH /Users/imac/Sites/localhost/Superio.2.6.1/superio.2.6.1/themes/Superio/Template/Views/frontend/blocks/about/style_3.blade.php ENDPATH**/ ?>