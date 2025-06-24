<!-- Pricing Sectioin -->
<section class="pricing-section">
    <div class="auto-container">
        <div class="sec-title text-center">
            <h2><?php echo e($title); ?></h2>
            <div class="text"><?php echo e($sub_title); ?></div>
        </div>
        <!--Pricing Tabs-->
        <div class="pricing-tabs tabs-box wow fadeInUp">
            <!--Tab Btns-->
            <div class="tab-buttons">
                <?php if(!empty($sale_off_text)): ?>
                    <h4><?php echo e($sale_off_text); ?></h4>
                <?php endif; ?>
                <?php if(!empty($monthly_list) && !empty($annual_list)): ?>
                    <ul class="tab-btns">
                        <li data-tab="#monthly" class="tab-btn active-btn"><?php echo e($monthly_title ?? __("Monthly")); ?></li>
                        <li data-tab="#annual" class="tab-btn"><?php echo e($annual_title ?? __("AnnualSave")); ?></li>
                    </ul>
                <?php endif; ?>
            </div>

            <!--Tabs Container-->
            <div class="tabs-content">

                <?php if(!empty($monthly_list) && count($monthly_list) > 0): ?>
                    <!--Tab / Active Tab-->
                    <div class="tab active-tab" id="monthly">
                        <div class="content">
                            <div class="row">
                                <?php $__currentLoopData = $monthly_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <!-- Pricing Table -->
                                <div class="pricing-table <?php if(!empty($val['is_recommended'])): ?> tagged <?php endif; ?> col-lg-4 col-md-6 col-sm-12">
                                    <div class="inner-box">
                                        <?php if(!empty($val['is_recommended'])): ?>
                                            <span class="tag"><?php echo e(__("Recommended")); ?></span>
                                        <?php endif; ?>
                                        <div class="title"><?php echo e($val['title']); ?></div>
                                        <div class="price"><?php echo e($val['price']); ?> <?php if(!empty($val['unit'])): ?><span class="duration">/ <?php echo e($val['unit']); ?></span><?php endif; ?></div>
                                        <div class="table-content">
                                            <?php echo @clean($val['featured']); ?>

                                        </div>
                                        <?php if(!empty($val['button_url'])): ?>
                                            <div class="table-footer">
                                                <a href="<?php echo e($val['button_url']); ?>" <?php if(!empty($button_target)): ?> target="_blank" <?php endif; ?> class="theme-btn btn-style-three"><?php echo e($val['button_name'] ?? __("View Profile")); ?></a>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if(!empty($annual_list) && count($annual_list) > 0): ?>
                    <!--Tab / Active Tab-->
                    <div class="tab <?php if(empty($monthly_list) || count($monthly_list) == 0): ?> active-tab <?php endif; ?>" id="annual">
                        <div class="content">
                            <div class="row">
                            <?php $__currentLoopData = $annual_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <!-- Pricing Table -->
                                    <div class="pricing-table <?php if(!empty($val['is_recommended'])): ?> tagged <?php endif; ?> col-lg-4 col-md-6 col-sm-12">
                                        <div class="inner-box">
                                            <?php if(!empty($val['is_recommended'])): ?>
                                                <span class="tag"><?php echo e(__("Recommended")); ?></span>
                                            <?php endif; ?>
                                            <div class="title"><?php echo e($val['title']); ?></div>
                                            <div class="price"><?php echo e($val['price']); ?> <?php if(!empty($val['unit'])): ?><span class="duration">/ <?php echo e($val['unit']); ?></span><?php endif; ?></div>
                                            <div class="table-content">
                                                <?php echo @clean($val['featured']); ?>

                                            </div>
                                            <?php if(!empty($val['button_url'])): ?>
                                                <div class="table-footer">
                                                    <a href="<?php echo e($val['button_url']); ?>" <?php if(!empty($button_target)): ?> target="_blank" <?php endif; ?> class="theme-btn btn-style-three"><?php echo e($val['button_name'] ?? __("View Profile")); ?></a>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<!-- End Pricing Section -->
<?php /**PATH /Users/imac/Sites/localhost/Superio.2.6.1/superio.2.6.1/themes/Superio/Template/Views/frontend/blocks/table-price/style_1.blade.php ENDPATH**/ ?>