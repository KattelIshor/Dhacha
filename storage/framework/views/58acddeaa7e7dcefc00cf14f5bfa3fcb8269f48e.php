<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('backend.partials._message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <section class="product-details spad">
        <div class="container">
            <div class="card customCard">
                <div class="card-header customCard__header">
                    Product
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-5 col-md-12 col-12">
                            <img src="<?php echo e(asset($product->image_one)); ?>" alt="<?php echo e($product->product_title); ?>" class="img-fluid w-100 pb-1" id="mainImg">

                            <div class="small-img-group">
                                <?php if($product->image_one): ?>
                                    <div class="small-img-col">
                                        <img src="<?php echo e(asset($product->image_one)); ?>" alt="<?php echo e($product->product_title); ?>" width="100%" class="small-img">
                                    </div>
                                <?php endif; ?>

                                <?php if($product->image_two): ?>
                                    <div class="small-img-col">
                                        <img src="<?php echo e(asset($product->image_two)); ?>" alt="<?php echo e($product->product_title); ?>" width="100%" class="small-img">
                                    </div>
                                <?php endif; ?>

                                <?php if($product->image_three): ?>
                                    <div class="small-img-col">
                                        <img src="<?php echo e(asset($product->image_three)); ?>" alt="<?php echo e($product->product_title); ?>" width="100%" class="small-img">
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12 col-12">
                        <?php echo e(Form::open(['route' => ['products.details', $product->slug]])); ?>

                            <h6>
                                <a href="<?php echo e(route('products.categories', $product->category->slug)); ?>">
                                    <?php echo e($product->category->name); ?>

                                </a> |
                                <a href="<?php echo e(route('products.subcategories', $product->subcategory->slug)); ?>">
                                    <?php echo e($product->subcategory->name); ?>

                                </a>
                            </h6>
                            <h3 class="py-4"><?php echo e($product->product_title); ?></h3>
                            <h2>
                                <?php if($product->discount_price == null): ?>
                                    Rs <?php echo e(intval($product->selling_price)); ?>

                                <?php else: ?>
                                    Rs <?php echo e(intval($product->discount_price)); ?>

                                    <span class="price-before-discount">
                                        Rs <?php echo e(intval($product->selling_price)); ?>

                                    </span>
                                <?php endif; ?>
                            </h2>
                            <?php if($product->product_size != null): ?>
                                <select class="my-3" name="size">
                                    <option value="">Select Size</option>
                                    <?php $__currentLoopData = $product_size; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $size): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($size); ?>"><?php echo e($size); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            <?php endif; ?>

                            <?php if($product->product_color != null): ?>
                                <select class="my-3" name="color">
                                    <option value="">Select Color</option>
                                    <?php $__currentLoopData = $product_color; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($color); ?>"><?php echo e($color); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            <?php endif; ?>
                            <input type="number" value="1" min="1" max="10" name="qty">

                            <button type="submit" class="btn btn-success buy-btn">Add To Cart</button>
                            <h4 class="my-3">Product Details <i class="fa fa-indent" aria-hidden="true"></i></h4>
                            <p><?php echo $product->product_details; ?></p>
                        <?php echo e(Form::close()); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="viewed spad">
        <div class="container">
            <div class="card customCard">
                <div class="card-body">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab"
                                aria-controls="nav-home" aria-selected="true">Reviews</a>
                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab"
                                aria-controls="nav-profile" aria-selected="false">Video</a>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show p-3 active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            <div class="product-comment">
                                <?php echo $__env->make('comments::components.comments', ['model' => $product], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        </div>
                        <div class="tab-pane p-3 fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <?php if($product->video_link): ?>
                                <div class="product-video">
                                    <iframe width="100%" height="315" src="<?php echo e($product->video_link); ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                            <?php else: ?>

                                <h2>No Video Here</h2>

                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\Dhacha\resources\views/frontend/single-product.blade.php ENDPATH**/ ?>