<?php $__env->startSection('before-head', 'backend/lib/datatables/jquery.dataTables.css'); ?>

<?php $__env->startSection('title', 'product'); ?>

<?php $__env->startSection('pagename', $product->product_title); ?>

<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('backend.partials._message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title"><?php echo e($product->product_title); ?>

            <a href="<?php echo e(route('products.edit', $product->id)); ?>" class="btn btn-sm btn-warning mg-b-10 float-right mx-3">
                 Edit <i class="fa fa-pencil-square-o mg-r-10"></i>
            </a>

            <a href="<?php echo e(route('products.index')); ?>" class="btn btn-sm btn-primary mg-b-10 float-right">
                 All Products <i class="fa fa-plus mg-r-10"></i>
            </a>
        </h6>

        <div class="card-body">
            <div class="row mg-b-25">
                <div class="col-sm-4">
                    <?php if($product->image_one): ?>
                        <img src="<?php echo e(asset($product->image_one)); ?>" alt="Product Image one" class="img-thumbnail mb-3">
                    <?php endif; ?>

                    <?php if($product->image_two): ?>
                        <img src="<?php echo e(asset($product->image_two)); ?>" alt="Product Image one" class="img-thumbnail mb-3">
                    <?php endif; ?>

                    <?php if($product->image_three): ?>
                        <img src="<?php echo e(asset($product->image_three)); ?>" alt="Product Image one" class="img-thumbnail mb-3">
                    <?php endif; ?>

                </div><!-- col-4 -->
                <div class="col-sm offset-sm-1">
                    <h2 class="card-body-title">Product Details</h2>
                    <span class="tx-uppercase tx-medium tx-12 d-block mg-b-15"><?php echo e($product->created_at->format('F d, Y h:s A')); ?></span>

                    <dl class="row">
                        <dt class="col-sm-3 tx-inverse">Product Description</dt>
                        <dd class="col-sm-9"><?php echo $product->product_details; ?></dd>

                        <dt class="col-sm-3 tx-inverse">Category</dt>
                        <dd class="col-sm-9"><?php echo e($product->category->name); ?></dd>

                        <dt class="col-sm-3 tx-inverse">Sub Category</dt>
                        <dd class="col-sm-9"><?php echo e($product->subcategory->name); ?></dd>

                        <dt class="col-sm-3 tx-inverse">Brand</dt>
                        <dd class="col-sm-9"><?php echo e($product->brand->name); ?></dd>

                        <dt class="col-sm-3 tx-inverse">Product Code</dt>
                        <dd class="col-sm-9"><?php echo e($product->product_code); ?></dd>

                        <dt class="col-sm-3 tx-inverse">Product Quantity</dt>
                        <dd class="col-sm-9"><?php echo e($product->product_quantity); ?></dd>

                        <dt class="col-sm-3 tx-inverse">Product Color</dt>
                        <dd class="col-sm-9"><?php echo e($product->product_color); ?></dd>

                        <dt class="col-sm-3 tx-inverse">Product Size</dt>
                        <dd class="col-sm-9"><?php echo e($product->product_size); ?></dd>

                        <dt class="col-sm-3 tx-inverse">Selling Price</dt>
                        <dd class="col-sm-9">BDT <?php echo e($product->selling_price); ?></dd>

                        <dt class="col-sm-3 tx-inverse">Discount Price</dt>
                        <dd class="col-sm-9">BDT <?php echo e($product->discount_price); ?></dd>

                        <dt class="col-sm-3 tx-inverse">Video Link</dt>
                        <dd class="col-sm-9"><a href="<?php echo e($product->video_link); ?>">View product related video</a></dd>

                        <dt class="col-sm-3 tx-inverse">Status</dt>
                        <dd class="col-sm-9">
                            <?php if($product->status == 1): ?>
                                <span class="badge badge-success">Active</span>
                            <?php else: ?>
                                <span class="badge badge-danger">Inactive</span>
                            <?php endif; ?>
                        </dd>

                        <dt class="col-sm-3 tx-inverse">Main Slider</dt>
                        <dd class="col-sm-9">
                            <?php if($product->main_slider == 1): ?>
                                <span class="badge badge-success">Active</span>
                            <?php else: ?>
                                <span class="badge badge-danger">Inactive</span>
                            <?php endif; ?>
                        </dd>

                        <dt class="col-sm-3 tx-inverse">Hot Deal</dt>
                        <dd class="col-sm-9">
                            <?php if($product->hot_deal == 1): ?>
                                <span class="badge badge-success">Active</span>
                            <?php else: ?>
                                <span class="badge badge-danger">Inactive</span>
                            <?php endif; ?>
                        </dd>

                        <dt class="col-sm-3 tx-inverse">Best Rated</dt>
                        <dd class="col-sm-9">
                            <?php if($product->best_rated == 1): ?>
                                <span class="badge badge-success">Active</span>
                            <?php else: ?>
                                <span class="badge badge-danger">Inactive</span>
                            <?php endif; ?>
                        </dd>

                        <dt class="col-sm-3 tx-inverse">Hot New</dt>
                        <dd class="col-sm-9">
                            <?php if($product->hot_new == 1): ?>
                                <span class="badge badge-success">Active</span>
                            <?php else: ?>
                                <span class="badge badge-danger">Inactive</span>
                            <?php endif; ?>
                        </dd>

                        <dt class="col-sm-3 tx-inverse">Trand</dt>
                        <dd class="col-sm-9">
                            <?php if($product->trand == 1): ?>
                                <span class="badge badge-success">Active</span>
                            <?php else: ?>
                                <span class="badge badge-danger">Inactive</span>
                            <?php endif; ?>
                        </dd>
                    </dl>
                </div>
            </div>
        </div>
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


<?php echo $__env->make('backend.layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\halumshop-master\resources\views/backend/products/show.blade.php ENDPATH**/ ?>