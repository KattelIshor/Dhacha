<?php $__env->startSection('title', 'update post category'); ?>

<?php $__env->startSection('pagename', 'Update-Post Category'); ?>

<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('backend.partials._message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Update Post Category
            <a href="<?php echo e(route('post-categories.index')); ?>" class="btn btn-sm btn-primary mg-b-10 float-right" >
                 All Post Categories <i class="fa fa-plus mg-r-10"></i>
            </a>
        </h6>

        <div class="row mg-b-20">
            <div class="col-md-6">

                <div class="card card-body bg-gray-200">
                    <?php echo e(Form::open(['route' => ['post-categories.update', $postCategory->id], 'method' => 'PUT'])); ?>

                        <div class="form-group">
                            <?php echo e(Form::label('name_en', 'Post Category Name',['class' => 'form-control-label'])); ?>

                            <?php echo e(Form::text('name_en', $postCategory->name_en, ['class' => 'form-control mb-2'])); ?>

                        </div>

                        <div class="form-group">
                            <?php echo e(Form::label('name_bn', 'Post Category Name',['class' => 'form-control-label'])); ?>

                            <?php echo e(Form::text('name_bn', $postCategory->name_bn, ['class' => 'form-control mb-2'])); ?>

                        </div>

                        <div class="form-layout-footer">
                            <button type="submit" class="btn btn-info mg-r-5">Update</button>
                        </div>
                    <?php echo e(Form::close()); ?>

                </div><!-- card -->
            </div><!-- col -->
        </div><!-- row -->

    </div><!-- card -->
<?php $__env->stopSection(); ?>


<?php echo $__env->make('backend.layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\Dhacha\resources\views/backend/posts/post_categories/edit.blade.php ENDPATH**/ ?>