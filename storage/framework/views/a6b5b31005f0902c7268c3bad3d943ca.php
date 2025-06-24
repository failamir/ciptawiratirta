

<?php $__env->startSection('content'); ?>
    <form action="<?php echo e(url('admin/module/user/store/'.($row->id ?? -1))); ?>" method="post" class="needs-validation" novalidate>
        <?php echo csrf_field(); ?>
        <div class="container-fluid">
            <div class="d-flex justify-content-between mb20">
                <div class="">
                    <h1 class="title-bar"><?php echo e($row->id ? __('Edit: ').$row->getDisplayName() : __("Add new user")); ?></h1>
                    <?php if(!empty($row->candidate)): ?>
                        <p class="item-url-demo"><?php echo e(__("Permalink")); ?>: <?php echo e(url(config('candidate.candidate_route_prefix') )); ?>/<a href="#" class="open-edit-input" data-name="slug"><?php echo e($row->candidate->slug); ?></a>
                        </p>
                    <?php endif; ?>
                </div>
                <?php if(is_admin() && !empty($row->candidate) && !empty($row->candidate->slug) && old('role_id',$row->role_id) == 3): ?>
                    <div class="flex">
                        <a class="btn btn-default btn-sm" href="<?php echo e(route('candidate.detail', ['slug' => $row->candidate->slug])); ?>" target="_blank"><i class="fa fa-eye"></i> <?php echo e(__("View Candidate")); ?></a>
                    </div>
                <?php endif; ?>
            </div>
            <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="row">
                <div class="col-md-9">
                    <div class="panel">
                        <div class="panel-title"><strong><?php echo e(__('User Info')); ?></strong></div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><?php echo e(__('E-mail')); ?></label>
                                        <input type="email" required value="<?php echo e(old('email',$row->email)); ?>" placeholder="<?php echo e(__('Email')); ?>" name="email" class="form-control"  >
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><?php echo e(__("First name")); ?></label>
                                        <input type="text" required value="<?php echo e(old('first_name',$row->first_name)); ?>" name="first_name" placeholder="<?php echo e(__("First name")); ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><?php echo e(__("Last name")); ?></label>
                                        <input type="text" required value="<?php echo e(old('last_name',$row->last_name)); ?>" name="last_name" placeholder="<?php echo e(__("Last name")); ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><?php echo e(__('Phone Number')); ?></label>
                                        <input type="text" value="<?php echo e(old('phone',$row->phone)); ?>" placeholder="<?php echo e(__('Phone')); ?>" name="phone" class="form-control" required   >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><?php echo e(__('Birthday')); ?></label>
                                        <input type="text" readonly style="background: white" value="<?php echo e(old('birthday',$row->birthday ? date("Y/m/d",strtotime($row->birthday)) :'')); ?>" placeholder="<?php echo e(__('Birthday')); ?>" name="birthday" class="form-control has-datepicker input-group date">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label"><?php echo e(__('Biographical')); ?></label>
                                <div class="">
                                    <textarea name="bio" class="d-none has-ckeditor" cols="30" rows="10"><?php echo e(old('bio',$row->bio)); ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php if($row->hasRole('candidate') || !empty($candidate_create)): ?>
                        <div class="panel">
                            <div class="panel-title"><strong><?php echo e(__('Candidate Info')); ?></strong></div>
                            <div class="panel-body">
                                <?php echo $__env->make('Candidate::admin/candidate/form',['row'=> $row,'user'=>$row], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        </div>

                        <div class="panel">
                            <div class="panel-title"><strong><?php echo e(__('Location Info')); ?></strong></div>
                            <div class="panel-body">
                                <?php echo $__env->make('Candidate::admin/candidate/location',['row'=> $row, 'locations' => $locations], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        </div>

                        <div class="panel">
                            <div class="panel-title"><strong><?php echo e(__('Education - Experience - Award')); ?></strong></div>
                            <div class="panel-body">
                                <?php echo $__env->make('Candidate::admin/candidate/sub_information',['row'=> $row], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        </div>
                        <?php if(!empty($row->candidate)): ?>
                            <?php echo $__env->make('Core::admin/seo-meta/seo-meta', ['row' => $row->candidate], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>

                <div class="col-md-3">
                    <div class="panel">
                        <div class="panel-title"><strong><?php echo e(__('Publish')); ?></strong></div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label><?php echo e(__('Status')); ?></label>
                                <select required class="custom-select" name="status">
                                    <option value=""><?php echo e(__('-- Select --')); ?></option>
                                    <option <?php if(old('status',$row->status) =='publish'): ?> selected <?php endif; ?> value="publish"><?php echo e(__('Publish')); ?></option>
                                    <option <?php if(old('status',$row->status) =='blocked'): ?> selected <?php endif; ?> value="blocked"><?php echo e(__('Blocked')); ?></option>
                                </select>
                            </div>
                            <?php if(is_admin()): ?>
                            <div class="form-group">
                                <label><?php echo e(__('Role')); ?></label>
                                <select required class="form-control" name="role_id">
                                    <option value=""><?php echo e(__('-- Select --')); ?></option>
                                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($role->id); ?>" <?php if(old('role_id',$row->role_id) == $role->id): ?> selected <?php elseif(old('role_id')  == $role->id ): ?> selected <?php endif; ?> ><?php echo e(ucfirst($role->name)); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <?php endif; ?>
                            <?php if($row->hasRole('candidate') || !empty($candidate_create)): ?>
                                <div class="form-group">
                                    <label><?php echo e(__('Allow Search')); ?></label>
                                    <select required class="custom-select" name="allow_search">
                                        <option value=""><?php echo e(__('-- Select --')); ?></option>
                                        <option <?php if(old('allow_search',@$row->candidate->allow_search) =='publish'): ?> selected <?php endif; ?> value="publish"><?php echo e(__('Publish')); ?></option>
                                        <option <?php if(old('allow_search',@$row->candidate->allow_search) =='hide'): ?> selected <?php endif; ?> value="hide"><?php echo e(__('Hide')); ?></option>
                                    </select>
                                </div>
                            <?php endif; ?>

                            <hr>
                            <div class="d-flex justify-content-between">
                                <span></span>
                                <button class="btn btn-primary" type="submit"><?php echo e(__('Save Change')); ?></button>
                            </div>
                        </div>
                    </div>
                    <div class="panel">
                        <div class="panel-title"><strong><?php echo e(__('Avatar')); ?></strong></div>
                        <div class="panel-body">
                            <div class="form-group">
                                <?php echo \Modules\Media\Helpers\FileHelper::fieldUpload('avatar_id',old('avatar_id',$row->avatar_id)); ?>

                            </div>
                        </div>
                    </div>
                    <?php if($row->hasRole('candidate') || !empty($candidate_create)): ?>
                    <div class="panel">
                        <div class="panel-title"><strong><?php echo e(__('Categories')); ?></strong></div>
                        <div class="panel-body">
                            <div class="form-group">
                                <select id="categories" class="form-control" name="categories[]" multiple="multiple">
                                    <option value=""><?php echo e(__("-- Please Select --")); ?></option>
                                    <?php
                                    foreach ($categories as $oneCategories) {
                                        $selected = '';
                                        if (!empty($row->candidate->categories)){

                                            foreach ($row->candidate->categories as $category){
                                                if($oneCategories->id == $category->id){
                                                    $selected = 'selected';
                                                }
                                            }
                                        }
                                        $trans = $oneCategories->translateOrOrigin(app()->getLocale());
                                        printf("<option value='%s' %s>%s</option>", $oneCategories->id, $selected, $oneCategories->name);
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="panel">
                        <div class="panel-title"><strong><?php echo e(__("Skills")); ?></strong></div>
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="">
                                    <select id="skills" name="skills[]" class="form-control" multiple="multiple">
                                        <option value=""><?php echo e(__("-- Please Select --")); ?></option>
                                        <?php
                                        foreach ($skills as $oneSkill) {
                                            $selected = '';
                                            if (!empty($row->candidate->skills)){
                                                foreach ($row->candidate->skills as $skill){
                                                    if($oneSkill->id == $skill->id){
                                                        $selected = 'selected';
                                                    }
                                                }
                                            }
                                            $trans = $oneSkill->translateOrOrigin(app()->getLocale());
                                            printf("<option value='%s' %s>%s</option>", $oneSkill->id, $selected, $trans->name);
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="panel">
                        <div class="panel-title"><strong><?php echo e(__('Social Media')); ?></strong></div>
                        <div class="panel-body">
                            <?php $socialMediaData = !empty($row->candidate) ? $row->candidate->social_media : []; ?>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="social-skype"><i class="fa fa-skype"></i></span>
                                </div>
                                <input type="text" class="form-control" name="social_media[skype]" value="<?php echo e(@$socialMediaData['skype']); ?>" placeholder="<?php echo e(__('Skype')); ?>" aria-label="<?php echo e(__('Skype')); ?>" aria-describedby="social-skype">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="social-facebook"><i class="fa fa-facebook"></i></span>
                                </div>
                                <input type="text" class="form-control" name="social_media[facebook]" value="<?php echo e(@$socialMediaData['facebook']); ?>" placeholder="<?php echo e(__('Facebook')); ?>" aria-label="<?php echo e(__('Facebook')); ?>" aria-describedby="social-facebook">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="social-twitter"><i class="fa fa-twitter"></i></span>
                                </div>
                                <input type="text" class="form-control" name="social_media[twitter]" value="<?php echo e(@$socialMediaData['twitter']); ?>" placeholder="<?php echo e(__('Twitter')); ?>" aria-label="<?php echo e(__('Twitter')); ?>" aria-describedby="social-twitter">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="social-instagram"><i class="fa fa-instagram"></i></span>
                                </div>
                                <input type="text" class="form-control" name="social_media[instagram]" value="<?php echo e(@$socialMediaData['instagram']); ?>" placeholder="<?php echo e(__('Instagram')); ?>" aria-label="<?php echo e(__('Instagram')); ?>" aria-describedby="social-instagram">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="social-pinterest"><i class="fa fa-pinterest"></i></span>
                                </div>
                                <input type="text" class="form-control" name="social_media[pinterest]" value="<?php echo e(@$socialMediaData['pinterest']); ?>" placeholder="<?php echo e(__('Pinterest')); ?>" aria-label="<?php echo e(__('Pinterest')); ?>" aria-describedby="social-pinterest">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="social-dribbble"><i class="fa fa-dribbble"></i></span>
                                </div>
                                <input type="text" class="form-control" name="social_media[dribbble]" value="<?php echo e(@$socialMediaData['dribbble']); ?>" placeholder="<?php echo e(__('Dribbble')); ?>" aria-label="<?php echo e(__('Dribbble')); ?>" aria-describedby="social-dribbble">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="social-google"><i class="fa fa-google"></i></span>
                                </div>
                                <input type="text" class="form-control" name="social_media[google]" value="<?php echo e(@$socialMediaData['google']); ?>" placeholder="<?php echo e(__('Google')); ?>" aria-label="<?php echo e(__('Google')); ?>" aria-describedby="social-google">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="social-google"><i class="fa fa-linkedin"></i></span>
                                </div>
                                <input type="text" class="form-control" name="social_media[linkedin]" value="<?php echo e(@$socialMediaData['linkedin']); ?>" placeholder="<?php echo e(__('Linkedin')); ?>" aria-label="<?php echo e(__('Linkedin')); ?>" aria-describedby="social-linkedin">
                            </div>
                        </div>
                    </div>

                    <div class="panel">
                        <div class="panel-title"><strong><?php echo e(__('CV Uploaded')); ?></strong></div>
                        <div class="panel-body">
                            <div class="form-group-item">
                                <div class="g-items-header">
                                    <div class="row">
                                        <div class="col-md-2"><?php echo e(__("Default")); ?></div>
                                        <div class="col-md-8"><?php echo e(__("Name")); ?></div>
                                        <div class="col-md-2"></div>
                                    </div>
                                </div>
                                <?php echo \Modules\Media\Helpers\FileHelper::fieldFileUpload('cvs', @$cvs, 'cvs'); ?>

                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <hr>
            <div class="d-flex justify-content-between">
                <span></span>
                <button class="btn btn-primary" type="submit"><?php echo e(__('Save Change')); ?></button>
            </div>
        </div>
    </form>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script.body'); ?>
    <?php echo App\Helpers\MapEngine::scripts(); ?>

    <script>
        <?php if($row->hasRole('candidate') || !empty($candidate_create)): ?>
        $(document).ready(function() {
            $('#categories').select2();
            $('#skills').select2();
            $('#languages').select2();
        });

        let mapLat = <?php echo e(!empty($row->candidate) ? ($row->candidate->map_lat ?? setting_item('default_location_lat', "51.505")) : setting_item('default_location_lat', "51.505")); ?>;
        let mapLng = <?php echo e(!empty($row->candidate) ? ($row->candidate->map_lng ?? setting_item('default_location_lng', "-0.09")) : setting_item('default_location_lng', "-0.09")); ?>;
        let mapZoom = <?php echo e(!empty($row->candidate) ? ($row->candidate->map_zoom ?? '8') : "8"); ?>;

        jQuery(function ($) {
            new BravoMapEngine('map_content', {
                disableScripts: true,
                fitBounds: true,
                center: [mapLat, mapLng],
                zoom: mapZoom,
                ready: function (engineMap) {
                    engineMap.addMarker([mapLat, mapLng], {
                        icon_options: {}
                    });
                    engineMap.on('click', function (dataLatLng) {
                        engineMap.clearMarkers();
                        engineMap.addMarker(dataLatLng, {
                            icon_options: {}
                        });
                        $("input[name=map_lat]").attr("value", dataLatLng[0]);
                        $("input[name=map_lng]").attr("value", dataLatLng[1]);
                    });
                    engineMap.on('zoom_changed', function (zoom) {
                        $("input[name=map_zoom]").attr("value", zoom);
                    });
                    engineMap.searchBox($('#customPlaceAddress'),function (dataLatLng) {
                        engineMap.clearMarkers();
                        engineMap.addMarker(dataLatLng, {
                            icon_options: {}
                        });
                        $("input[name=map_lat]").attr("value", dataLatLng[0]);
                        $("input[name=map_lng]").attr("value", dataLatLng[1]);
                    });
                    engineMap.searchBox($('.bravo_searchbox'),function (dataLatLng) {
                        engineMap.clearMarkers();
                        engineMap.addMarker(dataLatLng, {
                            icon_options: {}
                        });
                        $("input[name=map_lat]").attr("value", dataLatLng[0]);
                        $("input[name=map_lng]").attr("value", dataLatLng[1]);
                    });
                }
            });

        })
        <?php endif; ?>
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/imac/Sites/localhost/Superio.2.6.1/superio.2.6.1/modules/User/Views/admin/detail.blade.php ENDPATH**/ ?>