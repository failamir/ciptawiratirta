<!-- Banner Section-->
<section class="banner-section-two">
    <div class="auto-container">
        <div class="row">
            <div class="content-column col-lg-7 col-md-12 col-sm-12">
                <div class="inner-column wow fadeInUp">
                    <div class="title-box">
                        <h3><?php echo @clean($title); ?></h3>
                        <div class="text"><?php echo e($sub_title); ?></div>
                    </div>

                    <!-- Job Search Form -->
                    <div class="job-search-form">
                        <form method="GET" action="<?php echo e(route('job.search')); ?>">
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
                                <div class="form-group col-lg-3 col-md-12 col-sm-12 text-right">
                                    <button type="submit" class="theme-btn btn-style-one"><span class="btn-title"><?php echo e(__("Find Jobs")); ?></span></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Job Search Form -->
                    <?php if(!empty($popular_searches)): ?>
                        <!-- Popular Search -->
                        <div class="popular-searches">
                            <span class="title"><?php echo e(__("Popular Searches")); ?> : </span>
                            <?php $__currentLoopData = $popular_searches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($key != 0): ?>, <?php endif; ?>
                                <a href="<?php echo e(route('job.search').'?s='.$val); ?>"><?php echo e($val); ?></a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <!-- End Popular Search -->
                    <?php endif; ?>

                    <div class="bottom-box">
                        <div class="count-employers">
                            <?php if($banner_image_2): ?>
                                <img src="<?php echo e(\Modules\Media\Helpers\FileHelper::url($banner_image_2, 'full')); ?>" alt="img">
                            <?php endif; ?>
                        </div>
                        <?php if(!empty($upload_cv_url)): ?>
                            <a href="<?php echo e($upload_cv_url); ?>" class="upload-cv"><span class="icon flaticon-file"></span> <?php echo e(__("Upload your CV")); ?></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="image-column col-lg-5 col-md-12">
                <div class="image-box">
                    <?php if(!empty($banner_image)): ?>
                        <figure class="main-image anm"  data-wow-delay="1000ms" data-speed-x="2" data-speed-y="2">
                            <img src="<?php echo e($banner_image_url); ?>" alt="banner image">
                        </figure>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Section-->
<?php /**PATH /Users/imac/Sites/localhost/Superio.2.6.1/superio.2.6.1/themes/Superio/Template/Views/frontend/blocks/hero-banner/style_2.blade.php ENDPATH**/ ?>