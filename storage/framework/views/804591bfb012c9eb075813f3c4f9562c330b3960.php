<?php $__env->startSection('title', 'create post'); ?>

<?php $__env->startSection('pagename', 'Create-Post'); ?>

<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('backend.partials._message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Create Post
            <a href="<?php echo e(route('posts.index')); ?>" class="btn btn-sm btn-primary mg-b-10 float-right" >
                 All Posts <i class="fa fa-plus mg-r-10"></i>
            </a>
        </h6>
        <div class="card-body bg-gray-200">
            <?php echo e(Form::open(['route' => ['posts.store'], 'files' => true])); ?>

                <div class="row mg-b-25">
                    <div class="col-md-6">
                        <div class="form-group">
                            <?php echo e(Form::label('title_en', 'Post Title in English',['class' => 'form-control-label'])); ?>

                            <?php echo e(Form::text('title_en', null, ['class' => 'form-control mb-2', 'placeholder' => 'Enter Post Title In English'])); ?>

                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <?php echo e(Form::label('title_bn', 'Post Title in Nepali',['class' => 'form-control-label'])); ?>

                            <?php echo e(Form::text('title_bn', null, ['class' => 'form-control mb-2', 'placeholder' => 'Enter Post Title In Nepali'])); ?>

                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <?php echo e(Form::label('postcategory_id', 'Post Categories English',['class' => 'form-control-label'])); ?>

                            <select id="postcategory_id " name="postcategory_id" class="form-control select2" data-placeholder="Choose Category">
                                <option label="Choose category"></option>
                                <?php $__currentLoopData = $postCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $postCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($postCategory->id); ?>"><?php echo e($postCategory->name_en); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <?php echo e(Form::label('summernote', 'Post Description in English',['class' => 'form-control-label'])); ?>

                        <textarea name="description_en" id="summernote" class="form-control"></textarea>
                    </div>

                    <div class="col-md-12 mt-3">
                        <?php echo e(Form::label('summernote-two', 'Post Description in Nepali',['class' => 'form-control-label'])); ?>

                        <textarea name="description_bn" id="summernote-two" class="form-control"></textarea>
                    </div>

                    <div class="col-md-4 mt-3">
                        <div class="form-group">
                            <?php echo e(Form::label('image', 'Post Image: ',['class' => 'form-control-label'])); ?>

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


<?php echo $__env->make('backend.layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\Dhacha\resources\views/backend/posts/create.blade.php ENDPATH**/ ?>