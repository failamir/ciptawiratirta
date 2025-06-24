<li class="menu-hr"><a href="<?php echo e(route('user.dashboard')); ?>"><?php echo e(__("Dashboard")); ?></a></li>

<?php if(is_employer()): ?>
    <li class="dropdown-divider"></li>
    <li class="dropdown-header"><?php echo e(__("Employer")); ?></li>
    <li class="menu-hr"><a href="<?php echo e(route('user.company.profile')); ?>"><?php echo e(__("Company profile")); ?></a></li>

    <li class="menu-hr"><a href="<?php echo e(route('user.manage.jobs')); ?>"><?php echo e(__("Manage Jobs")); ?></a></li>
    <li class="menu-hr"><a href="<?php echo e(route('user.applicants')); ?>"><?php echo e(__("All Applicants")); ?></a></li>
    <li class="menu-hr"><a href="<?php echo e(route('user.wishList.index')); ?>"> <?php echo e(__("Shortlisted")); ?></a></li>
<?php endif; ?>
<?php if(Modules\Gig\Models\Gig::isEnable()): ?>
    <li class="dropdown-divider"></li>
    <li class="dropdown-header"><?php echo e(__("Gigs")); ?></li>
    <li >
        <?php if(auth()->user()->hasPermission('gig_manage')): ?>
        <a href="<?php echo e(route('seller.all.gigs')); ?>"><?php echo e(__("All Gigs")); ?></a>
        <a href="<?php echo e(route('seller.dashboard')); ?>"><?php echo e(__("Seller Dashboard")); ?></a>
        <a href="<?php echo e(route('seller.orders')); ?>"><?php echo e(__("Gig Orders")); ?></a>
        <?php else: ?>
            <a href="<?php echo e(route('buyer.orders')); ?>"><?php echo e(__("Gig Orders")); ?></a>
            <?php endif; ?>
    </li>
<?php endif; ?>
<?php if(is_candidate() && !is_admin()): ?>
    <li class="dropdown-divider"></li>
    <li class="dropdown-header"><?php echo e(__("Candidate")); ?></li>
    <li class="menu-hr"><a href="<?php echo e(route('user.candidate.index')); ?>"><?php echo e(__("My profile")); ?></a></li>
    <?php if(\Modules\Gig\Models\Gig::isEnable() && \Modules\Payout\Models\VendorPayout::isEnable()): ?>
        <li class="menu-hr"><a href="<?php echo e(route('payout.candidate.index')); ?>"><?php echo e(__("Payouts")); ?></a></li>
    <?php endif; ?>
    <li class="menu-hr"><a href="<?php echo e(route('user.applied_jobs')); ?>"><?php echo e(__("Applied Jobs")); ?></a></li>
    <li class="menu-hr"><a href="<?php echo e(route('user.wishList.index')); ?>"> <?php echo e(__("Shortlisted")); ?></a></li>
    <li class="menu-hr"><a href="<?php echo e(route('user.following.employers')); ?>"><?php echo e(__("Following")); ?></a></li>
<?php endif; ?>
<li class="dropdown-divider"></li>
<li class="menu-hr"><a href="<?php echo e(route('user.plan')); ?>"><?php echo e(__("My Plans")); ?></a></li>
<li class="menu-hr"><a href="<?php echo e(route('user.my-contact')); ?>"><?php echo e(__("My Contact")); ?></a></li>
<li class="menu-hr"><a href="<?php echo e(route('user.change_password')); ?>"><?php echo e(__("Change password")); ?></a></li>

<?php if(is_admin()): ?>
    <li class="dropdown-divider"></li>
    <li class="menu-hr"><a href="<?php echo e(url('/admin')); ?>"><?php echo e(__("Admin Dashboard")); ?></a></li>
<?php endif; ?>
<li class="dropdown-divider"></li>
<li class="menu-hr">
    <a  href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><?php echo e(__('Logout')); ?></a>
</li>
<?php /**PATH /Users/imac/Sites/localhost/Superio.2.6.1/superio.2.6.1/modules/Layout/parts/user-menu.blade.php ENDPATH**/ ?>