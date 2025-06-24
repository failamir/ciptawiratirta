<?php
$checkNotify = \Modules\Core\Models\NotificationPush::query();
if(is_admin()){
    $checkNotify->where(function($query){
        $query->where('data', 'LIKE', '%"for_admin":1%');
        $query->orWhere('notifiable_id', Auth::id());
    });
}else{
    $checkNotify->where('data', 'LIKE', '%"for_admin":0%');
    $checkNotify->where('notifiable_id', Auth::id());
}
$notifications = $checkNotify->orderBy('created_at', 'desc')->limit(5)->get();
$countUnread = $checkNotify->where('read_at', null)->count();
?>
<div class="dropdown-notifications dropdown p-0">
    <a href="#" data-bs-toggle="dropdown" class="menu-btn notify-button">
        <span class="count wishlist_count text-center"><?php echo e($countUnread); ?></span>
        <i class="icon la la-bell"></i>
    </a>
    <ul class="dropdown-menu">
        <div class="dropdown-toolbar">
            <h3 class="dropdown-toolbar-title fs-16 mb-0"><?php echo e(__('Notifications')); ?> (<span class="notify-count"><?php echo e($countUnread); ?></span>)</h3>
            <div class="dropdown-toolbar-actions">
                <a href="#" class="markAllAsRead fs-14"><?php echo e(__('Mark all as read')); ?></a>
            </div>
        </div>
        <div class="list-group">
            <?php if(count($notifications)> 0): ?>
                <?php $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $oneNotification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                    <li class="notify-item <?php echo e($active); ?>">
                        <a class="<?php echo e($class); ?> p-0" data-id="<?php echo e($idNotification); ?>" href="<?php echo e($link); ?>">
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
                                    <?php echo $title; ?>

                                    <div class="notification-meta">
                                        <small class="timestamp"><?php echo e(format_interval($oneNotification->created_at)); ?></small>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                <a href="#" class="list-group-item list-group-item-action">
                    <span class="fs-14"><?php echo e(__("No notification")); ?></span>
                </a>
            <?php endif; ?>
        </div>
        <div class="dropdown-footer">
            <a class="btn btn-primary" href="<?php echo e(route('core.notification.loadNotify')); ?>"><?php echo e(__('View More')); ?></a>
        </div>
    </ul>
</div>
<?php /**PATH /Users/imac/Sites/localhost/Superio.2.6.1/superio.2.6.1/modules/Layout/parts/notification.blade.php ENDPATH**/ ?>