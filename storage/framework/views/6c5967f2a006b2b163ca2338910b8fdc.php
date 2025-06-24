<?php if(!empty($row->company)): ?>
    <?php $company_translation = $row->company->translateOrOrigin(app()->getLocale()); ?>
<div class="sidebar-widget company-widget">
    <div class="widget-content">
        <div class="company-title">
            <?php if(!empty($row->company->avatar_id)): ?>
                <div class="company-logo">
                    <a href="<?php echo e($row->company->getDetailUrl()); ?>"><img src="<?php echo e(\Modules\Media\Helpers\FileHelper::url($row->company->avatar_id)); ?>" alt="<?php echo e($row->company->name); ?>"></a>
                </div>
            <?php endif; ?>
            <h5 class="company-name"><?php echo e($company_translation->name); ?></h5>
            <a href="<?php echo e($row->company->getDetailUrl()); ?>" class="profile-link"><?php echo e(__("View company profile")); ?></a>
        </div>

        <ul class="company-info">
            <?php if($row->company->category): ?>
                <li><?php echo e(__("Primary industry:")); ?> <span><?php echo e($row->company->category->name); ?></span></li>
            <?php endif; ?>
            <?php if($row->company->teamSize): ?>
                <li><?php echo e(__("Company size:")); ?> <span><?php echo e($row->company->teamSize->name); ?></span></li>
            <?php endif; ?>
            <?php if($row->company->founded_in): ?>
                <li><?php echo e(__("Founded in:")); ?> <span><?php echo e(date('Y', strtotime($row->company->founded_in))); ?></span></li>
            <?php endif; ?>
            <?php if($row->company->phone): ?>
                <?php
                $phone = $row->company->phone;
                    if(setting_item('enable_hide_email_company')) {
                        $phone = "****".substr($row->company->phone, -3);
                    }
                ?>
                <li><?php echo e(__("Phone:")); ?> <span><?php echo e($phone); ?></span></li>
            <?php endif; ?>
            <?php if($row->company->email): ?>
                <?php
                $email = $row->company->email;
                if(setting_item('enable_hide_email_company')) {
                    $email_e = explode("@",$row->company->email);
                    if(isset($email_e[0]) && isset($email_e[1]))
                    {
                        $email = '****@'.$email_e[1];
                    }
                }
                ?>
                <li><?php echo e(__("Email:")); ?> <span><?php echo e($email); ?></span></li>
            <?php endif; ?>
            <?php if($row->company->location): ?>
                <li><?php echo e(__("Location:")); ?> <span><?php echo e($row->company->location->name); ?></span></li>
            <?php endif; ?>
            <?php if(!empty($row->company->social_media) && is_array($row->company->social_media) && count($row->company->social_media) > 0): ?>
                <li><?php echo e(__("Social media:")); ?>

                    <div class="social-links">
                        <?php $__currentLoopData = $row->company->social_media; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $social): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(!empty($social)): ?>
                                <a href="<?php echo e($social); ?>"><i class="fab fa-<?php echo e($key); ?>"></i></a>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </li>
            <?php endif; ?>
        </ul>
        <?php if($row->company->website): ?>
            <div class="btn-box"><a href="<?php echo e(($row->company->website)); ?>" class="theme-btn btn-style-three" target="_blank"><?php echo e($row->company->website); ?></a></div>
        <?php endif; ?>
    </div>
</div>
<?php endif; ?>
<?php /**PATH /Users/imac/Sites/localhost/Superio.2.6.1/superio.2.6.1/themes/Superio/Job/Views/frontend/layouts/details/company.blade.php ENDPATH**/ ?>