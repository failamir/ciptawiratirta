<section class="banner-section-nine" style="background-image: url(<?php if(!empty($banner_image)): ?> <?php echo e($banner_image_url); ?> <?php endif; ?>)">
    <div class="auto-container">
        <div class="cotnent-box">
            <div class="title-box wow fadeInUp" data-wow-delay='300ms'>
                <h3><?php echo $title; ?></h3>
                <div class="text"><?php echo e($sub_title); ?></div>
            </div>

            <!-- Job Search Form -->
            <div class="job-search-form wow">
                <form method="get" action="<?php echo e(route('job.search')); ?>">
                    <div class="row">
                        <!-- Form Group -->
                        <div class="form-group col-lg-4 col-md-12 col-sm-12">
                            <label><?php echo e(__("What job are you looking for")); ?>?</label>
                            <span class="icon flaticon-search-1"></span>
                            <input type="text" name="field_name" placeholder="<?php echo e(__("Job title...")); ?>">
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
                            <div class="form-group col-lg-3 col-md-12 col-sm-12 location smart-search">
                                <label><?php echo e(__("Where")); ?>?</label>
                                <input type="text" class="smart-search-location parent_text form-control" placeholder="<?php echo e(__("All City")); ?>" value="<?php echo e($location_name); ?>" data-onLoad="<?php echo e(__("Loading...")); ?>"
                                       data-default="<?php echo e(json_encode($list_json)); ?>">
                                <input type="hidden" class="child_id" name="location" value="<?php echo e($location_id); ?>">
                                <span class="icon flaticon-map-locator"></span>
                            </div>
                        <?php else: ?>
                            <div class="form-group col-lg-3 col-md-12 col-sm-12 location bc-select-has-delete">
                                <label><?php echo e(__("Where")); ?>?</label>
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
                        <div class="form-group col-lg-3 col-md-12 col-sm-12 category banner-category">
                            <label><?php echo e(__("Categories")); ?></label>
                            <span class="icon flaticon-briefcase"></span>
                            <select class="bc-select2" name="category">
                                <option value=""><?php echo e(__('All Categories')); ?></option>
                                <?php $__currentLoopData = $list_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $translate = $cat->translateOrOrigin(app()->getLocale());
                                    ?>
                                    <option value="<?php echo e($cat->id); ?>" <?php if($cat->id == request()->get('category')): ?> selected <?php endif; ?>  ><?php echo e($translate->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <!-- Form Group -->
                        <div class="form-group col-lg-2 col-md-12 col-sm-12 text-right">
                            <button type="submit" class="theme-btn btn-style-two"><?php echo e(__("Find Jobs")); ?></button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- Job Search Form -->

            <!-- Fun Fact Section -->
            <?php if(!empty($list_counter)): ?>
            <div class="fun-fact-section">
                <div class="row">
                    <!--Column-->
                    <?php $__currentLoopData = $list_counter; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $counter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="counter-column col-lg-3 col-md-6 col-sm-12 wow fadeInUp">
                            <div class="count-box"><span class="count-text" data-speed="3000" data-stop="<?php echo e($counter['title']); ?>">0</span></div>
                            <h4 class="counter-title"><?php echo e($counter['sub_title']); ?></h4>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <?php endif; ?>
            <!-- Fun Fact Section -->
        </div>
    </div>
</section>
<?php /**PATH /Users/imac/Sites/localhost/Superio.2.6.1/superio.2.6.1/themes/Superio/Template/Views/frontend/blocks/hero-banner/style_9.blade.php ENDPATH**/ ?>