<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo e(config('app.name')); ?></title>

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="<?php echo e(mix('css/app.css')); ?>">

    
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/toaster.min.css')); ?>">
    <script type="text/javascript" src="<?php echo e(asset('js/jquery-5.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/toaster.min.js')); ?>"></script>

    <script>
        toastr.options = {
            "closeButton": true,
        }
    </script>

    
    <script src="https://js.stripe.com/v3/"></script>

</head>
<body>

    <?php echo $__env->make('frontend.partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    
    <main role="main">

        <?php echo $__env->yieldContent('content'); ?>

        <?php echo $__env->make('frontend.partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </main>
    

    <script src="<?php echo e(mix('js/app.js')); ?>"></script>
</body>
</html>
<?php /**PATH D:\xampp\htdocs\Dhacha\resources\views/frontend/layouts/master.blade.php ENDPATH**/ ?>