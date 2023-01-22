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
                        <div class="col-md-12">
                            <div class="blog__single__latest">
                                <div class="blog__single__latest__img">
                                    <img src="<?php echo e(asset($post->image)); ?>" alt="<?php echo e($post->title_en); ?>">
                                </div>

                                <div class="blog__single__latest__text p-4">
                                    <div class="blog__single__latest__text__tag">
                                        <div class="blog__single__latest__text__tag__item">
                                            <i class="fa fa-calendar-o"></i>
                                            <?php echo e($post->created_at->format('F d, Y')); ?>

                                        </div>
                                        <div class="blog__single__latest__text__tag__item">
                                            <i class="fa fa-hand-o-right"></i>
                                            <?php if(Session()->get('lang') == 'bangla'): ?>
                                                <a href="#" class="post-category">
                                                    <?php echo e($post->postcategory->name_bn); ?>

                                                </a>
                                            <?php else: ?>
                                                <a href="#" class="post-category">
                                                    <?php echo e($post->postcategory->name_en); ?>

                                                </a>
                                            <?php endif; ?>
                                        </div>
                                        <div class="blog__single__latest__text__tag__item">
                                            <i class="fa fa-user-o"></i>
                                            <a href="#" class="author">
                                                <?php echo e($post->admin->name); ?>

                                            </a>
                                        </div>
                                    </div>
                                    <?php if(Session()->get('lang') == 'bangla'): ?>
                                        <h4 class="py-3"><?php echo e($post->title_bn); ?></h4>
                                        <p><?php echo $post->description_bn; ?></p>
                                    <?php else: ?>
                                        <h4 class="py-3"><?php echo e($post->title_en); ?></h4>
                                        <p><?php echo $post->description_en; ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="py-3">
                    <div class="row">
                        <div class="col-md-9 mx-auto">
                            <div class="product-comment">
                                <?php echo $__env->make('comments::components.comments', ['model' => $post], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\Dhacha\resources\views/frontend/post-single.blade.php ENDPATH**/ ?>