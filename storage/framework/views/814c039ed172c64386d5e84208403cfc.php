<?php
    $languages = \Modules\Language\Models\Language::getActive();
    $locale = session('website_locale',app()->getLocale());
?>

<?php if(!empty($languages) && setting_item('site_enable_multi_lang')): ?>
    <li class="dropmenu-right dropdown show">
        <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($locale == $language->locale): ?>
                <a href="#" id="dropdownLang" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="is_login dropdown-toggle">
                    <?php if($language->flag): ?>
                        <span class="flag-icon flag-icon-<?php echo e($language->flag); ?>"></span>
                    <?php endif; ?>
                    <span class="lang-text"><?php echo e($language->name); ?></span>
                    <i class="flaticon-down-arrow"></i>
                </a>
                <?php break; ?>;
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <ul class="dropdown-menu text-left">
            <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($locale != $language->locale): ?>
                    <li>
                        <a href="<?php echo e(get_lang_switcher_url($language->locale)); ?>" class="is_login">
                            <?php if($language->flag): ?>
                                <span class="flag-icon flag-icon-<?php echo e($language->flag); ?>"></span>
                            <?php endif; ?>
                            <?php echo e($language->name); ?>

                        </a>
                    </li>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </li>
<?php endif; ?>

<?php /**PATH /Users/imac/Sites/localhost/Superio.2.6.1/superio.2.6.1/modules/Language/Views/frontend/switcher-dropdown.blade.php ENDPATH**/ ?>