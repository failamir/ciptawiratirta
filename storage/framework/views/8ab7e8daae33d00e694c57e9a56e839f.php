<section class="banner-section-four" <?php if(!empty($banner_image)): ?> style="background-image: url(<?php echo e($banner_image_url); ?>);" <?php endif; ?>>
    <div class="auto-container">
        <div class="cotnent-box">
            <div class="title-box wow fadeInUp" data-wow-delay="500ms">
                <h3><?php echo @clean($title); ?></h3>
            </div>

            <div class="job-search-form wow fadeInUp" data-wow-delay="1000ms">
                <form method="get" action="<?php echo e(route('job.search')); ?>">
                    <div class="row">
                        <div class="form-group col-lg-4 col-md-12 col-sm-12">
                            <span class="icon flaticon-search-1"></span>
                            <input type="text" name="s" placeholder="<?php echo e(__('Job title, keywords, or company')); ?>">
                        </div>

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
                                <input type="text" class="smart-search-location parent_text form-control" placeholder="<?php echo e(__("All City")); ?>" value="<?php echo e($location_name); ?>" data-onLoad="<?php echo e(__("Loading...")); ?>"
                                       data-default="<?php echo e(json_encode($list_json)); ?>">
                                <input type="hidden" class="child_id" name="location" value="<?php echo e($location_id); ?>">
                                <span class="icon flaticon-map-locator"></span>
                            </div>
                        <?php else: ?>
                            <div class="form-group col-lg-3 col-md-12 col-sm-12 location bc-select-has-delete">
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

                        <div class="form-group col-lg-3 col-md-12 col-sm-12 category banner-category">
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

                        <div class="form-group col-lg-2 col-md-12 col-sm-12 text-right">
                            <button type="submit" class="theme-btn btn-style-two"><?php echo e(__('Find Jobs')); ?></button>
                        </div>
                    </div>
                </form>
            </div>

            <?php if(!empty($popular_searches)): ?>
                <div class="popular-searches wow fadeInUp" data-wow-delay="1000ms">
                    <span class="title"><?php echo e(__("Popular Searches")); ?> : </span>
                    <?php $__currentLoopData = $popular_searches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($key != 0): ?>, <?php endif; ?>
                        <a href="<?php echo e(route('job.search').'?s='.$val); ?>"><?php echo e($val); ?></a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php /**PATH /Users/imac/Sites/localhost/Superio.2.6.1/superio.2.6.1/themes/Superio/Template/Views/frontend/blocks/hero-banner/style_4.blade.php ENDPATH**/ ?>