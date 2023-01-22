
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="footer__left">
                    <div class="footer__left__logo">
                        
                        <img src="<?php echo e(asset('css/logo.png')); ?>" class="d-block w-100" alt="Dhacha">
                         
                        </a>
                    </div>
                    <ul>
                        <li>Address: <?php echo e(siteSetting("company_address")); ?></li>
                        <li>Phone: <?php echo e(siteSetting("phone")); ?></li>
                        <li>Email: <?php echo e(siteSetting("email")); ?></li>
                    </ul>
                    <div class="footer__left__social">
                        <a target="_blank" href="<?php echo e(siteSetting("facebook")); ?>">
                            <i class="fa fa-facebook"></i>
                        </a>
                        <a target="_blank" href="<?php echo e(siteSetting("instagram")); ?>">
                            <i class="fa fa-instagram"></i>
                        </a>
                        <a target="_blank" href="<?php echo e(siteSetting("youtube")); ?>">
                            <i class="fa fa-tiktok"></i>
                        </a>
                        <a target="_blank" href="<?php echo e(siteSetting("pinterest")); ?>">
                            <i class="fa fa-whatsapp"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-lg-2 offset-lg-1">
                <div class="footer__widget">
                    <h5>Information</h5>
                    <ul>
                        <li><a href="../aboutus/about.html">About</a></li>
                        <li><a href="#">Checkout</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="<?php echo e(route('blog.posts')); ?>">Blogs</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-2">
                <div class="footer__widget">
                    <h5>My Account</h5>
                    <ul>
                        <li><a href="#">My Account</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">Shopping Cart</a></li>
                        <li><a href="../aboutus/shippingpolicy.php">Shipping Policy</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="footer__newslatter__item">
                    <h5>Join Our Newsletter Now</h5>
                    <p>Get E-mail updates about our latest shop and special offers.</p>
                    <form method="POST" action="<?php echo e(route('newsletter.store')); ?>" class="footer__newslatter__item__form">
                        <?php echo csrf_field(); ?>
                        <?php echo e(Form::email('email', null, ['placeholder' => 'Enter Your Mail'])); ?>

                        <button type="submit">Subscribe</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="footer__copyright__reserved">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright__reserved__text">
                        Copyright ©<script>document.write(new Date().getFullYear());</script> All rights reserved by Dhacha || Designed and Developed  by <a href="https://www.facebook.com/ktl.ishor10" target="_blank">Kattel Ishor</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<?php /**PATH D:\xampp\htdocs\Dhacha\resources\views/frontend/partials/footer.blade.php ENDPATH**/ ?>