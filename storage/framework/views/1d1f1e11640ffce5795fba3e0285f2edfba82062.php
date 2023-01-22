<div class="header__sidebar">
    <div class="header__sidebar__top">
        
        <a class="navbar-brand" href="#"><span style="color: #43424c">Dhacha</span></a>
        <button class="close-btn"><i class="fa fa-times"></i></button>
    </div>

    <?php
        $categories = App\Models\Category::with('child_category')->where('category_id', NULL)->get();
    ?>

    <ul class="header__sidebar__menu">
        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($category->child_category->count() > 0): ?>
                <li class="header__sidebar__menu__item dropdown">
                    <a href="#" class="header__sidebar__menu__item__link dropdown-toggle d-flex justify-content-between align-items-center" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span><?php echo e($category->name); ?></span>
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php $__currentLoopData = $category->child_category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a class="dropdown-item" href="<?php echo e(route('products.subcategories', $subcategory->slug)); ?>">
                            <?php echo e($subcategory->name); ?>

                        </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </li>
            <?php else: ?>
                <li class="header__sidebar__menu__item">
                    <a href="<?php echo e(route('products.categories', $category->slug)); ?>" class="header__sidebar__menu__item__link">
                        <?php echo e($category->name); ?>

                    </a>
                </li>
            <?php endif; ?>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
    <!--<div class="header__sidebar__media">
        <a href="#"><i class="fa fa-facebook"></i></a>
        <a href="#"><i class="fa fa-instagram"></i></a>
        <a href="#"><i class="fa fa-twitter"></i></a>
    </div> -->
</div>
<?php /**PATH D:\xampp\htdocs\Dhacha\resources\views/frontend/partials/sidebar.blade.php ENDPATH**/ ?>