<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title><?php echo e(config('app.name')); ?> - <?php echo $__env->yieldContent('title'); ?></title>

    <!-- vendor css -->
    <link href="<?php echo e(asset('backend/lib/font-awesome/css/font-awesome.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('backend/lib/Ionicons/css/ionicons.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('backend/lib/perfect-scrollbar/css/perfect-scrollbar.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('backend/lib/rickshaw/rickshaw.min.css')); ?>" rel="stylesheet">

    <!-- Starlight CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('backend/css/starlight.css')); ?>">

    <link href="<?php echo e(asset('backend/lib/summernote/summernote-bs4.css')); ?>" rel="stylesheet">

    <!-- Multi tag input CDN -->
    <link href="<?php echo e(asset('backend/css/tagsinput.css')); ?>" rel="stylesheet"/>

    
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/toaster.min.css')); ?>">
    <script src="<?php echo e(asset('js/jquery-5.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/toaster.min.js')); ?>"></script>

    <style>
        button {
            cursor: pointer;
        }

        .bootstrap-tagsinput {
            width: 460px;
        }
    </style>

    <script>
        toastr.options = {
            "closeButton": true,
        }
    </script>
</head>

<body>

    <!-- ########## START: LEFT PANEL ########## -->
    <?php echo $__env->make('backend.partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- ########## END: LEFT PANEL ########## -->

    <!-- ########## START: HEAD PANEL ########## -->
    <?php echo $__env->make('backend.partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- ########## END: HEAD PANEL ########## -->

    <!-- ########## START: RIGHT PANEL ########## -->
    <?php echo $__env->make('backend.partials.rightsidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- ########## END: RIGHT PANEL ########## --->

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="index.html">Dhacha</a>
            <span class="breadcrumb-item active"><?php echo $__env->yieldContent('pagename'); ?></span>
        </nav>

        <div class="sl-pagebody">

            <?php echo $__env->yieldContent('content'); ?>

        </div><!-- sl-pagebody -->

        <?php echo $__env->make('backend.partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

    <script src="<?php echo e(asset('backend/lib/jquery/jquery.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/lib/popper.js/popper.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/lib/bootstrap/bootstrap.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/lib/jquery-ui/jquery-ui.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/lib/jquery.sparkline.bower/jquery.sparkline.min.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/lib/d3/d3.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/lib/rickshaw/rickshaw.min.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/lib/chart.js/Chart.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/lib/Flot/jquery.flot.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/lib/Flot/jquery.flot.pie.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/lib/Flot/jquery.flot.resize.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/lib/flot-spline/jquery.flot.spline.js')); ?>"></script>

    <script src="<?php echo e(asset('backend/lib/medium-editor/medium-editor.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/lib/summernote/summernote-bs4.min.js')); ?>"></script>
    <script>
        $(function () {
            'use strict';

            // Inline editor
            var editor = new MediumEditor('.editable');

            // Summernote editor
            $('#summernote').summernote({
                height: 150,
                tooltip: false
            })

            // Summernote two editor
            $('#summernote-two').summernote({
                height: 150,
                tooltip: false
            })

            // Summernote three editor
            $('#summernote-three').summernote({
                height: 150,
                tooltip: false
            })
        });
    </script>

    <script src="<?php echo e(asset('backend/js/starlight.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/js/ResizeSensor.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/js/dashboard.js')); ?>"></script>
</body>

</html>
<?php /**PATH D:\xampp\htdocs\Dhacha\resources\views/backend/layouts/layout.blade.php ENDPATH**/ ?>