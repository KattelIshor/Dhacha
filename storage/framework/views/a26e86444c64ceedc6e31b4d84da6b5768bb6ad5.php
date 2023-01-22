<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title><?php echo e(config('app.name')); ?> <?php $__env->startSection('title', 'Admin Login'); ?></title>

    <!-- vendor css -->
    <link href="<?php echo e(asset('backend/lib/font-awesome/css/font-awesome.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('backend/lib/Ionicons/css/ionicons.css')); ?>" rel="stylesheet">


    <!-- Starlight CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('backend/css/starlight.css')); ?>">

    
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/toaster.min.css')); ?>">
    <script src="<?php echo e(asset('js/jquery-5.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/toaster.min.js')); ?>"></script>

    <style>
        .cursor-pointer {
            cursor: pointer;
        }
    </style>

    <script>
        toastr.options = {
            "closeButton": true,
        }
    </script>
</head>

<body>

    <div class="d-flex align-items-center justify-content-center bg-sl-primary ht-100v">
        <?php echo e(Form::open(['route' => 'admin.login'])); ?>

            <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white">
                <div class="signin-logo tx-center tx-24 tx-bold tx-inverse">
                    Halumshop <span class="tx-info tx-normal">admin</span>
                </div>

                <div class="tx-center mg-b-60">Halumshop Admin Panel</div>

                <?php echo $__env->make('backend.partials._message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <div class="form-group">
                    <?php echo e(Form::email('email', null,['class' => 'form-control', 'placeholder' => 'Enter your email'])); ?>

                </div><!-- form-group -->

                <div class="form-group">
                    <?php echo e(Form::password('password', ['class' => 'form-control', 'placeholder' => 'Enter your password'])); ?>

                </div><!-- form-group -->

                <div class="form-group">
                    <?php echo e(Form::label(null, null, ['class' => 'ckbox'])); ?>

                    <?php echo e(Form::checkbox('remember', null)); ?> <span>Remember me</span>
                </div><!-- form-group -->

                <?php echo e(Form::submit('Sign In',['class' => 'btn btn-info btn-block cursor-pointer'])); ?>

            </div>
        <?php echo e(Form::close()); ?>

    </div><!-- d-flex -->

    <script src="<?php echo e(asset('backend/lib/jquery/jquery.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/lib/popper.js/popper.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/lib/bootstrap/bootstrap.js')); ?>"></script>

</body>

</html>
<?php /**PATH D:\xampp\htdocs\halumshop-master\resources\views/backend/auth/login.blade.php ENDPATH**/ ?>