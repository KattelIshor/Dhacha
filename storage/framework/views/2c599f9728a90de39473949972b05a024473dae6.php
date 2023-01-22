    
    <header class="header">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid right-sidebar">
                
                <div class="hamburger__menu mr-3" title="Sidebar">
                    <a href="#" class="hamburger__menu__link">
                        <i class="fa fa-bars" aria-hidden="true"></i>
                    </a>
                </div>
            <a class="navbar-brand" href="#">
                <img src="<?php echo e(asset('css/dacha.png')); ?>" alt="Logo" height="40">
                </a>

                
                
                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav search-box ml-3">
                        <form class="form-inline" action="<?php echo e(route('search')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <input name="product_title" class="form-control mr-sm-2 search-product" type="search" placeholder="Search products" aria-label="Search">
                            <button class="btn btn-outline-muted my-2 my-sm-0" type="submit">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </button>
                        </form>
                    </ul>

                    <ul class="navbar-nav second-navbar">
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(url('/')); ?>" title="Home">
                                Home
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('blog.posts')); ?>" title="Blog">
                                Blog
                            </a>
                        </li>

                        <?php if(auth()->guard()->check()): ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle cart" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-user-secret" aria-hidden="true"></i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="<?php echo e(route('profile', Auth::user()->slug)); ?>">
                                        <?php echo e(Auth::user()->name); ?>

                                    </a>
                                    <a class="dropdown-item" href="<?php echo e(route('password.change')); ?>">Change Password</a>
                                    <div class="dropdown-divider"></div>
                                    <?php echo e(Form::open(['route' => 'logout'])); ?>

                                        <?php echo e(Form::submit('Sign out')); ?>

                                    <?php echo e(Form::close()); ?>

                                </div>
                            </li>

                            <?php
                                $wishlists = DB::table('wishlists')->where('user_id', Auth::id())->get();
                            ?>

                            <li class="nav-item wishlist">
                                <a class="nav-link" href="<?php echo e(route('wishlist')); ?>" title="Wishlist">
                                    <i class="fa fa-heart-o" aria-hidden="true"></i>
                                    <span><?php echo e(count($wishlists)); ?></span>
                                </a>
                            </li>

                        <?php endif; ?>

                            <li class="nav-item cart">
                                <a class="nav-link" href="<?php echo e(route('show.cart')); ?>" title="Cartlist">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                    <span><?php echo e(Cart::count()); ?></span>
                                </a>
                            </li>

                        <?php if(auth()->guard()->check()): ?>
                            <h6 class="ml-2">Rs <?php echo e(Cart::subtotal()); ?></h6>
                        <?php endif; ?>

                        <?php if(auth()->guard()->guest()): ?>
                            <li class="nav-item ml-3 user-btn">
                                <a href="<?php echo e(route('login')); ?>" class="btn btn-info my-5 my-sm-0">
                                    Sign in
                                </a>
                            </li>
                        <?php endif; ?>

                    </ul>
                </div>

                <?php echo $__env->make('frontend.partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            </div>
        </nav>
    </header>
    
<?php /**PATH D:\xampp\htdocs\Dhacha\resources\views/frontend/partials/header.blade.php ENDPATH**/ ?>