<section class="banner-section-five">
    <div class="auto-container">
        <div class="row">
            <div class="content-column col-lg-7 col-md-12 col-sm-12">
                <div class="inner-column wow fadeInUp"  data-wow-delay="500ms">
                    <div class="title-box">
                        <h3><?php echo @clean($title); ?></h3>
                        <div class="text"><?php echo e($sub_title); ?></div>
                    </div>

                    <!-- Job Search Form -->
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
                                    <button type="submit" class="theme-btn btn-style-seven"><span class="btn-title"><?php echo e(__("Find Jobs")); ?></span></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Job Search Form -->
                </div>
            </div>

            <div class="image-column col-lg-5 col-md-12">
                <div class="image-box">
                    <div class="row">
                        <?php if(!empty($banner_image)): ?>
                            <div class="column col-lg-6 col-md-6 col-sm-12 wow fadeInLeft" data-wow-delay="1500ms">
                                <figure class="image anm" data-speed-x="2"><img src="<?php echo e(get_file_url($banner_image,'full')); ?>" alt=""></figure>
                            </div>
                        <?php endif; ?>
                        <div class="column col-lg-6 col-md-6 col-sm-12 wow fadeInRight" data-wow-delay="2000ms">
                            <?php if(!empty($style_5_banner_image_2)): ?>
                                <figure class="image anm" data-speed-x="2"><img src="<?php echo e(get_file_url($style_5_banner_image_2,'full')); ?>" alt=""></figure>
                            <?php endif; ?>
                            <?php if(!empty($style_5_banner_image_3)): ?>
                                <figure class="image anm" data-speed-x="2"><img src="<?php echo e(get_file_url($style_5_banner_image_3,'full')); ?>" alt=""></figure>
                            <?php endif; ?>
                        </div>
                    </div>

                    <?php if(!empty($style_5_list_images)): ?>
                        <?php $__currentLoopData = $style_5_list_images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($key == 0 && !empty($val['image_id'])): ?>
                                <div class="info_block wow fadeIn anm" data-wow-delay="2500ms" data-speed-x="2" data-speed-y="2">
                                    <?php if(!empty($val['url'])): ?> <a href="<?php echo e($val['url']); ?>"> <?php endif; ?>
                                        <img src="<?php echo e(\Modules\Media\Helpers\FileHelper::url($val['image_id'], 'full')); ?>" alt="">
                                        <?php if(!empty($val['url'])): ?> </a> <?php endif; ?>
                                </div>
                            <?php endif; ?>
                            <?php if($key == 1 && !empty($val['image_id'])): ?>
                                <div class="info_block_two anm wow fadeIn" data-wow-delay="2000ms" data-speed-x="1" data-speed-y="1">
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
<?php /**PATH /Users/imac/Sites/localhost/Superio.2.6.1/superio.2.6.1/themes/Superio/Template/Views/frontend/blocks/hero-banner/style_5.blade.php ENDPATH**/ ?>