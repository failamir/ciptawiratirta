<?php
    $translation = $row->translateOrOrigin(app()->getLocale());
?>
<!-- Feature Block -->
<div class="feature-block">
    <div class="inner-box">
        <figure class="image">
            <img src="<?php echo e($row->getImageUrl()); ?>" alt="<?php echo e($row->name); ?>">
        </figure>
        <div class="overlay-box">
            <div class="content">
                <h5><?php echo e($translation->name); ?></h5>
                <span class="total-jobs"><?php echo e($row->openJobs->count()); ?> <?php echo e($row->openJobs->count() == 1 ? __("Job") : __("Jobs")); ?></span>
                <a href="<?php echo e(route('job.location.index', ['slug' => $row->slug])); ?>" class="overlay-link"></a>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /Users/imac/Sites/localhost/Superio.2.6.1/superio.2.6.1/modules/Location/Views/frontend/blocks/list-locations/loop.blade.php ENDPATH**/ ?>