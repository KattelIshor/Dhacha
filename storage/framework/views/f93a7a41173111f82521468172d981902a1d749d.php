<?php $__env->startSection('before-head', 'backend/lib/datatables/jquery.dataTables.css'); ?>

<?php $__env->startSection('title', 'admins'); ?>

<?php $__env->startSection('pagename', 'Admins'); ?>

<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('backend.partials._message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Admins Table
            <a href="javascript:void(0)" class="btn btn-sm btn-primary mg-b-10 float-right" data-toggle="modal" data-target="#modaldemo2">
                 Add New <i class="fa fa-plus mg-r-10"></i>
            </a>
        </h6>

        <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
                <thead>
                    <tr>
                        <th class="wd-5p">Id</th>
                        <th class="wd-15p">Name</th>
                        <th class="wd-15p">E-mail</th>
                        <th class="wd-15p">Role</th>
                        <th class="wd-20p">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $admins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $admin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($admins->firstitem() + $key); ?></td>
                            <td><?php echo e($admin->name); ?></td>
                            <td><?php echo e($admin->email); ?></td>
                            <td>
                                <?php $__currentLoopData = $admin->roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <span class="badge badge-info m-1" style="font-size: 0.75rem">
                                        <?php echo e($role->name); ?>

                                        <a href="<?php echo e(route('remove.role', [$role->id,$admin->id])); ?>" class="badge badge-danger" title="Click to remove role">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    </span>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </td>
                            <td>
                                <a href="#" class="btn btn-sm btn-info">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </a>
                                <a href="<?php echo e(route('admins.edit', $admin->id)); ?>" class="btn btn-sm btn-warning">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                </a>
                                <a href="javascript:void(0)" title="Delete" class="btn btn-sm btn-danger delete-category" data-toggle="modal" data-target="#modaldemo1" data-url="<?php echo e(url('admin/admins/'.$admin->id)); ?>">
                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                <?php echo e($admins->links()); ?>

            </div>

        </div><!-- table-wrapper -->
    </div><!-- card -->

    
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.insert','data' => []]); ?>
<?php $component->withName('insert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
         <?php $__env->slot('title', null, []); ?> 
            Add a new Admin
         <?php $__env->endSlot(); ?>

         <?php $__env->slot('form', null, []); ?> 
            <?php echo e(Form::open(['route' => 'admins.store'])); ?>

         <?php $__env->endSlot(); ?>

         <?php $__env->slot('body', null, []); ?> 
            <div class="form-group">
                <?php echo e(Form::label('name', 'Name', ['class' => 'form-control-label'])); ?>

                <?php echo e(Form::text('name', null, ['class' => 'form-control','id' => 'name', 'placeholder' => 'Name'])); ?>

            </div>

            <div class="form-group">
                <?php echo e(Form::label('email', 'E-mail', ['class' => 'form-control-label'])); ?>

                <?php echo e(Form::email('email', null, ['class' => 'form-control','id' => 'email', 'placeholder' => 'Enter mail'])); ?>

            </div>

            <div class="form-group">
                <?php echo e(Form::label('password', 'Password', ['class' => 'form-control-label'])); ?>

                <?php echo e(Form::password('password', ['class' => 'form-control','id' => 'password', 'placeholder' => 'Password'])); ?>

            </div>

            <div class="form-group">
                <?php echo e(Form::label('password_confirmation', 'Confirm Password', ['class' => 'form-control-label'])); ?>

                <?php echo e(Form::password('password_confirmation', ['class' => 'form-control','id' => 'password_confirmation', 'placeholder' => 'Confirm Password'])); ?>

            </div>
         <?php $__env->endSlot(); ?>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
    

    <!-- Delete Modal -->
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.delete','data' => []]); ?>
<?php $component->withName('delete'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
         <?php $__env->slot('form', null, []); ?> 
            <?php echo e(Form::open(['method' => 'DELETE', 'id' => 'deleteForm'])); ?>

         <?php $__env->endSlot(); ?>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
    <!--End Delete Modal -->

    
    <script src="<?php echo e(mix('js/dashboard.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\halumshop-master\resources\views/backend/admin/index.blade.php ENDPATH**/ ?>