<?php $main_color = setting_item('style_main_color','#1967D2');
$style_typo = json_decode(setting_item_with_lang('style_typo',false,"{}"),true);
?>


    body{
    <?php if(!empty($style_typo) && is_array($style_typo)): ?>
        <?php $__currentLoopData = $style_typo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($v): ?>
                <?php echo e(str_replace('_','-',$k)); ?>:<?php echo $v; ?>;
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
    }

    <?php echo (setting_item('style_custom_css')); ?>

    <?php echo (setting_item_with_lang_raw('style_custom_css')); ?>

<?php /**PATH /Users/imac/Sites/localhost/Superio.2.6.1/superio.2.6.1/modules/Layout/parts/custom-css.blade.php ENDPATH**/ ?>