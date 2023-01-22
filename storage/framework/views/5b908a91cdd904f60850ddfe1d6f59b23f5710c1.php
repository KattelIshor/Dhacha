<?php $__env->startSection('before-head', 'backend/lib/datatables/jquery.dataTables.css'); ?>

<?php $__env->startSection('title', 'return-request'); ?>

<?php $__env->startSection('pagename', 'Return Request'); ?>

<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('backend.partials._message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="row">
        <div class="col-md-12">
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Return Request Pandding List</h6>

                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                            <tr>
                                <th class="wd-15p">Order Id</th>
                                <th class="wd-15p">Customer Name</th>
                                <th class="wd-15p">Total</th>
                                <th class="wd-15p">Status</th>
                                <th class="wd-20p">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($order->status_code); ?></td>
                                    <td><?php echo e($order->user->name); ?> </td>
                                    <td><?php echo e($order->total); ?></td>
                                    <td>
                                        <?php if($order->return_status == 1): ?>
                                            <span class="badge badge-warning">Pending</span>
                                        <?php elseif($order->return_status == 2): ?>
                                            <span class="badge badge-success">Request Accept</span>
                                        <?php elseif($order->return_status == 3): ?>
                                            <span class="badge badge-success">Request Cancel</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <a href="<?php echo e(route('return.request.view', $order->id)); ?>" class="btn btn-sm btn-info">View</a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                        <?php echo e($orders->links()); ?>

                    </div>

                </div><!-- table-wrapper -->
            </div><!-- card -->
        </div>
    </div>

    
    <script src="<?php echo e(mix('js/dashboard.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\Dhacha\resources\views/backend/return/request.blade.php ENDPATH**/ ?>