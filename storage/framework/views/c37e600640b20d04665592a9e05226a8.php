    <?php
        $candidate = $row->candidate;
    ?>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class=""><?php echo e(__("Country")); ?></label>
                <select name="country" class="form-control" id="country-sms-testing">
                    <option value=""><?php echo e(__('-- Select --')); ?></option>
                    <?php $__currentLoopData = get_country_lists(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id=>$name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option <?php if(@$candidate->country==$id): ?> selected <?php endif; ?> value="<?php echo e($id); ?>"><?php echo e($name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label><?php echo e(__("City")); ?></label>
                <input type="text" value="<?php echo e(old('city',@$candidate->city)); ?>" name="city" placeholder="<?php echo e(__("City")); ?>" class="form-control">
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label><?php echo e(__('Address Line')); ?></label>
                <input type="text" value="<?php echo e(old('address',@$candidate->address)); ?>" placeholder="<?php echo e(__('Address')); ?>" name="address" class="form-control">
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label"><?php echo e(__("Location")); ?></label>
        <?php if(!empty($is_smart_search)): ?>
            <div class="form-group-smart-search">
                <div class="form-content">
                    <?php
                    $location_name = "";
                    $list_json = [];
                    $traverse = function ($locations, $prefix = '') use (&$traverse, &$list_json , &$location_name, $candidate) {
                        foreach ($locations as $location) {
                            $translate = $location->translateOrOrigin(app()->getLocale());
                            if (@$candidate->location_id == $location->id){
                                $location_name = $translate->name;
                            }
                            $list_json[] = [
                                'id' => $location->id,
                                'title' => $prefix . ' ' . $translate->name,
                            ];
                            $traverse($location->children, $prefix . '-');
                        }
                    };
                    $traverse($locations);
                    ?>
                    <div class="smart-search">
                        <input type="text" class="smart-search-location parent_text form-control" placeholder="<?php echo e(__("-- Please Select --")); ?>" value="<?php echo e($location_name); ?>" data-onLoad="<?php echo e(__("Loading...")); ?>"
                               data-default="<?php echo e(json_encode($list_json)); ?>">
                        <input type="hidden" class="child_id" name="location_id" value="<?php echo e(@$candidate->location_id ?? Request::query('location_id')); ?>">
                    </div>
                </div>
            </div>
        <?php else: ?>
            <div class="">
                <select name="location_id" class="form-control">
                    <option value=""><?php echo e(__("-- Please Select --")); ?></option>
                    <?php
                    $traverse = function ($locations, $prefix = '') use (&$traverse, $candidate) {
                        foreach ($locations as $location) {
                            $selected = '';
                            if (@$candidate->location_id == $location->id)
                                $selected = 'selected';
                            printf("<option value='%s' %s>%s</option>", $location->id, $selected, $prefix . ' ' . $location->name);
                            $traverse($location->children, $prefix . '-');
                        }
                    };
                    $traverse($locations);
                    ?>
                </select>
            </div>
        <?php endif; ?>
    </div>
    <div class="form-group">
        <label class="control-label"><?php echo e(__("The geographic coordinate")); ?></label>
        <div class="control-map-group">
            <div id="map_content"></div>
            <input type="text" placeholder="<?php echo e(__("Search by name...")); ?>" class="bravo_searchbox form-control" autocomplete="off" onkeydown="return event.key !== 'Enter';">
            <div class="g-control">
                <div class="form-group">
                    <label><?php echo e(__("Map Latitude")); ?>:</label>
                    <input type="text" name="map_lat" class="form-control" value="<?php echo e(@$candidate->map_lat ?? "51.505"); ?>" onkeydown="return event.key !== 'Enter';">
                </div>
                <div class="form-group">
                    <label><?php echo e(__("Map Longitude")); ?>:</label>
                    <input type="text" name="map_lng" class="form-control" value="<?php echo e(@$candidate->map_lng ?? "-0.09"); ?>" onkeydown="return event.key !== 'Enter';">
                </div>
                <div class="form-group">
                    <label><?php echo e(__("Map Zoom")); ?>:</label>
                    <input type="text" name="map_zoom" class="form-control" value="<?php echo e(@$candidate->map_zoom ?? "8"); ?>" onkeydown="return event.key !== 'Enter';">
                </div>
            </div>
        </div>
    </div>



<?php /**PATH /Users/imac/Sites/localhost/Superio.2.6.1/superio.2.6.1/modules/Candidate/Views/admin/candidate/location.blade.php ENDPATH**/ ?>