<?php $__env->startSection('before-head', 'backend/lib/datatables/jquery.dataTables.css'); ?>

<?php $__env->startSection('title', 'roles'); ?>

<?php $__env->startSection('pagename', 'Roles'); ?>

<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('backend.partials._message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="card pd-20 pd-sm-40">
        <div class="row">
            <div class="col-md-12">
                <h6 class="card-body-title">Admins Roles Table
                    <a href="javascript:void(0)" class="btn btn-sm btn-primary mg-b-10 float-right" data-toggle="modal" data-target="#modaldemo2">
                        Add Role <i class="fa fa-plus mg-r-10"></i>
                    </a>
                </h6>

                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                            <tr>
                                <th class="wd-5p">Id</th>
                                <th class="wd-15p">Name</th>
                                <th class="wd-15p">Permissions</th>
                                <th class="wd-20p">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($roles->firstitem() + $key); ?></td>
                                    <td><?php echo e($role->name); ?></td>
                                    <td>
                                        <?php $__currentLoopData = $role->permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <span class="badge badge-info m-1" style="font-size: 0.75rem">
                                                <?php echo e($permission->name); ?>

                                                <a href="<?php echo e(route('role.revoke.permission', [$role->id, $permission->id])); ?>" class="badge badge-danger" title="Click to remove permission">
                                                    <i class="fa fa-times"></i>
                                                </a>
                                            </span>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </td>
                                    <td>
                                        <a href="<?php echo e(route('role.permission', $role->id)); ?>" title="Permission" class="btn btn-sm btn-info">
                                            Permission
                                        </a>

                                        <a href="javascript:void(0)" title="Delete" class="btn btn-sm btn-danger delete-category" data-toggle="modal" data-target="#modaldemo1" data-url="<?php echo e(url('admin/roles/'.$role->id)); ?>">
                                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                        <?php echo e($roles->links()); ?>

                    </div>

                </div><!-- table-wrapper -->
            </div>
            <div class="col-md-6"></div>
        </div>
    </div><!-- card -->

    
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.insert','data' => []]); ?>
<?php $component->withName('insert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
         <?php $__env->slot('title', null, []); ?> 
            Add a new Role
         <?php $__env->endSlot(); ?>

         <?php $__env->slot('form', null, []); ?> 
            <?php echo e(Form::open(['route' => 'role.store'])); ?>

         <?php $__env->endSlot(); ?>

         <?php $__env->slot('body', null, []); ?> 
            <div class="form-group">
                <?php echo e(Form::label('name', 'Name', ['class' => 'form-control-label'])); ?>

                <?php echo e(Form::text('name', null, ['class' => 'form-control','id' => 'name', 'placeholder' => 'Name'])); ?>

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


<?php echo $__env->make('backend.layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\Dhacha\resources\views/backend/admin/role.blade.php ENDPATH**/ ?>