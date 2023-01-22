<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('backend.partials._message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <section class="blog spad">
        <div class="container">
            <div class="card customCard">
                <div class="card-header customCard__header">
                    Posts
                    <div class="dropdown">
                        <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            Language
                        </button>
                        <?php
                            $language = Session()->get('lang');
                        ?>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <?php if($language == 'bangla'): ?>
                                <a class="dropdown-item" href="<?php echo e(route('lng.english')); ?>">English</a>
                            <?php else: ?>
                                <a class="dropdown-item" href="<?php echo e(route('lng.bangla')); ?>">Nepali</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-4 col-xl-3">
                                <div class="blog__single__latest">
                                    <a href="<?php echo e(route('blog.single', $post->slug)); ?>">
                                        <img src="<?php echo e(asset($post->image)); ?>" alt="<?php echo e($post->title_en); ?>">
                                    </a>
                                    <div class="blog__single__latest__text p-2">
                                        <div class="blog__single__latest__text__tag">
                                            <div class="blog__single__latest__text__tag__item">
                                                <i class="fa fa-calendar-o"></i>
                                                <?php echo e($post->created_at->format('F d, Y')); ?>

                                            </div>
                                        </div>
                                        <?php if(Session()->get('lang') == 'bangla'): ?>
                                            <h4><a href="<?php echo e(route('blog.single', $post->slug)); ?>"><?php echo e($post->title_bn); ?></a></h4>
                                            <p><?php echo Str::limit($post->description_bn, 80); ?></p>
                                        <?php else: ?>
                                            <h4><a href="<?php echo e(route('blog.single', $post->slug)); ?>"><?php echo e($post->title_en); ?></a></h4>
                                            <p><?php echo Str::limit($post->description_en, 80); ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center my-4">
            <?php echo e($posts->links()); ?>

        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\Dhacha\resources\views/frontend/post.blade.php ENDPATH**/ ?>