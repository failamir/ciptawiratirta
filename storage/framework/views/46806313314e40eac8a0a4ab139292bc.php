<div class="btn-box">
    <?php if($row->isOpen()): ?>
        <?php if(empty(setting_item('job_hide_job_apply')) && $row->apply_type == 'email'): ?>
            <a href="mailto:<?php echo e($row->apply_email ?? ($row->company->email ?? '')); ?>" target="_blank" rel="nofollow" class="theme-btn btn-style-one"><?php echo e(__("Apply For Job")); ?></a>
        <?php elseif(empty(setting_item('job_hide_job_apply')) && $row->apply_type == 'external'): ?>
            <a href="<?php echo e($row->apply_link); ?>" target="_blank" rel="nofollow" class="theme-btn btn-style-one"><?php echo e(__("Apply For Job")); ?></a>
        <?php else: ?>
            <?php if(!auth()->check()): ?>
                <a href="#" class="theme-btn btn-style-one bc-call-modal login"><?php echo e(__("Apply For Job")); ?></a>
            <?php else: ?>
                <?php if($applied): ?>
                    <a href="javascript:void(0)" class="theme-btn btn-style-one bc-apply-job-button"><?php echo e(__("Applied")); ?></a>
                <?php else: ?>
                    <?php if($candidate and !empty($check_apply_job = $candidate->check_maximum_apply_job())): ?>
                        <div class="text-danger apply-out"><?php echo e($check_apply_job['mess']); ?></div>
                    <?php else: ?>
                        <a href="#" data-require-text="<?php echo e(__('Please login as "Candidate" to apply')); ?>" class="theme-btn btn-style-one bc-apply-job-button <?php if(!is_candidate() || empty($candidate)): ?> bc-require-candidate-apply <?php else: ?> bc-call-modal apply-job <?php endif; ?>"><?php echo e(__("Apply For Job")); ?></a>
                    <?php endif; ?>
                <?php endif; ?>
                <?php echo $__env->make('Job::frontend.layouts.details.apply-job-popup', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
        <?php endif; ?>
    <?php else: ?>
        <div class="text-danger job-expired"><?php echo e(__("Job expired!")); ?></div>
    <?php endif; ?>
    <button class="bookmark-btn service-wishlist <?php if($row->wishlist): ?> active <?php endif; ?>" data-id="<?php echo e($row->id); ?>" data-type="<?php echo e($row->type); ?>"><i class="flaticon-bookmark"></i></button>
</div>
<?php /**PATH /Users/imac/Sites/localhost/Superio.2.6.1/superio.2.6.1/themes/Superio/Job/Views/frontend/layouts/details/apply-button.blade.php ENDPATH**/ ?>