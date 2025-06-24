<section class="top-companies">
    <div class="auto-container">
        <div class="sec-title-outer">
            <div class="sec-title">
                <h2><?php echo e($title); ?></h2>
                <div class="text"><?php echo e($sub_title); ?></div>
            </div>
            <?php if(!empty($load_more_url)): ?>
                <a href="<?php echo e($load_more_url); ?>" class="link"><?php echo e(__('Browse All')); ?><span class="icon fa fa-angle-right"></span></a>
            <?php endif; ?>
        </div>

        <div class="row wow fadeInUp">
            <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $translation = $row->translateOrOrigin(app()->getLocale());
                ?>
            <div class="company-block-two col-lg-6 col-md-12 col-sm-12">
                <div class="inner-box">
                    <div class="content">
                        <figure class="image">
                            <?php if($image_tag = get_image_tag($row->avatar_id,'full',['alt'=>$translation->title])): ?>
                                <?php echo $image_tag; ?>

                            <?php endif; ?>
                        </figure>
                        <h4 class="name"><?php echo e($translation->name); ?></h4>
                        <?php if($row->location): ?>
                            <div class="location"><i class="flaticon-map-locator"></i> <?php echo e($row->location->name); ?></div>
                        <?php endif; ?>
                    </div>
                    <a href="<?php echo e($row->getDetailUrl()); ?>" class="theme-btn btn-style-three"><?php echo e(__(":count Open Position",["count"=> number_format($row->jobs_count)])); ?></a>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<?php /**PATH /Users/imac/Sites/localhost/Superio.2.6.1/superio.2.6.1/themes/Superio/Company/Views/frontend/blocks/list-company/style_5.blade.php ENDPATH**/ ?>