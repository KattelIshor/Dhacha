<?php $__env->startSection('before-head', 'backend/lib/datatables/jquery.dataTables.css'); ?>

<?php $__env->startSection('title', 'setting'); ?>

<?php $__env->startSection('pagename', 'Setting'); ?>

<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('backend.partials._message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Setting</h6>
        <div class="card-body bg-gray-200">
            <?php echo e(Form::open(['route' => ['settings.update', $setting->id], 'method' => 'PUT'])); ?>

                <div class="row mg-b-25">
                    <div class="col-md-6">
                        <div class="form-group">
                            <?php echo e(Form::label('vat', 'Vat',['class' => 'form-control-label'])); ?>

                            <?php echo e(Form::text('vat', $setting->vat, ['class' => 'form-control mb-2'])); ?>

                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <?php echo e(Form::label('shipping_charge', 'Shipping Charge',['class' => 'form-control-label'])); ?>

                            <?php echo e(Form::text('shipping_charge', $setting->shipping_charge, ['class' => 'form-control mb-2'])); ?>

                        </div>
                    </div>
                </div>

                <div class="form-layout-footer">
                    <button type="submit" class="btn btn-info mg-r-5">Update</button>
                </div>
            <?php echo e(Form::close()); ?>

        </div><!-- card -->

    </div><!-- card -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\Dhacha\resources\views/backend/settings/setting.blade.php ENDPATH**/ ?>