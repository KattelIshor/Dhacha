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
                    <?php echo e(Form::open(['route' => ['admins.update', $admin->id], 'method' => 'PUT'])); ?>

                        <div class="form-group">
                            <?php echo e(Form::label('name', 'Name', ['class' => 'form-control-label'])); ?>

                            <?php echo e(Form::text('name', $admin->name, ['class' => 'form-control','id' => 'name', 'placeholder' => 'Name'])); ?>

                        </div>

                        <div class="form-group">
                            <?php echo e(Form::label('email', 'E-mail', ['class' => 'form-control-label'])); ?>

                            <?php echo e(Form::email('email', $admin->email, ['class' => 'form-control','id' => 'email', 'placeholder' => 'Enter mail'])); ?>

                        </div>

                        <div class="form-group">
                            <?php echo e(Form::label('role_name', 'Select Role', ['class' => 'form-control-label'])); ?>

                            <select name="role_name" id="role_name" class="form-control select2">
                                <option value="">-- Select Role --</option>
                                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($role->name); ?>"><?php echo e($role->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <?php echo e(Form::label('password', 'Password', ['class' => 'form-control-label'])); ?>

                            <?php echo e(Form::password('password', ['class' => 'form-control','id' => 'password', 'placeholder' => 'Password'])); ?>

                        </div>

                        <div class="form-group">
                            <?php echo e(Form::label('password_confirmation', 'Confirm Password', ['class' => 'form-control-label'])); ?>

                            <?php echo e(Form::password('password_confirmation', ['class' => 'form-control','id' => 'password_confirmation', 'placeholder' => 'Confirm Password'])); ?>

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

<?php echo $__env->make('backend.layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\halumshop-master\resources\views/backend/admin/edit.blade.php ENDPATH**/ ?>