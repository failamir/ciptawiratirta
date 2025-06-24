    <?php
        $candidate = $row->candidate;
    ?>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label><?php echo e(__("Current position")); ?> <span class="text-danger">*</span></label>
                <input type="text" value="<?php echo e(old('title',@$candidate->title)); ?>" name="title" placeholder="<?php echo e(__("Current position")); ?>" required class="form-control">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label><?php echo e(__("Website")); ?></label>
                <input type="text" value="<?php echo e(old('website',@$candidate->website)); ?>" name="website" placeholder="<?php echo e(__("Website")); ?>" class="form-control">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="gender"><?php echo e(__("Gender")); ?></label>
                <select class="form-control" id="gender" name="gender">
                    <option value="" <?php if(old('gender',@$candidate->gender) == ''): ?> selected <?php endif; ?> ><?php echo e(__("Select")); ?></option>
                    <option value="male" <?php if(old('gender',@$candidate->gender) == 'male'): ?> selected <?php endif; ?> ><?php echo e(__("Male")); ?></option>
                    <option value="female" <?php if(old('gender',@$candidate->gender) == 'female'): ?> selected <?php endif; ?> ><?php echo e(__("Female")); ?></option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label><?php echo e(__("Expected Salary")); ?></label>
                <div class="input-group">
                    <input type="text" value="<?php echo e(old('expected_salary',@$candidate->expected_salary)); ?>" placeholder="<?php echo e(__("Expected Salary")); ?>" name="expected_salary" class="form-control">
                    <div class="input-group-append">
                        <select class="form-control" name="salary_type">
                            <option value="hourly" <?php if(old('salary_type',@$candidate->salary_type) == 'hourly'): ?> selected <?php endif; ?> > <?php echo e(currency_symbol().__("/hourly")); ?> </option>
                            <option value="daily" <?php if(old('salary_type',@$candidate->salary_type) == 'daily'): ?> selected <?php endif; ?> ><?php echo e(currency_symbol().__("/daily")); ?></option>
                            <option value="weekly" <?php if(old('salary_type',@$candidate->salary_type) == 'weekly'): ?> selected <?php endif; ?> ><?php echo e(currency_symbol().__("/weekly")); ?></option>
                            <option value="monthly" <?php if(old('salary_type',@$candidate->salary_type) == 'monthly'): ?> selected <?php endif; ?> ><?php echo e(currency_symbol().__("/monthly")); ?></option>
                            <option value="yearly" <?php if(old('salary_type',@$candidate->salary_type) == 'yearly'): ?> selected <?php endif; ?> ><?php echo e(currency_symbol().__("/yearly")); ?></option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label><?php echo e(__("Experience")); ?></label>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="<?php echo e(__("Experience")); ?>" name="experience_year" value="<?php echo e(old('experience_year',@$candidate->experience_year)); ?>">
                    <div class="input-group-append">
                        <span class="input-group-text" style="font-size: 14px;"><?php echo e(__("year(s)")); ?></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="education_level"><?php echo e(__("Education Level")); ?></label>
                <select class="form-control" id="education_level" name="education_level">
                    <option value="" <?php if(old('education_level',@$candidate->education_level) == ''): ?> selected <?php endif; ?> ><?php echo e(__("Select")); ?></option>
                    <option value="certificate" <?php if(old('education_level',@$candidate->education_level) == 'certificate'): ?> selected <?php endif; ?> ><?php echo e(__("Certificate")); ?></option>
                    <option value="diploma" <?php if(old('education_level',@$candidate->education_level) == 'diploma'): ?> selected <?php endif; ?> ><?php echo e(__("Diploma")); ?></option>
                    <option value="associate" <?php if(old('education_level',@$candidate->education_level) == 'associate'): ?> selected <?php endif; ?> ><?php echo e(__("Associate")); ?></option>
                    <option value="bachelor" <?php if(old('education_level',@$candidate->education_level) == 'bachelor'): ?> selected <?php endif; ?> ><?php echo e(__("Bachelor")); ?></option>
                    <option value="master" <?php if(old('education_level',@$candidate->education_level) == 'master'): ?> selected <?php endif; ?> ><?php echo e(__("Master")); ?></option>
                    <option value="professional" <?php if(old('education_level',@$candidate->education_level) == 'professional'): ?> selected <?php endif; ?> ><?php echo e(__("Professional")); ?></option>
                </select>
            </div>
        </div>
        <?php if(!empty($show_phone)): ?>
        <div class="col-md-6">
            <div class="form-group">
                <label><?php echo e(__("Phone")); ?></label>
                <input type="text" value="<?php echo e(old('phone',@$user->phone)); ?>" name="phone" placeholder="<?php echo e(__("Phone")); ?>" class="form-control">
            </div>
        </div>
        <?php endif; ?>
        <?php if(!empty($show_birthday)): ?>
        <div class="col-md-6">
            <div class="form-group">
                <label><?php echo e(__("Birthday")); ?></label>
                <input
                    type="text"
                    readonly
                    data-format="<?php echo e(get_moment_date_format()); ?>"
                    value="<?php echo e(old('birthday',display_date($user->birthday))); ?>"
                    name="birthday"
                    placeholder="<?php echo e(get_moment_date_format()); ?>"
                    class="form-control has-datepicker"
                >
            </div>
        </div>
        <?php endif; ?>

        <div class="col-md-6">
            <div class="form-group">
                <label><?php echo e(__("Language")); ?></label>
                <select id="languages" name="languages[]" class="form-control" multiple="multiple">
                    <option value=""><?php echo e(__("-- Please Select --")); ?></option>
                    <?php
                    foreach ($languages as $language) {
                        $selected = '';
                        if (!empty($candidate->languages)){
                            $lang = explode(",",$candidate->languages);
                            $lang = array_map('trim', $lang);
                            if(in_array($language,$lang))
                            {
                                $selected = 'selected';
                            }
                        }
                        printf("<option value='%s' %s>%s</option>", $language, $selected, $language);
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label class="control-label"><?php echo e(__("Video Url")); ?></label>
                <p><i><?php echo e(__("Insert a video, which shows anything about you")); ?></i></p>
                <input type="text" name="video" class="form-control" value="<?php echo e(old('video',@$candidate->video)); ?>" placeholder="<?php echo e(__("Youtube link video")); ?>">
            </div>
        </div>

        <?php if(is_default_lang()): ?>
            <div class="col-md-12">
                <div class="form-group">
                    <label><?php echo e(__("Video Cover Image")); ?></label>
                    <div class="form-group">
                        <?php echo \Modules\Media\Helpers\FileHelper::fieldUpload('video_cover_id',@$candidate->video_cover_id); ?>

                    </div>
                </div>
            </div>
        <?php endif; ?>

        <div class="col-md-12">
            <div class="form-group">
                <label class="control-label"><?php echo e(__("Gallery")); ?> (<?php echo e(__('Recommended size image:1080 x 1920px')); ?>)</label>
                <?php
                    $gallery_id = @$candidate->gallery ?? old('gallery');
                ?>
                <?php echo \Modules\Media\Helpers\FileHelper::fieldGalleryUpload('gallery', $gallery_id); ?>

            </div>
        </div>
    </div>



<?php /**PATH /Users/imac/Sites/localhost/Superio.2.6.1/superio.2.6.1/modules/Candidate/Views/admin/candidate/form.blade.php ENDPATH**/ ?>