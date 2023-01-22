<?php $__env->startSection('title', 'Profile'); ?>

<?php $__env->startSection('pagename', 'Profile'); ?>

<?php $__env->startSection('content'); ?>

    <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Update Profile</h6>
        <p class="mg-b-20 mg-sm-b-30">Admin roles permission and update informations.</p>

        <?php echo $__env->make('backend.partials._message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="row mg-b-20">
            <div class="col-md-6">
                <div class="card card-body bg-gray-200">
                    <?php echo e(Form::open(['route' => 'role.givepermissionto'])); ?>

                        <div class="form-group">
                            <?php echo e(Form::label('name', 'Role', ['class' => 'form-control-label'])); ?>

                            <h2><?php echo e($role->name); ?></h2>
                            <input type="hidden" name="role_name" value="<?php echo e($role->name); ?>">
                        </div>

                        <div class="form-group">
                            <?php echo e(Form::label('permission_name', 'Select Role', ['class' => 'form-control-label'])); ?>

                            <select name="permission_name" id="permission_name" class="form-control select2">
                                <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($permission->name); ?>"><?php echo e($permission->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <div class="form-layout-footer">
                            <button type="submit" class="btn btn-info mg-r-5">Update</button>
                        </div>
                    <?php echo e(Form::close()); ?>

                </div><!-- card -->
            </div><!-- col -->
        </div><!-- row -->
    </div><!-- card -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\Dhacha\resources\views/backend/admin/roletopermission.blade.php ENDPATH**/ ?>