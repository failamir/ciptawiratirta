<section class="banner-section-six">
    <div class="auto-container">
        <div class="row">
            <div class="content-column col-lg-7 col-md-12 col-sm-12">
                <div class="inner-column wow fadeInUp animated" data-wow-delay="1000ms">
                    <div class="title-box">
                        <h3><?php echo @clean($title); ?></h3>
                        <div class="text"><?php echo e($sub_title); ?></div>
                    </div>

                    <div class="job-search-form">
                        <form method="get" action="<?php echo e(route('job.search')); ?>">
                            <div class="row">
                                <div class="form-group col-lg-5 col-md-12 col-sm-12">
                                    <span class="icon flaticon-search-1"></span>
                                    <input type="text" name="s" placeholder="<?php echo e(__("Job title...")); ?>">
                                </div>
                                <!-- Form Group -->
                                <?php if($location_style == 'autocomplete'): ?>
                                    <?php
                                        $location_name = "";
                                        $list_json = [];
                                        $location_id = request()->get('location');
                                        $traverse = function ($locations, $prefix = '') use (&$traverse, &$list_json, &$location_name, $location_id) {
                                            foreach ($locations as $location) {
                                                $translate = $location->translateOrOrigin(app()->getLocale());
                                                if ($location_id == $location->id) {
                                                    $location_name = $translate->name;
                                                }
                                                $list_json[] = [
                                                    'id'    => $location->id,
                                                    'title' => $prefix.' '.$translate->name,
                                                ];
                                                $traverse($location->children, $prefix.'-');
                                            }
                                        };
                                        $traverse($list_locations);
                                    ?>
                                    <div class="form-group col-lg-4 col-md-12 col-sm-12 location smart-search">
                                        <input type="text" class="smart-search-location parent_text form-control" placeholder="<?php echo e(__("All City")); ?>" value="<?php echo e($location_name); ?>" data-onLoad="<?php echo e(__("Loading...")); ?>"
                                               data-default="<?php echo e(json_encode($list_json)); ?>">
                                        <input type="hidden" class="child_id" name="location" value="<?php echo e($location_id); ?>">
                                        <span class="icon flaticon-map-locator"></span>
                                    </div>
                                <?php else: ?>
                                    <div class="form-group col-lg-4 col-md-12 col-sm-12 location bc-select-has-delete">
                                        <span class="icon flaticon-map-locator"></span>
                                        <select class="chosen-select" name="location">
                                            <option value=""><?php echo e(__("All City")); ?></option>
                                            <?php
                                                $traverse = function ($locations, $prefix = '') use (&$traverse) {
                                                    foreach ($locations as $location) {
                                                        $translate = $location->translateOrOrigin(app()->getLocale());
                                                        printf("<option value='%s'>%s</option>", $location->id, $prefix . ' ' . $translate->name);
                                                        $traverse($location->children, $prefix . '-');
                                                    }
                                                };
                                                $traverse($list_locations);
                                            ?>
                                        </select>
                                    </div>
                                <?php endif; ?>
                                <!-- Form Group -->
                                <div class="form-group col-lg-3 col-md-12 col-sm-12 btn-box">
                                    <button type="submit" class="theme-btn btn-style-one"><span class="btn-title"><?php echo e(__("Find Jobs")); ?></span></button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <?php if(!empty($popular_searches)): ?>
                        <div class="popular-searches">
                            <span class="title"><?php echo e(__("Popular Searches")); ?> : </span>
                            <?php $__currentLoopData = $popular_searches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($key != 0): ?>, <?php endif; ?>
                                <a href="<?php echo e(route('job.search').'?s='.$val); ?>"><?php echo e($val); ?></a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="image-column col-lg-5 col-md-12">
                <div class="image-box">
                    <?php if(!empty($banner_image)): ?>
                        <figure class="main-image wow fadeIn" data-wow-delay="500ms">
                            <img src="<?php echo e($banner_image_url); ?>" alt="banner image">
                        </figure>
                    <?php endif; ?>

                    <?php if(!empty($style_6_list_images)): ?>
                        <?php $__currentLoopData = $style_6_list_images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($key == 0 && !empty($val['image_id'])): ?>
                                <!-- Info BLock One -->
                                    <div class="info_block anm wow fadeIn" data-wow-delay="1000ms" data-speed-x="2" data-speed-y="2">
                                        <?php if(!empty($val['url'])): ?> <a href="<?php echo e($val['url']); ?>"> <?php endif; ?>
                                            <img src="<?php echo e(\Modules\Media\Helpers\FileHelper::url($val['image_id'], 'full')); ?>" alt="">
                                            <?php if(!empty($val['url'])): ?> </a> <?php endif; ?>
                                    </div>
                            <?php endif; ?>
                            <?php if($key == 1 && !empty($val['image_id'])): ?>
                                <!-- Info BLock Two -->
                                    <div class="info_block_two anm wow fadeIn" data-wow-delay="2000ms" data-speed-x="1" data-speed-y="1">
                                        <?php if(!empty($val['url'])): ?> <a href="<?php echo e($val['url']); ?>"> <?php endif; ?>
                                            <img src="<?php echo e(\Modules\Media\Helpers\FileHelper::url($val['image_id'], 'full')); ?>" alt="">
                                            <?php if(!empty($val['url'])): ?> </a> <?php endif; ?>
                                    </div>
                            <?php endif; ?>
                            <?php if($key == 2 && !empty($val['image_id'])): ?>
                                <!-- Info BLock Three -->
                                    <div class="info_block_three anm wow fadeIn" data-wow-delay="1500ms" data-speed-x="4" data-speed-y="4">
                                        <?php if(!empty($val['url'])): ?> <a href="<?php echo e($val['url']); ?>"> <?php endif; ?>
                                            <img src="<?php echo e(\Modules\Media\Helpers\FileHelper::url($val['image_id'], 'full')); ?>" alt="">
                                            <?php if(!empty($val['url'])): ?> </a> <?php endif; ?>
                                    </div>
                            <?php endif; ?>
                            <?php if($key == 3 && !empty($val['image_id'])): ?>
                                <!-- Info BLock Four -->
                                    <div class="info_block_four anm wow fadeIn" data-wow-delay="2500ms" data-speed-x="3" data-speed-y="3">
                                        <?php if(!empty($val['url'])): ?> <a href="<?php echo e($val['url']); ?>"> <?php endif; ?>
                                            <img src="<?php echo e(\Modules\Media\Helpers\FileHelper::url($val['image_id'], 'full')); ?>" alt="">
                                            <?php if(!empty($val['url'])): ?> </a> <?php endif; ?>
                                    </div>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php /**PATH /Users/imac/Sites/localhost/Superio.2.6.1/superio.2.6.1/themes/Superio/Template/Views/frontend/blocks/hero-banner/style_6.blade.php ENDPATH**/ ?>