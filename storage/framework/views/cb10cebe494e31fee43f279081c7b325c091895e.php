<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('backend.partials._message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <section class="login">
        <div class="login__container">
            <div class="login__container__bg">
                <div class="box signin">
                    <h2>Already Have an Account</h2>
                    <button class="signinBtn">Sign in</button>
                </div>

                <div class="box signup">
                    <h2>Don't Have an Account</h2>
                    <button class="signupBtn">Sign up</button>
                </div>
            </div>

            <div class="login__container__formBx">
                <div class="form signinForm">
                    <?php echo e(Form::open(['route' => 'login'])); ?>

                        <h3>Sign In</h3>
                        <?php echo e(Form::email('email', null, ['placeholder' => 'Your E-mail'])); ?>

                        <?php echo e(Form::password('password', ['placeholder' => 'Password'])); ?>

                        <?php echo e(Form::submit('Login')); ?>

                        <a href="<?php echo e(route('forget.password.get')); ?>" class="forget">Forgot Password</a>
                    <?php echo e(Form::close()); ?>

                </div>

                <div class="form signupForm">
                    <?php echo e(Form::open(['route' => 'register'])); ?>

                        <h3>Sign Up</h3>
                        <?php echo e(Form::text('name', null, ['placeholder' => 'Your name'])); ?>

                        <?php echo e(Form::email('email', null, ['placeholder' => 'Email Address'])); ?>

                        <?php echo e(Form::text('phone_number', null, ['placeholder' => 'Phone number'])); ?>

                        <?php echo e(Form::password('password', ['placeholder' => 'Password'])); ?>

                        <?php echo e(Form::password('password_confirmation', ['placeholder' => 'Confirm Password'])); ?>

                        <?php echo e(Form::submit('Register')); ?>

                    <?php echo e(Form::close()); ?>

                </div>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\Dhacha\resources\views/frontend/auth/login_registration.blade.php ENDPATH**/ ?>