<!-- About Section -->
<section class="about-section style-two">
    <div class="auto-container">
        <div class="row">
            <!-- Content Column -->
            <div class="content-column col-lg-6 col-md-12 col-sm-12 order-2">
                <div class="inner-column wow fadeInLeft">
                    <div class="sec-title">
                        <h2><?php echo e($title); ?></h2>
                        <div class="text"><?php echo e($sub_title); ?></div>
                    </div>
                    <ul class="list-style-two">
                        <?php echo $content; ?>

                    </ul>
                    <a href="<?php echo e($button_url); ?>" class="theme-btn btn-style-one lightbox-image"><?php echo e($button_name); ?></a>
                </div>
            </div>

            <!-- Image Column -->
            <div class="image-column col-lg-6 col-md-12 col-sm-12">
                <div class="inner-column wow fadeInRight">
                    <?php if($featured_image): ?>
                        <figure class="image">
                            <img src="<?php echo e($featured_image_url); ?>" alt="about">
                            <a href="<?php echo e($button_url); ?>" class="play-btn lightbox-image" data-fancybox="images"><span class="flaticon-play-button-2 icon"></span></a>
                        </figure>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <!-- Fun Fact Section -->
    </div>
</section>
<!-- End About Section -->
<?php /**PATH /Users/imac/Sites/localhost/Superio.2.6.1/superio.2.6.1/themes/Superio/Template/Views/frontend/blocks/about/style_4.blade.php ENDPATH**/ ?>