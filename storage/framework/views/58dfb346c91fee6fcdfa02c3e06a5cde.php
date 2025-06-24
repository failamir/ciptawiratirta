
<?php $__env->startSection('head'); ?>
    <style>
        #permanentlyDeleteAccount .close-modal {
            top: 35px;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="bravo_user_profile p-0">
        <div class="d-flex justify-content-between mb20">
            <div class="upper-title-box">
                <h3 class="title"><?php echo e(__("My Profile")); ?></h3>
                <div class="text"><?php echo e(__("Ready to jump back in?")); ?></div>
            </div>
            <div class="title-actions">
                <a href="<?php echo e(route('user.upgrade_company')); ?>" class="btn btn-warning text-light"><?php echo e(__("Become a Company")); ?></a>
                <?php if($url = $row->getDetailUrl()): ?>
                    <a href="<?php echo e($url); ?>" class="btn btn-info text-light ml-3">
                        <i class="la la-eye"></i> <?php echo e(__("View profile")); ?></a>
                <?php endif; ?>
            </div>
        </div>
        <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <form action="<?php echo e(route('user.candidate.store')); ?>" method="post" class="default-form">
            <?php echo csrf_field(); ?>
            <div class="row">
                <div class="col-lg-9">
                    <div class="ls-widget mb-4">
                        <div class="tabs-box">
                            <div class="widget-title"><h4><?php echo e(__("Candidate Info")); ?></h4></div>
                            <div class="widget-content">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label><?php echo e(__("First name")); ?>

                                                    <span class="text-danger">*</span>
                                                </label>
                                                <input
                                                    type="text"
                                                    value="<?php echo e(old('first_name',$user->first_name)); ?>"
                                                    name="first_name"
                                                    placeholder="<?php echo e(__("First name")); ?>"
                                                    class="form-control"
                                                >
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label><?php echo e(__("Last name")); ?>

                                                    <span class="text-danger">*</span>
                                                </label>
                                                <input
                                                    type="text"
                                                    required
                                                    value="<?php echo e(old('last_name',$user->last_name)); ?>"
                                                    name="last_name"
                                                    placeholder="<?php echo e(__("Last name")); ?>"
                                                    class="form-control"
                                                >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <?php echo $__env->make('Candidate::admin.candidate.form',['row'=>$user,'show_phone'=>true,'show_birthday'=>true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        </div>
                    </div>
                    <div class="ls-widget mb-4">
                        <div class="tabs-box">
                            <div class="widget-title"><h4><?php echo e(__("About")); ?></h4></div>
                            <div class="widget-content">
                                <textarea name="bio" rows="5" class="form-control"><?php echo e(strip_tags(old('bio',$user->bio))); ?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="ls-widget mb-4">
                        <div class="tabs-box">
                            <div class="widget-title"><h4><?php echo e(__("Location Info")); ?></h4></div>
                            <div class="widget-content">
                                <?php echo $__env->make('Candidate::admin.candidate.location',['row'=>$user], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        </div>
                    </div>
                    <div class="ls-widget mb-4 card-sub_information">
                        <div class="tabs-box">
                            <div class="widget-title"><h4><?php echo e(__("Education - Experience - Award")); ?></h4></div>
                            <div class="widget-content">
                                <?php echo $__env->make('Candidate::admin.candidate.sub_information',['row'=>$user], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        </div>
                    </div>
                    <?php echo $__env->make('Core::frontend.seo-meta.seo-meta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <div class="mb-4 d-none d-md-block">
                        <button class="theme-btn btn-style-one" type="submit">
                            <i class="fa fa-save" style="padding-right: 5px"></i> <?php echo e(__('Save Changes')); ?></button>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="ls-widget mb-4 ">
                        <div class="tabs-box">
                            <div class="widget-title"><h4><?php echo e(__('Visibility')); ?></h4></div>
                            <div class="widget-content">
                                <div class="form-group">
                                    <select required class="custom-select" name="allow_search">
                                        <option
                                            <?php if(old('allow_search',@$row->allow_search) =='hide'): ?> selected
                                            <?php endif; ?> value="hide"
                                        ><?php echo e(__('Hide')); ?></option>
                                        <option
                                            <?php if(old('allow_search',@$row->allow_search) =='publish'): ?> selected
                                            <?php endif; ?> value="publish"
                                        ><?php echo e(__('Publish')); ?></option>
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <button class="theme-btn btn-style-one" type="submit">
                                        <i class="fa fa-save" style="padding-right: 5px"></i> <?php echo e(__('Save Changes')); ?></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ls-widget mb-4 ">
                        <div class="tabs-box">
                            <div class="widget-title"><h4><?php echo e(__('Avatar')); ?></h4></div>
                            <div class="widget-content">
                                <div class="form-group">
                                    <?php echo \Modules\Media\Helpers\FileHelper::fieldUpload('avatar_id',old('avatar_id',$user->avatar_id)); ?>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ls-widget mb-4">
                        <div class="tabs-box">
                            <div class="widget-title"><h4><?php echo e(__('Categories')); ?></h4></div>
                            <div class="widget-content">
                                <div class="form-group">
                                    <select id="categories" class="form-control" name="categories[]" multiple="multiple">
                                        <option value=""><?php echo e(__("-- Please Select --")); ?></option>
                                        <?php
                                        foreach ($categories as $oneCategories) {
                                            $selected = '';
                                            if (!empty($row->categories)) {

                                                foreach ($row->categories as $category) {
                                                    if ($oneCategories->id == $category->id) {
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
                    </div>
                    <div class="ls-widget mb-4">
                        <div class="tabs-box">
                            <div class="widget-title"><h4><?php echo e(__("Skills")); ?></h4></div>
                            <div class="widget-content">
                                <div class="form-group">
                                    <div class="">
                                        <select id="skills" name="skills[]" class="form-control" multiple="multiple">
                                            <option value=""><?php echo e(__("-- Please Select --")); ?></option>
                                            <?php
                                            foreach ($skills as $oneSkill) {
                                                $selected = '';
                                                if (!empty($row->skills)) {
                                                    foreach ($row->skills as $skill) {
                                                        if ($oneSkill->id == $skill->id) {
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
                    </div>
                    <div class="ls-widget mb-4 card-social">
                        <div class="tabs-box">
                            <div class="widget-title"><h4><?php echo e(__('Social Media')); ?></h4></div>
                            <div class="widget-content">
                                <?php $socialMediaData = !empty($row) ? $row->social_media : []; ?>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="social-skype">
                                            <i class="fab fa-skype"></i>
                                        </span>
                                    </div>
                                    <input
                                        type="text"
                                        class="form-control"
                                        name="social_media[skype]"
                                        value="<?php echo e(@$socialMediaData['skype']); ?>"
                                        placeholder="<?php echo e(__('Skype')); ?>"
                                        aria-label="<?php echo e(__('Skype')); ?>"
                                        aria-describedby="social-skype"
                                    >
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="social-facebook">
                                            <i class="fab fa-facebook"></i>
                                        </span>
                                    </div>
                                    <input
                                        type="text"
                                        class="form-control"
                                        name="social_media[facebook]"
                                        value="<?php echo e(@$socialMediaData['facebook']); ?>"
                                        placeholder="<?php echo e(__('Facebook')); ?>"
                                        aria-label="<?php echo e(__('Facebook')); ?>"
                                        aria-describedby="social-facebook"
                                    >
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="social-twitter">
                                            <i class="fab fa-twitter"></i>
                                        </span>
                                    </div>
                                    <input
                                        type="text"
                                        class="form-control"
                                        name="social_media[twitter]"
                                        value="<?php echo e(@$socialMediaData['twitter']); ?>"
                                        placeholder="<?php echo e(__('Twitter')); ?>"
                                        aria-label="<?php echo e(__('Twitter')); ?>"
                                        aria-describedby="social-twitter"
                                    >
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="social-instagram">
                                            <i class="fab fa-instagram"></i>
                                        </span>
                                    </div>
                                    <input
                                        type="text"
                                        class="form-control"
                                        name="social_media[instagram]"
                                        value="<?php echo e(@$socialMediaData['instagram']); ?>"
                                        placeholder="<?php echo e(__('Instagram')); ?>"
                                        aria-label="<?php echo e(__('Instagram')); ?>"
                                        aria-describedby="social-instagram"
                                    >
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="social-pinterest">
                                            <i class="fab fa-pinterest"></i>
                                        </span>
                                    </div>
                                    <input
                                        type="text"
                                        class="form-control"
                                        name="social_media[pinterest]"
                                        value="<?php echo e(@$socialMediaData['pinterest']); ?>"
                                        placeholder="<?php echo e(__('Pinterest')); ?>"
                                        aria-label="<?php echo e(__('Pinterest')); ?>"
                                        aria-describedby="social-pinterest"
                                    >
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="social-dribbble">
                                            <i class="fab fa-dribbble"></i>
                                        </span>
                                    </div>
                                    <input
                                        type="text"
                                        class="form-control"
                                        name="social_media[dribbble]"
                                        value="<?php echo e(@$socialMediaData['dribbble']); ?>"
                                        placeholder="<?php echo e(__('Dribbble')); ?>"
                                        aria-label="<?php echo e(__('Dribbble')); ?>"
                                        aria-describedby="social-dribbble"
                                    >
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="social-google">
                                            <i class="fab fa-google"></i>
                                        </span>
                                    </div>
                                    <input
                                        type="text"
                                        class="form-control"
                                        name="social_media[google]"
                                        value="<?php echo e(@$socialMediaData['google']); ?>"
                                        placeholder="<?php echo e(__('Google')); ?>"
                                        aria-label="<?php echo e(__('Google')); ?>"
                                        aria-describedby="social-google"
                                    >
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="social-google">
                                            <i class="fab fa-linkedin"></i>
                                        </span>
                                    </div>
                                    <input
                                        type="text"
                                        class="form-control"
                                        name="social_media[linkedin]"
                                        value="<?php echo e(@$socialMediaData['linkedin']); ?>"
                                        placeholder="<?php echo e(__('Linkedin')); ?>"
                                        aria-label="<?php echo e(__('Linkedin')); ?>"
                                        aria-describedby="social-linkedin"
                                    >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <hr>
    </div>
    <?php if(!empty(setting_item('user_enable_permanently_delete')) and !is_admin()): ?>
        <div class="row">
            <div class="col-lg-9">
                <div class="ls-widget">
                    <div class="widget-title">
                        <h4 class="text-danger">
                            <?php echo e(__("Delete account")); ?>

                        </h4>
                    </div>
                    <div class="widget-content">
                        <div class="mb-4 mt-2">
                            <?php echo clean(setting_item_with_lang('user_permanently_delete_content','',__('Your account will be permanently deleted. Once you delete your account, there is no going back. Please be certain.'))); ?>

                        </div>
                        <a rel="modal:open" class="btn btn-danger" href="#permanentlyDeleteAccount"><?php echo e(__('Delete your account')); ?></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal bravo-form" id="permanentlyDeleteAccount">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><?php echo e(__('Confirm permanently delete account')); ?></h5>
                    </div>
                    <div class="modal-body ">
                        <div class="my-3">
                            <?php echo clean(setting_item_with_lang('user_permanently_delete_content_confirm')); ?>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="#close-modal" rel="modal:close" class="btn btn-secondary"><?php echo e(__('Close')); ?></a>
                        <a href="<?php echo e(route('user.permanently.delete')); ?>" class="btn btn-danger"><?php echo e(__('Confirm')); ?></a>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
    <?php echo App\Helpers\MapEngine::scripts(); ?>

    <script type="text/javascript" src="<?php echo e(asset('libs/daterange/moment.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('libs/daterange/daterangepicker.min.js')); ?>"></script>
    <script src="<?php echo e(asset('libs/select2/js/select2.min.js')); ?>"></script>
    <script>
        <?php if(is_candidate() || !empty($candidate_create)): ?>
        $(document).ready(function() {
            $('#categories').select2();
            $('#skills').select2();
            $('#languages').select2();
        });

        let mapLat = <?php echo e($row->map_lat ?? setting_item('default_location_lat', "51.505")); ?>;
        let mapLng = <?php echo e($row->map_lng ?? setting_item('default_location_lng', "-0.09")); ?>;
        let mapZoom = <?php echo e($row->map_zoom ?? "8"); ?>;

        jQuery(function($) {
            new BravoMapEngine('map_content', {
                disableScripts: true,
                fitBounds: true,
                center: [mapLat, mapLng],
                zoom: mapZoom,
                ready: function(engineMap) {
                    engineMap.addMarker([mapLat, mapLng], {
                        icon_options: {},
                    });
                    engineMap.on('click', function(dataLatLng) {
                        engineMap.clearMarkers();
                        engineMap.addMarker(dataLatLng, {
                            icon_options: {},
                        });
                        $('input[name=map_lat]').attr('value', dataLatLng[0]);
                        $('input[name=map_lng]').attr('value', dataLatLng[1]);
                    });
                    engineMap.on('zoom_changed', function(zoom) {
                        $('input[name=map_zoom]').attr('value', zoom);
                    });
                    engineMap.searchBox($('#customPlaceAddress'), function(dataLatLng) {
                        engineMap.clearMarkers();
                        engineMap.addMarker(dataLatLng, {
                            icon_options: {},
                        });
                        $('input[name=map_lat]').attr('value', dataLatLng[0]);
                        $('input[name=map_lng]').attr('value', dataLatLng[1]);
                    });
                    engineMap.searchBox($('.bravo_searchbox'), function(dataLatLng) {
                        engineMap.clearMarkers();
                        engineMap.addMarker(dataLatLng, {
                            icon_options: {},
                        });
                        $('input[name=map_lat]').attr('value', dataLatLng[0]);
                        $('input[name=map_lng]').attr('value', dataLatLng[1]);
                    });
                },
            });

        });
        <?php endif; ?>
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/imac/Sites/localhost/Superio.2.6.1/superio.2.6.1/themes/Superio/Candidate/Views/frontend/profile/edit.blade.php ENDPATH**/ ?>