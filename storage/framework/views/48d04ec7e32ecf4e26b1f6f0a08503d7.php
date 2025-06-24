<div class="newsletter-form wow fadeInUp style-eight">
    <div class="auto-container">
        <div class="sec-title text-center">
            <h2><?php echo e($title); ?></h2>
            <div class="text"><?php echo e($sub_title); ?></div>
        </div>
        <form method="post" action="<?php echo e(route('newsletter.subscribe')); ?>" class="bc-subscribe-form">
            <?php echo e(csrf_field()); ?>

            <div class="form-group">
                <div class="form-mess"></div>
            </div>
            <div class="form-group">
                <input type="email" name="email" class="email" value="" placeholder="Your e-mail" required>
                <button type="submit" id="subscribe-newslatters" class="theme-btn btn-style-one"><?php echo e($button_name); ?>

                    <span class="spinner-grow spinner-grow-sm icon-loading" role="status" aria-hidden="true"></span>
                </button>
            </div>
        </form>
    </div>
</div>
<?php /**PATH /Users/imac/Sites/localhost/Superio.2.6.1/superio.2.6.1/themes/Superio/Template/Views/frontend/blocks/subscribe/style_1.blade.php ENDPATH**/ ?>