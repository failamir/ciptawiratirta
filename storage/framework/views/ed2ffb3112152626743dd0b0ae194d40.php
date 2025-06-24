
<?php $__env->startSection('head'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="upper-title-box">
        <h3><?php echo e(__("Following Employers")); ?></h3>
        <div class="text"><?php echo e(__("Ready to jump back in?")); ?></div>
    </div>
    <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="ls-widget">
                <div class="tabs-box">
                    <div class="widget-title">
                        <h4><?php echo e(__("Following Employers")); ?></h4>

                        <div class="chosen-outer">
                            <form method="get" class="default-form form-inline" action="">
                                <div class="form-group mb-0 mr-1">
                                    <input type="text" name="s" placeholder="<?php echo e(__("Search...")); ?>" value="<?php echo e(request()->get('s')); ?>" class="form-control">
                                </div>
                                <button type="submit" class="theme-btn btn-style-one"><?php echo e(__("Search")); ?></button>
                            </form>
                        </div>
                    </div>

                    <div class="widget-content">
                        <div class="list-following-employer mb-4">
                            <?php if($rows->total() > 0): ?>
                                <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php echo $__env->make("Company::frontend.layouts.loop.company-item-bookmark", ['wishlist' => $row, 'row' => $row->service], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                                <h4 class="text-center"><?php echo e(__("No items")); ?></h4>
                            <?php endif; ?>
                        </div>
                        <div class="ls-pagination mt-0">
                            <?php echo e($rows->appends(request()->query())->onEachSide(1)->links()); ?>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/imac/Sites/localhost/Superio.2.6.1/superio.2.6.1/modules/User/Views/frontend/wishList/following-employers.blade.php ENDPATH**/ ?>