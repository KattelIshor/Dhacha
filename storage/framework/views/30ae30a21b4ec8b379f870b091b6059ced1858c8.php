<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('backend.partials._message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php
        $vat = $setting->vat;
        $shipping_charge = $setting->shipping_charge;
    ?>

    <section class="checkout spad">
        <div class="container">
            <div class="card customCard">
                <div class="card-header customCard__header">
                    Checkout
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 order-md-2 mb-4">
                            <h4 class="d-flex justify-content-between align-items-center mb-3">
                                <span class="text-muted">Your cart</span>
                                <span class="badge badge-success badge-pill">
                                    <?php echo e($cart->count()); ?>

                                </span>
                            </h4>
                            <ul class="list-group mb-3 checkout-list-group">
                                <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                                        <div>
                                            <h6 class="my-0"><?php echo e($product->name); ?></h6>
                                            <small class="text-muted">Quantity: <?php echo e($product->qty); ?></small>
                                        </div>
                                        <span class="text-muted">Rs<?php echo e($product->price*$product->qty); ?></span>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <li class="list-group-item d-flex justify-content-between lh-condensed">
                                    <div>
                                        <h6 class="my-0">Shipping Charge</h6>
                                    </div>
                                    <span class="text-muted">Rs<?php echo e($shipping_charge); ?></span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between lh-condensed">
                                    <div>
                                        <h6 class="my-0">Vat</h6>
                                    </div>
                                    <span class="text-muted">Rs<?php echo e($vat); ?></span>
                                </li>

                                <?php if(Session::has('coupon')): ?>
                                    <li class="list-group-item d-flex justify-content-between bg-light">
                                        <div class="text-success">
                                            <h6 class="my-0">Promo code</h6>
                                            <small style="text-transform: uppercase">
                                                <?php echo e(Session::get('coupon')['name']); ?>

                                            </small>
                                        </div>
                                        <span class="text-success">
                                            -Rs<?php echo e(Session::get('coupon')['discount']); ?>

                                        </span>
                                    </li>
                                <?php endif; ?>

                                <li class="list-group-item d-flex justify-content-between">
                                    <span>Total (NRP)</span>
                                    <?php if(Session::has('coupon')): ?>
                                        <strong>
                                            Rs<?php echo e(Session::get('coupon')['balance'] + $shipping_charge + $vat); ?>

                                        </strong>
                                    <?php else: ?>
                                        <strong>Rs<?php echo e(Cart::subtotal() + $shipping_charge + $vat); ?></strong>
                                    <?php endif; ?>
                                </li>
                            </ul>

                            <?php if(!Session::has('coupon')): ?>
                                <?php echo e(Form::open(['route' => 'apply.coupon', 'class' => 'card p-2'])); ?>

                                    <div class="input-group">
                                        <?php echo e(Form::text('coupon', null, ['class' => 'form-control', 'placeholder' => 'Promo code'])); ?>

                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-success">Redeem</button>
                                        </div>
                                    </div>
                                <?php echo e(Form::close()); ?>

                            <?php endif; ?>
                        </div>
                        <div class="col-md-8 order-md-1">
                            <h4 class="mb-3">Billing address</h4>
                            <?php echo e(Form::open(['route' => 'payment.proccess', 'class' => 'needs-validation'])); ?>

                                <div class="mb-3">
                                    <?php echo e(Form::label('name', 'Name')); ?>

                                    <div class="input-group">
                                        <?php echo e(Form::text('name',null,['class' => 'form-control', 'id' => 'name', 'placeholder' => 'Full Name'])); ?>

                                    </div>
                                </div>

                                <div class="mb-3">
                                    <?php echo e(Form::label('email', 'Email')); ?>

                                    <?php echo e(Form::email('email',null,['class' => 'form-control', 'id' => 'email', 'placeholder' => 'you@example.com'])); ?>

                                </div>

                                <div class="mb-3">
                                    <?php echo e(Form::label('phone', 'Phone')); ?>

                                    <?php echo e(Form::text('phone',null,['class' => 'form-control', 'id' => 'phone', 'placeholder' => 'Your phone number'])); ?>

                                </div>

                                <div class="mb-3">
                                    <?php echo e(Form::label('address', 'Address')); ?>

                                    <?php echo e(Form::text('address',null,['class' => 'form-control', 'id' => 'address', 'placeholder' => 'Your Address'])); ?>

                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <?php echo e(Form::label('province', 'Province')); ?>

                                        <?php echo e(Form::select('province', [
                                            
                                            'province no.1'=> 'Province no.1',
                                               'madesh'=>  'Madesh',
                                              'bagmati'=> 'Bagmati',
                                               'gandaki'=> 'Gandaki',
                                                  'lumbini'=> 'Lumbini',
                                                 'karnali'=>'Karnali',
                                                  'mahakali'=> 'Mahakali'
                                        ],null,
                                        [
                                            'class' => 'custom-select d-block w-100',
                                            'id' => 'city'
                                        ]
                                        )); ?>

                                    </div>
                                    <div class="col-md-5 mb-3">
                                        <?php echo e(Form::label('post_code', 'Post Code')); ?>

                                        <?php echo e(Form::text('post_code',null,['class' => 'form-control', 'id' => 'post_code', 'placeholder' => 'Your post code'])); ?>

                                    </div>
                                </div>

                                <hr class="mb-4">
                                <h4 class="mb-3">Payment</h4>

                                <div class="my-3">
                                    <div class="custom-control custom-radio">
                                        <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" value="stripe" checked required>
                                        <?php echo e(Form::label('credit', 'Esewa',['class' => 'custom-control-label'])); ?>

                                        
                                    </div>
                                 
                                    <div class="custom-control custom-radio">
                                        <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" value="cashon" required>
                                        <?php echo e(Form::label('debit', 'Cash On Delivery',['class' => 'custom-control-label'])); ?>

                                    </div>
                                </div>
                                <hr class="mb-4">
                                <?php echo e(Form::submit('Continue to checkout',['class' => 'btn btn-primary btn-lg btn-block'])); ?>

                            <?php echo e(Form::close()); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\Dhacha\resources\views/frontend/checkout.blade.php ENDPATH**/ ?>