<?php $__env->startSection('title', 'update brand'); ?>

<?php $__env->startSection('pagename', 'Update-Brand'); ?>

<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('backend.partials._message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Update Brand
            <a href="<?php echo e(route('brands.index')); ?>" class="btn btn-sm btn-primary mg-b-10 float-right" >
                 All Brand <i class="fa fa-plus mg-r-10"></i>
            </a>
        </h6>

        <div class="row mg-b-20">
            <div class="col-md-6">

                <div class="card card-body bg-gray-200">
                    <?php echo e(Form::open(['route' => ['brands.update', $brand->id], 'method' => 'PUT', 'files' => true])); ?>

                        <div class="form-group">
                            <?php echo e(Form::label('name', 'Brand Name',['class' => 'form-control-label'])); ?>

                            <?php echo e(Form::text('name', $brand->name, ['class' => 'form-control mb-2'])); ?>

                        </div>

                        <div class="form-group">
                            <label class="custom-file" for="logo">
                                <input type="file" name="logo" id="logo" class="form-control custom-file-input" onchange="readURL(this)">
                                <span class="custom-file-control custom-file-control-primary"></span>
                            </label>
                            <br><br>
                            <img src="<?php echo e(asset($brand->logo)); ?>" alt="Brand logo" id="one" width="120px" height="80px">
                        </div>

                        <div class="form-layout-footer">
                            <button type="submit" class="btn btn-info mg-r-5">Update</button>
                        </div>
                    <?php echo e(Form::close()); ?>

                </div><!-- card -->
            </div><!-- col -->
        </div><!-- row -->

    </div><!-- card -->

    
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#one')
                        .attr('src', e.target.result)
                        .width(120)
                        .height(80);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('backend.layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\Dhacha\resources\views/backend/brands/edit.blade.php ENDPATH**/ ?>