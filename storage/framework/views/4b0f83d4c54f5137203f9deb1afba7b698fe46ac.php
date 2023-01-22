<?php $__env->startSection('before-head', 'backend/lib/datatables/jquery.dataTables.css'); ?>

<?php $__env->startSection('title', 'product'); ?>

<?php $__env->startSection('pagename', 'Product'); ?>

<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('backend.partials._message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Product Table
            <a href="<?php echo e(route('products.create')); ?>" class="btn btn-sm btn-primary mg-b-10 float-right">
                 Add New <i class="fa fa-plus mg-r-10"></i>
            </a>
        </h6>

        <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
                <thead>
                    <tr>
                        <th class="wd-5p">Product Code</th>
                        <th class="wd-15p">Title</th>
                        <th class="wd-15p">Image</th>
                        <th class="wd-15p">Category</th>
                        <th class="wd-15p">Quantity</th>
                        <th class="wd-15p">Status</th>
                        <th class="wd-20p">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($product->product_code); ?></td>
                            <td><?php echo e($product->product_title); ?></td>
                            <td><img src="<?php echo e(asset($product->image_one)); ?>" alt="Category Name" width="80px" height="50px"></td>
                            <td><?php echo e($product->category->name); ?></td>
                            <td><?php echo e($product->product_quantity); ?></td>
                            <td>
                                <?php if($product->status == 1): ?>
                                    <span class="badge badge-success">Active</span>
                                <?php else: ?>
                                    <span class="badge badge-danger">Inactive</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if($product->status == 1): ?>
                                    <?php echo e(Form::open(['route' => ['inactive.store', $product->id], 'class' => 'd-inline-block'])); ?>

                                        <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-thumbs-down"></i></button>
                                    <?php echo e(Form::close()); ?>

                                <?php else: ?>
                                    <?php echo e(Form::open(['route' => ['active.store', $product->id], 'class' => 'd-inline-block'])); ?>

                                        <button type="submit" class="btn btn-sm btn-info"><i class="fa fa-thumbs-up"></i></button>
                                    <?php echo e(Form::close()); ?>

                                <?php endif; ?>

                                <a href="<?php echo e(route('products.show', $product->id)); ?>" class="btn btn-sm btn-info">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </a>
                                <a href="<?php echo e(route('products.edit', $product->id)); ?>" class="btn btn-sm btn-warning">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                </a>
                                <a href="javascript:void(0)" title="Delete" class="btn btn-sm btn-danger delete-category" data-toggle="modal" data-target="#modaldemo1" data-url="<?php echo e(url('admin/products/'.$product->id)); ?>">
                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                <?php echo e($products->links()); ?>

            </div>

        </div><!-- table-wrapper -->
    </div><!-- card -->

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

<?php echo $__env->make('backend.layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\Dhacha\resources\views/backend/products/index.blade.php ENDPATH**/ ?>