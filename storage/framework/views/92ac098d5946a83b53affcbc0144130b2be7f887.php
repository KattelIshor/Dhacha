<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('backend.partials._message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <section class="product-cart spad">
        <div class="container">
            <div class="card customCard">
                <div class="card-header customCard__header">
                    Shopping Cart Product
                </div>
                <div class="card-body">
                    <?php if($shopcarts->count() > 0): ?>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Item</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Action</th>
                                    <th scope="col">Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $shopcarts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <div class="item-img">
                                                <img src="<?php echo e(asset($item->options->image)); ?>" alt="<?php echo e($item->name); ?>">
                                            </div>
                                            <div class="item-detail">
                                                <h6><?php echo e($item->name); ?></h6>
                                                <?php if($item->options->color): ?>
                                                    <span>Color: <?php echo e($item->options->color); ?></span>
                                                <?php endif; ?>
                                                <?php if($item->options->size): ?>
                                                    <span>Size: <?php echo e($item->options->size); ?></span>
                                                <?php endif; ?>
                                                <p>Rs<?php echo e($item->price); ?></p>
                                            </div>
                                        </td>
                                        <td>
                                            <form action="<?php echo e(route('update.cartitem')); ?>" method="POST">
                                                <?php echo csrf_field(); ?>
                                                <div class="input-group mb-3 btn-qty">
                                                    <input type="hidden" name="productId" value="<?php echo e($item->rowId); ?>">
                                                    <input type="number" class="form-control" min="1" max="10" value="<?php echo e($item->qty); ?>" name="qty">
                                                    <div class="input-group-append">
                                                        <button type="submit" class="btn btn-success input-group-text" id="basic-addon2"><i class="fa fa-check-square"></i></button>
                                                    </div>
                                                </div>
                                            </form>
                                        </td>
                                        <td>
                                            <?php echo e(Form::open(['route' => ['remove.cart', $item->rowId], 'method' => 'DELETE'])); ?>

                                                <button type="submit" class="btn btn-sm btn-danger mt-1 btn-action">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                </button>
                                            <?php echo e(Form::close()); ?>

                                        </td>
                                        <td>Rs <?php echo e($item->price*$item->qty); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="total-bg">
                                        <td></td>
                                        <td></td>
                                        <td>Total</td>
                                        <td>
                                            Rs<?php echo e(Cart::subtotal()); ?>

                                        </td>
                                    </tr>
                            </tbody>
                        </table>
                        <a href="<?php echo e(route('checkout')); ?>" class="btn btn-success pull-right btn-checkout">Checkout</a>

                    <?php else: ?>
                        <div class="alert alert-primary" role="alert">
                            Product not here in cart
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\Dhacha\resources\views/frontend/cart.blade.php ENDPATH**/ ?>