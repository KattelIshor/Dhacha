<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('backend.partials._message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <section class="product-cart spad">
        <div class="container">
            <div class="card customCard">
                <div class="card-header customCard__header">
                    Your product wishlist
                </div>
                <div class="card-body">
                    <?php if($wishlist->count() > 0): ?>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Item</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $wishlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <div class="item-img">
                                                <a href="<?php echo e(route('products.details', $item->product->slug)); ?>">
                                                    <img src="<?php echo e(asset($item->product->image_one)); ?>" alt="<?php echo e($item->product->product_title); ?>">
                                                </a>
                                            </div>
                                            <div class="item-detail">
                                                <h6>
                                                    <a href="<?php echo e(route('products.details', $item->product->slug)); ?>">
                                                        <?php echo e($item->product->product_title); ?>

                                                    </a>
                                                </h6>
                                                <?php if($item->product->discount_price == null): ?>
                                                    <p>Rs<?php echo e($item->product->selling_price); ?></p>
                                                <?php else: ?>
                                                    <p>Rs<?php echo e($item->product->discount_price); ?></p>
                                                <?php endif; ?>
                                            </div>
                                        </td>
                                        <td>
                                            <?php echo e(Form::open(['route' => ['remove.wishlist', $item->id], 'method' => 'DELETE'])); ?>

                                                <button type="submit" class="btn btn-sm btn-danger mt-1 btn-action">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                </button>
                                            <?php echo e(Form::close()); ?>

                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>

                    <?php else: ?>
                        <div class="alert alert-primary" role="alert">
                            Product not here in wishlist
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center my-4">
            <?php echo e($wishlist->links()); ?>

        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\Dhacha\resources\views/frontend/wishlist.blade.php ENDPATH**/ ?>