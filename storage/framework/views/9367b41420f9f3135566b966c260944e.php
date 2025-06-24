<?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $oneNotification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php
        $active = $class = '';
        $data = json_decode($oneNotification['data']);

        $idNotification = @$data->id;
        $forAdmin = @$data->for_admin;
        $usingData = @$data->notification;

        $services = @$usingData->type;
        $idServices = @$usingData->id;
        $title = @$usingData->message;
        $name = @$usingData->name;
        $avatar = @$usingData->avatar;
        $link = @$usingData->link;

        if(empty($oneNotification->read_at)){
            $class = 'markAsRead';
            $active = 'active';
        }
    ?>
    <li class="notification <?php echo e($active); ?>">
        <div class="media">
            <div class="media-left">
                <div class="media-object">
                    <?php if($avatar): ?>
                        <img class="image-responsive" src="<?php echo e($avatar); ?>" alt="<?php echo e($name); ?>">
                    <?php else: ?>
                        <span class="avatar-text"><?php echo e(ucfirst($name[0])); ?></span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="media-body">
                <a class="<?php echo e($class); ?> p-0" data-id="<?php echo e($idNotification); ?>" href="<?php echo e($link); ?>"><?php echo $title; ?></a>
                <div class="notification-meta">
                    <small class="timestamp"><?php echo e(format_interval($oneNotification->created_at)); ?></small>
                </div>
            </div>
        </div>
    </li>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH /Users/imac/Sites/localhost/Superio.2.6.1/superio.2.6.1/modules/Core/Views/admin/notification/notification-loop-item.blade.php ENDPATH**/ ?>