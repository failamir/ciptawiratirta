<!-- Call To Action Three -->
<section class="call-to-action-three style-two">
    <div class="auto-container">
        <div class="outer-box">
            <div class="sec-title light">
                <h2><?php echo e($title); ?></h2>
                <div class="text"><?php echo @clean($sub_title); ?>

                    <?php if($link_search): ?>
                        <br>
                        <a href="<?php echo e($url_search); ?>"><?php echo e($link_search); ?></a>
                    <?php endif; ?>
                </div>
            </div>
            <?php if($link_apply): ?>
                <div class="btn-box">
                    <a href="<?php echo e($url_apply); ?>" class="theme-btn btn-style-three">
                        <span class="btn-title"><?php echo e($link_apply ?? "Search Job"); ?></span>
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<!-- End Call To Action -->
<?php /**PATH /Users/imac/Sites/localhost/Superio.2.6.1/superio.2.6.1/themes/Superio/Template/Views/frontend/blocks/call-to-action/style_6.blade.php ENDPATH**/ ?>