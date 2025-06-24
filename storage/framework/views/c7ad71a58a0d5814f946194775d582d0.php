<!-- Call To Action Three -->
<section class="call-to-action-three">
    <div class="auto-container">
        <div class="outer-box">
            <div class="sec-title">
                <h2><?php echo e($title); ?></h2>
                <div class="text"><?php echo @clean($sub_title); ?></div>
            </div>
            <?php if($url_search): ?>
                <div class="btn-box">
                    <a href="<?php echo e($url_search); ?>" class="theme-btn btn-style-one bg-blue">
                        <span class="btn-title"><?php echo e($link_search ?? "Search Job"); ?></span>
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<!-- End Call To Action -->
<?php /**PATH /Users/imac/Sites/localhost/Superio.2.6.1/superio.2.6.1/themes/Superio/Template/Views/frontend/blocks/call-to-action/style_3.blade.php ENDPATH**/ ?>