<?php $__env->startSection('before-head', 'backend/lib/datatables/jquery.dataTables.css'); ?>

<?php $__env->startSection('title', 'pandding-orders'); ?>

<?php $__env->startSection('pagename', 'Pandding Orders'); ?>

<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('backend.partials._message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Pandding Order List</h6>

        <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
                <thead>
                    <tr>
                        <th class="wd-15p">Payment type</th>
                        <th class="wd-15p">Transaction ID</th>
                        <th class="wd-15p">Subtotal</th>
                        <th class="wd-15p">Shipping</th>
                        <th class="wd-15p">Total</th>
                        <th class="wd-15p">Date</th>
                        <th class="wd-15p">Status</th>
                        <th class="wd-20p">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($order->payment_type); ?></td>
                            <td>
                                <?php if($order->blnc_transection): ?>
                                    <?php echo e($order->blnc_transection); ?>

                                <?php endif; ?>

                                <?php if($order->transaction_id): ?>
                                    <?php echo e($order->transaction_id); ?>

                                <?php endif; ?>
                            </td>
                            <td><?php echo e($order->subtotal); ?> </td>
                            <td><?php echo e($order->shipping); ?> </td>
                            <td><?php echo e($order->amount); ?> </td>
                            <td><?php echo e($order->created_at); ?> </td>
                            <td>
                                <?php if($order->status_op == 0): ?>
                                    <span class="badge badge-warning">Pending</span>
                                <?php elseif($order->status_op == 1): ?>
                                    <span class="badge badge-info">Payment Accept</span>
                                <?php elseif($order->status_op == 2): ?>
                                    <span class="badge badge-warning">Proccess to delivery</span>
                                <?php elseif($order->status_op == 3): ?>
                                    <span class="badge badge-success">Delevered</span>
                                <?php else: ?>
                                    <span class="badge badge-danger">Cencel</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="<?php echo e(route('order.view', $order->id)); ?>" class="btn btn-sm btn-info">View</a>
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

    
    <script src="<?php echo e(mix('js/dashboard.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\Dhacha\resources\views/backend/order/pandding.blade.php ENDPATH**/ ?>