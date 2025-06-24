    <?php
        $candidate = $row->candidate;
    ?>
    <h3 class="panel-body-title"><?php echo e(__('Education')); ?></h3>
    <div class="form-group-item">
        <div class="g-items-header">
            <div class="row">
                <div class="col-md-2"><?php echo e(__("Time")); ?></div>
                <div class="col-md-3"><?php echo e(__('School Name')); ?></div>
                <div class="col-md-3"><?php echo e(__('Reward')); ?></div>
                <div class="col-md-3"><?php echo e(__('More Information')); ?></div>
                <div class="col-md-1"></div>
            </div>
        </div>
        <div class="g-items">
            <?php $educations = @$candidate->education;?>
            <?php if(!empty($educations)): ?>
                <?php $__currentLoopData = $educations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="item" data-number="<?php echo e($key); ?>">
                        <div class="row">
                            <div class="col-md-1">
                                <input type="text" name="education[<?php echo e($key); ?>][from]" class="form-control" value="<?php echo e(@$item['from']); ?>" placeholder="<?php echo e(__('From')); ?>">
                            </div>
                            <div class="col-md-1">
                                <input type="text" name="education[<?php echo e($key); ?>][to]" class="form-control" value="<?php echo e(@$item['to']); ?>" placeholder="<?php echo e(__('To')); ?>">
                            </div>
                            <div class="col-md-3">
                                <input type="text" name="education[<?php echo e($key); ?>][location]" class="form-control" value="<?php echo e(@$item['location']); ?>">
                            </div>
                            <div class="col-md-3">
                                <input type="text" name="education[<?php echo e($key); ?>][reward]" class="form-control" value="<?php echo e(@$item['reward']); ?>">
                            </div>
                            <div class="col-md-3">
                                <textarea name="education[<?php echo e($key); ?>][information]" class="form-control" ><?php echo e(@$item['information']); ?></textarea>
                            </div>
                            <div class="col-md-1">
                                <span class="btn btn-danger btn-sm btn-remove-item"><i class="fa fa-trash"></i></span>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>
        <div class="text-right">
            <span class="btn btn-info btn-sm btn-add-item"><i class="icon ion-ios-add-circle-outline"></i> <?php echo e(__('Add item')); ?></span>
        </div>
        <div class="g-more hide">
            <div class="item" data-number="__number__">
                <div class="row">
                    <div class="col-md-1">
                        <input type="text" __name__="education[__number__][from]" class="form-control" value="" placeholder="<?php echo e(__('From')); ?>">
                    </div>
                    <div class="col-md-1">
                        <input type="text" __name__="education[__number__][to]" class="form-control" value="" placeholder="<?php echo e(__('To')); ?>">
                    </div>
                    <div class="col-md-3">
                        <input type="text" __name__="education[__number__][location]" class="form-control" value="">
                    </div>
                    <div class="col-md-3">
                        <input type="text" __name__="education[__number__][reward]" class="form-control" value="">
                    </div>
                    <div class="col-md-3">
                        <textarea __name__="education[__number__][information]" class="form-control" ></textarea>
                    </div>
                    <div class="col-md-1">
                        <span class="btn btn-danger btn-sm btn-remove-item"><i class="fa fa-trash"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <hr>
    <h3 class="panel-body-title"><?php echo e(__('Experience')); ?></h3>
    <div class="form-group-item">
        <div class="g-items-header">
            <div class="row">
                <div class="col-md-2"><?php echo e(__("Time")); ?></div>
                <div class="col-md-3"><?php echo e(__('Company')); ?></div>
                <div class="col-md-3"><?php echo e(__('Position')); ?></div>
                <div class="col-md-3"><?php echo e(__('More Information')); ?></div>
                <div class="col-md-1"></div>
            </div>
        </div>
        <div class="g-items">
            <?php $experiences = @$candidate->experience; ?>
            <?php if(!empty($experiences)): ?>
                <?php $__currentLoopData = $experiences; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="item" data-number="<?php echo e($key); ?>">
                        <div class="row">
                            <div class="col-md-1">
                                <input type="text" name="experience[<?php echo e($key); ?>][from]" class="form-control" value="<?php echo e(@$item['from']); ?>" placeholder="<?php echo e(__('From')); ?>">
                            </div>
                            <div class="col-md-1">
                                <input type="text" name="experience[<?php echo e($key); ?>][to]" class="form-control" value="<?php echo e(@$item['to']); ?>" placeholder="<?php echo e(__('To')); ?>">
                            </div>
                            <div class="col-md-3">
                                <input type="text" name="experience[<?php echo e($key); ?>][location]" class="form-control" value="<?php echo e(@$item['location']); ?>">
                            </div>
                            <div class="col-md-3">
                                <input type="text" name="experience[<?php echo e($key); ?>][position]" class="form-control" value="<?php echo e(@$item['position']); ?>">
                            </div>
                            <div class="col-md-3">
                                <textarea name="experience[<?php echo e($key); ?>][information]" class="form-control" ><?php echo e(@$item['information']); ?></textarea>
                            </div>
                            <div class="col-md-1">
                                <span class="btn btn-danger btn-sm btn-remove-item"><i class="fa fa-trash"></i></span>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>
        <div class="text-right">
            <span class="btn btn-info btn-sm btn-add-item"><i class="icon ion-ios-add-circle-outline"></i> <?php echo e(__('Add item')); ?></span>
        </div>
        <div class="g-more hide">
            <div class="item" data-number="__number__">
                <div class="row">
                    <div class="col-md-1">
                        <input type="text" __name__="experience[__number__][from]" class="form-control" value="" placeholder="<?php echo e(__('From')); ?>">
                    </div>
                    <div class="col-md-1">
                        <input type="text" __name__="experience[__number__][to]" class="form-control" value="" placeholder="<?php echo e(__('To')); ?>">
                    </div>
                    <div class="col-md-3">
                        <input type="text" __name__="experience[__number__][location]" class="form-control" value="">
                    </div>
                    <div class="col-md-3">
                        <input type="text" __name__="experience[__number__][position]" class="form-control" value="">
                    </div>
                    <div class="col-md-3">
                        <textarea __name__="experience[__number__][information]" class="form-control" value=""></textarea>
                    </div>
                    <div class="col-md-1">
                        <span class="btn btn-danger btn-sm btn-remove-item"><i class="fa fa-trash"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <hr>
    <h3 class="panel-body-title"><?php echo e(__('Award')); ?></h3>
    <div class="form-group-item">
        <div class="g-items-header">
            <div class="row">
                <div class="col-md-2"><?php echo e(__("Time")); ?></div>
                <div class="col-md-3"><?php echo e(__('Name')); ?></div>
                <div class="col-md-3"><?php echo e(__('Reward')); ?></div>
                <div class="col-md-3"><?php echo e(__('More Information')); ?></div>
                <div class="col-md-1"></div>
            </div>
        </div>
        <div class="g-items">
            <?php $educations = @$candidate->award; ?>
            <?php if(!empty($educations)): ?>
                <?php $__currentLoopData = $educations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="item" data-number="<?php echo e($key); ?>">
                        <div class="row">
                            <div class="col-md-1">
                                <input type="text" name="award[<?php echo e($key); ?>][from]" class="form-control" value="<?php echo e(@$item['from']); ?>" placeholder="<?php echo e(__('From')); ?>">
                            </div>
                            <div class="col-md-1">
                                <input type="text" name="award[<?php echo e($key); ?>][to]" class="form-control" value="<?php echo e(@$item['to']); ?>" placeholder="<?php echo e(__('To')); ?>">
                            </div>
                            <div class="col-md-3">
                                <input type="text" name="award[<?php echo e($key); ?>][location]" class="form-control" value="<?php echo e(@$item['location']); ?>">
                            </div>
                            <div class="col-md-3">
                                <input type="text" name="award[<?php echo e($key); ?>][reward]" class="form-control" value="<?php echo e(@$item['reward']); ?>">
                            </div>
                            <div class="col-md-3">
                                <textarea name="award[<?php echo e($key); ?>][information]" class="form-control" ><?php echo e(@$item['information']); ?></textarea>
                            </div>
                            <div class="col-md-1">
                                <span class="btn btn-danger btn-sm btn-remove-item"><i class="fa fa-trash"></i></span>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>
        <div class="text-right">
            <span class="btn btn-info btn-sm btn-add-item"><i class="icon ion-ios-add-circle-outline"></i> <?php echo e(__('Add item')); ?></span>
        </div>
        <div class="g-more hide">
            <div class="item" data-number="__number__">
                <div class="row">
                    <div class="col-md-1">
                        <input type="text" __name__="award[__number__][from]" class="form-control" value="" placeholder="<?php echo e(__('From')); ?>">
                    </div>
                    <div class="col-md-1">
                        <input type="text" __name__="award[__number__][to]" class="form-control" value="" placeholder="<?php echo e(__('To')); ?>">
                    </div>
                    <div class="col-md-3">
                        <input type="text" __name__="award[__number__][location]" class="form-control" value="">
                    </div>
                    <div class="col-md-3">
                        <input type="text" __name__="award[__number__][reward]" class="form-control" value="">
                    </div>
                    <div class="col-md-3">
                        <textarea __name__="award[__number__][information]" class="form-control" ></textarea>
                    </div>
                    <div class="col-md-1">
                        <span class="btn btn-danger btn-sm btn-remove-item"><i class="fa fa-trash"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>



<?php /**PATH /Users/imac/Sites/localhost/Superio.2.6.1/superio.2.6.1/modules/Candidate/Views/admin/candidate/sub_information.blade.php ENDPATH**/ ?>