

<?php $__env->startSection('content'); ?>
    <div class="upper-title-box">
        <h3><?php echo e(__("CV Manager")); ?></h3>
        <div class="text"><?php echo e(__("Ready to jump back in?")); ?></div>
    </div>
    <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row">
        <div class="col-lg-12">
            <!-- Ls widget -->
            <div class="cv-manager-widget ls-widget">
                <div class="tabs-box">

                    <div class="widget-title"><h4><?php echo e(__("Cv Manager")); ?></h4></div>

                    <div class="widget-content">
                        <div class="uploading-resume mb-3">
                            <div class="uploadButton cv-drag-area">
                                <input class="uploadButton-input" type="file"  name="attachments[]" accept=".doc,.docx,.pdf" id="upload"/>
                                <label class="cv-uploadButton" for="upload">
                                    <span class="title"><?php echo e(__("Drop files here to upload")); ?></span>
                                    <span class="text"><?php echo e(__("To upload file size is (Max 5Mb) and allowed file types are (.doc, .docx, .pdf)")); ?></span>
                                    <button class="theme-btn btn-style-one"><?php echo e(__("Upload CV")); ?></button>
                                </label>
                                <img class="loading-icon" src="<?php echo e(asset('images/loading.gif')); ?>" alt="loading">

                            </div>
                        </div>

                        <div class="files-outer">
                            <?php if($rows->count() > 0): ?>
                                <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div data-id="<?php echo e($row->id); ?>" class="file-edit-box <?php echo e($row->is_default == 1 ? 'is-default' : ''); ?>">
                                        <span class="title"><?php echo e($row->media->file_name); ?>.<?php echo e($row->media->file_extension); ?></span>
                                        <input type="radio" <?php echo e($row->is_default == 1 ? 'checked' : ''); ?> class="form-control" name="csv_default" value="<?php echo e($row->id); ?>">
                                        <div class="edit-btns">
                                            <button class="delete-cv"><span class="la la-trash"></span></button>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/imac/Sites/localhost/Superio.2.6.1/superio.2.6.1/themes/Superio/Candidate/Views/frontend/layouts/user/cv-manager.blade.php ENDPATH**/ ?>