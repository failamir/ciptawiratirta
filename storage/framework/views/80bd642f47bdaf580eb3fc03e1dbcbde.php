<section class="steps-section pt-0">
    <div class="auto-container">
        <div class="row">
            <div class="image-column col-lg-6 col-md-12 col-sm-12">
                <div class="inner-column">
                    <?php if($featured_image): ?>
                        <figure class="image"><img src="<?php echo e($featured_image_url); ?>" alt=""></figure>
                    <?php endif; ?>
                    <!-- Count Employers -->
                    <div class="count-employers wow fadeInUp">
                        <?php if(!empty($sub_image_2)): ?>
                            <span class="title"><?php echo e($sub_image_2); ?></span>
                        <?php endif; ?>
                        <?php if($image_2): ?>
                            <figure class="image"><img src="<?php echo e($image_2_url); ?>" alt=""></figure>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="content-column col-lg-6 col-md-12 col-sm-12">
                <div class="inner-column wow fadeInUp">
                    <div class="sec-title">
                        <h2><?php echo e($title); ?></h2>
                        <div class="text"><?php echo e($sub_title); ?></div>
                        <ul class="steps-list">
                            <?php echo $content; ?>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php /**PATH /Users/imac/Sites/localhost/Superio.2.6.1/superio.2.6.1/themes/Superio/Template/Views/frontend/blocks/about/style_5.blade.php ENDPATH**/ ?>