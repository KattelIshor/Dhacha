<?php $__env->startSection('before-head', 'backend/lib/datatables/jquery.dataTables.css'); ?>

<?php $__env->startSection('title', 'site-setting'); ?>

<?php $__env->startSection('pagename', 'Site Setting'); ?>

<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('backend.partials._message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Site Setting</h6>
        <div class="card-body bg-gray-200">
            <?php echo e(Form::open(['route' => ['site-settings.update', $siteSetting->id], 'method' => 'PUT'])); ?>

                <div class="row mg-b-25">
                    <div class="col-md-6">
                        <div class="form-group">
                            <?php echo e(Form::label('company_name', 'Company Name',['class' => 'form-control-label'])); ?>

                            <?php echo e(Form::text('company_name', $siteSetting->company_name, ['class' => 'form-control mb-2'])); ?>

                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <?php echo e(Form::label('email', 'E-mail',['class' => 'form-control-label'])); ?>

                            <?php echo e(Form::text('email', $siteSetting->email, ['class' => 'form-control mb-2'])); ?>

                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <?php echo e(Form::label('phone', 'Phone Number',['class' => 'form-control-label'])); ?>

                            <?php echo e(Form::text('phone', $siteSetting->phone, ['class' => 'form-control mb-2'])); ?>

                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <?php echo e(Form::label('company_address', 'Company Address',['class' => 'form-control-label'])); ?>

                            <?php echo e(Form::text('company_address', $siteSetting->company_address, ['class' => 'form-control mb-2'])); ?>

                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <?php echo e(Form::label('facebook', 'Facebook Link',['class' => 'form-control-label'])); ?>

                            <?php echo e(Form::text('facebook', $siteSetting->facebook, ['class' => 'form-control mb-2'])); ?>

                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <?php echo e(Form::label('tiktok', 'Tiktok Link',['class' => 'form-control-label'])); ?>

                            <?php echo e(Form::text('tiktok', $siteSetting->youtube, ['class' => 'form-control mb-2'])); ?>

                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <?php echo e(Form::label('instagram', 'Instagram Link',['class' => 'form-control-label'])); ?>

                            <?php echo e(Form::text('instagram', $siteSetting->instagram, ['class' => 'form-control mb-2'])); ?>

                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <?php echo e(Form::label('whatsapp', 'WhatsappLink',['class' => 'form-control-label'])); ?>

                            <?php echo e(Form::text('Whatsapp', $siteSetting->pinterest, ['class' => 'form-control mb-2'])); ?>

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

<?php echo $__env->make('backend.layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\Dhacha\resources\views/backend/settings/site.blade.php ENDPATH**/ ?>