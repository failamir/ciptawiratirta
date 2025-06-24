<?php if(is_candidate() && !empty($candidate)): ?>
    <div class="modal fade" id="apply-job">
        <!-- Apply Job modal -->
        <div class="modal-dialog  modal-dialog-centered">
            <div class="modal-content">
                <a href="#" rel="modal:close" class="close-modal " data-dismiss="modal" aria-label="Close"><?php echo e(__("Close")); ?></a>
                <div id="apply-job-modal">
                    <!-- Apply Job Form -->
                    <div class="apply-job-form default-form">
                        <div class="form-inner">
                            <h3 class="form-title text-center"><?php echo e(__("Apply for this job")); ?></h3>

                            <form id="job-apply-form" class="job-apply-form" method="post" action="" enctype="multipart/form-data" data-applied-text="<?php echo e(__("Applies")); ?>">
                                <?php echo csrf_field(); ?>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="select-cv"><?php echo e(__("Select a your CV")); ?></div>
                                        <?php if($candidate->cvs): ?>
                                            <div class="wrapper-file-action">
                                                <?php $__currentLoopData = $candidate->cvs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php
                                                        $file = (new \Modules\Media\Models\MediaFile())->findById($cv->file_id);
                                                    ?>
                                                    <?php if($file): ?>
                                                        <label for="apply-cv-<?php echo e($cv->id); ?>" class="item-file-cv">
                                                            <input id="apply-cv-<?php echo e($cv->id); ?>" type="radio" name="apply_cv_id" value="<?php echo e($cv->id); ?>">
                                                            <div class="candidate-detail-cv">
                                                                <span class="icon_type">
                                                                    <i class="flaticon-file"></i>
                                                                </span>
                                                                <span class="filename"><?php echo e($file->file_name); ?></span>
                                                                <span class="extension"><?php echo e($file->file_extension); ?></span>
                                                            </div>
                                                        </label>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div><!-- /.form-group -->
                                        <?php else: ?>
                                            <p class="text-center text-warning mb-4"><?php echo e(__("Please upload your cv before applying for a job")); ?></p>
                                        <?php endif; ?>
                                        <div class="select-cv"><?php echo e(__("or upload your CV")); ?></div>


                                        <div class="bc-drag-area">
                                            <button type="button" data-text="<?php echo e(__("Upload CV (doc, docx, pdf)")); ?>"><?php echo e(__("Upload CV (doc, docx, pdf)")); ?></button>
                                            <input type="file" name="file_cv" accept=".doc,.docx,.pdf" hidden>
                                            <span class="remove-file">x</span>
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="form-group mb-3">
                                            <textarea class="form-control" name="message" placeholder="Message" required="required"></textarea>
                                        </div>
                                    </div><!-- /.form-group -->

                                    <div class="col-sm-12">
                                        <div class="form-group mb-4">
                                            <div class="">
                                                <input type="checkbox" name="terms_and_conditions" value="on" id="register-terms-and-conditions" required="">
                                                <label for="register-terms-and-conditions">
                                                    <?php echo __("You accept our :opentag Terms and Conditions and Privacy Policy :closetag", ['opentag' => '<a href="'.get_page_url(setting_item('terms_and_conditions_id')).'" target="_blank">','closetag'=>'</a>']); ?>

                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <input type="hidden" name="job_id" value="<?php echo e($row->id); ?>">
                                <input type="hidden" name="company_id" value="<?php echo e($row->company->id ?? ''); ?>">
                                <div class="text-center">
                                    <button class="theme-btn btn-style-one" type="submit"><?php echo e(__("Apply Job")); ?>

                                        <span class="spinner-grow spinner-grow-sm icon-loading" role="status" aria-hidden="true"></span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH /Users/imac/Sites/localhost/Superio.2.6.1/superio.2.6.1/themes/Superio/Job/Views/frontend/layouts/details/apply-job-popup.blade.php ENDPATH**/ ?>