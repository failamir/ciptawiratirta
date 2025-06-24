<!-- Job Skills -->
<?php if($row->skills): ?>
<h4 class="widget-title"><?php echo e(__("Job Skills")); ?></h4>
<div class="widget-content">
    <ul class="job-skills">
        <?php $__currentLoopData = $row->skills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php $skill_translation = $skill->translateOrOrigin(app()->getLocale()) ?>
            <li><a><?php echo e($skill_translation->name); ?></a></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</div>
<?php endif; ?>
<?php /**PATH /Users/imac/Sites/localhost/Superio.2.6.1/superio.2.6.1/themes/Superio/Job/Views/frontend/layouts/details/skills.blade.php ENDPATH**/ ?>