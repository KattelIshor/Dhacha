<?php $__env->startSection('title', 'create slider'); ?>

<?php $__env->startSection('pagename', 'Create-Slider'); ?>

<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('backend.partials._message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Create Slider
            <a href="<?php echo e(route('sliders.index')); ?>" class="btn btn-sm btn-primary mg-b-10 float-right" >
                 All Sliders <i class="fa fa-plus mg-r-10"></i>
            </a>
        </h6>
        <div class="card-body bg-gray-200">
            <?php echo e(Form::open(['route' => ['sliders.store'], 'files' => true])); ?>

                <div class="row mg-b-25">
                    <div class="col-md-6">
                        <div class="form-group">
                            <?php echo e(Form::label('title', 'Slider Title ',['class' => 'form-control-label'])); ?>

                            <?php echo e(Form::text('title', null, ['class' => 'form-control mb-2', 'placeholder' => 'Enter Slider Title'])); ?>

                        </div>
                    </div>

                    <div class="col-md-12">
                        <?php echo e(Form::label('summernote', 'Slider Description',['class' => 'form-control-label'])); ?>

                        <textarea name="description" id="summernote" class="form-control"></textarea>
                    </div>

                    <div class="col-md-4 mt-3">
                        <div class="form-group">
                            <?php echo e(Form::label('image', 'Slide Image: ',['class' => 'form-control-label'])); ?>

                            <label class="custom-file" for="image">
                                <input type="file" name="image" id="image" class="custom-file-input" onchange="readURLOne(this)">
                                <span class="custom-file-control custom-file-control-primary"></span>
                            </label>
                            <br><br>
                            <img id="one">
                        </div>
                    </div>

                </div>

                <div class="form-layout-footer">
                    <button type="submit" class="btn btn-info mg-r-5">Store</button>
                </div>
            <?php echo e(Form::close()); ?>

        </div><!-- card -->

    </div><!-- card -->

    
    <script>
        function readURLOne(input) {
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


<?php echo $__env->make('backend.layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\Dhacha\resources\views/backend/sliders/create.blade.php ENDPATH**/ ?>