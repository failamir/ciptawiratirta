<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>" class="<?php echo e($html_class ?? ''); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <?php event(new \Modules\Layout\Events\LayoutBeginHead()); ?>
    <?php
        $favicon = setting_item('site_favicon');
    ?>
    <?php if($favicon): ?>
        <?php
            $file = (new \Modules\Media\Models\MediaFile())->findById($favicon);
        ?>
        <?php if(!empty($file)): ?>
            <link rel="icon" type="<?php echo e($file['file_type']); ?>" href="<?php echo e(asset('uploads/'.$file['file_path'])); ?>" />
        <?php else: ?>:
        <link rel="icon" type="image/png" href="<?php echo e(url('images/favicon.png')); ?>" />
        <?php endif; ?>
    <?php endif; ?>

    <?php echo $__env->make('Layout::parts.seo-meta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Noto+Sans+JP:wght@400;500;700;900&display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="<?php echo e(asset("libs/daterange/daterangepicker.css")); ?>" >
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset("libs/select2/css/select2.min.css")); ?>" >
    <link href="<?php echo e(asset('libs/font-awesome/css/font-awesome.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('themes/superio/dist/frontend/css/notification.css')); ?>" rel="newest stylesheet">

    <!-- Stylesheets -->
    <link href="<?php echo e(asset('themes/superio/assets/css/font.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('themes/superio/assets/css/bootstrap.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('themes/superio/assets/css/style.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('themes/superio/assets/css/responsive.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('themes/superio/dist/frontend/css/app.css?_ver='.config('app.asset_version'))); ?>" rel="stylesheet">

    <link href="<?php echo e(asset('themes/superio/dist/frontend/module/user/css/user.css')); ?>" rel="stylesheet">


    <?php echo \App\Helpers\Assets::css(); ?>

    <?php echo \App\Helpers\Assets::js(); ?>

    <?php echo $__env->make('Layout::parts.global-script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Styles -->
    <?php echo $__env->yieldContent('head'); ?>
    <style>
        :root{
            --main-color:<?php echo e(setting_item('style_main_color','#1967D2')); ?>

        }
    </style>
    
    <link href="<?php echo e(route('core.style.customCss')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('libs/carousel-2/owl.carousel.css')); ?>" rel="stylesheet">
    <?php if(setting_item_with_lang('enable_rtl')): ?>
        <link href="<?php echo e(asset('themes/superio/dist/frontend/css/rtl.css')); ?>" rel="stylesheet">
    <?php endif; ?>
    <?php echo setting_item('head_scripts'); ?>

    <?php echo setting_item_with_lang_raw('head_scripts'); ?>


    <?php event(new \Modules\Layout\Events\LayoutEndHead()); ?>

</head>
<body data-anm=".anm" class="frontend-page user_wrap <?php echo e($body_class ?? ''); ?> <?php if(!empty($is_home) or !empty($header_transparent)): ?> header_transparent <?php endif; ?> <?php if(setting_item_with_lang('enable_rtl')): ?> is-rtl <?php endif; ?> <?php if(is_api()): ?> is_api <?php endif; ?>">
<?php event(new \Modules\Layout\Events\LayoutBeginBody()); ?>

<?php echo setting_item('body_scripts'); ?>

<?php echo setting_item_with_lang_raw('body_scripts'); ?>

<div class="page-wrapper dashboard mm-page mm-slideout bravo_wrap">
    <?php if(!is_api()): ?>
        <?php echo $__env->make('Layout::parts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

    <!-- Sidebar Backdrop -->
    <div class="sidebar-backdrop"></div>

    <div class="user-dashboard bc-user-dashboard">
        <div class="dashboard-outer">
            <a href="javascript:void(0)" class="mobile-sidebar-btn hidden-lg hidden-md">
                <i class="fa fa-bars"></i> <?php echo e(__("Show Sidebar")); ?>

            </a>
            <div class="mobile-sidebar-panel-overlay"></div>
            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </div>

    <div class="copyright-text">
        <p><?php echo @clean(setting_item_with_lang('copyright')); ?></p>
    </div>

    <?php echo $__env->make('Layout::parts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('Layout::parts.footer', ['footer_null' => true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<?php echo setting_item('footer_scripts'); ?>

<?php echo setting_item_with_lang_raw('footer_scripts'); ?>

<?php event(new \Modules\Layout\Events\LayoutEndBody()); ?>

</body>
</html>
<?php /**PATH /Users/imac/Sites/localhost/Superio.2.6.1/superio.2.6.1/themes/Superio/Layout/user.blade.php ENDPATH**/ ?>