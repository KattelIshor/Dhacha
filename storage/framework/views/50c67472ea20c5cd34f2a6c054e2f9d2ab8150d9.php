<script>
    <?php if($errors->any()): ?>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            toastr.error('<?php echo e($message); ?>','Validation Error');
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>

    <?php if(Session::has('message')): ?>

        var type = "<?php echo e(Session::get('alert-type', 'info')); ?>"

        switch(type) {
            case 'info':
                toastr.info(" <?php echo e(Session::get('message')); ?> ", "Information");
                break;
            case 'success':
                toastr.success(" <?php echo e(Session::get('message')); ?> ", "Successfully");
                break;
            case 'worning':
                toastr.worning(" <?php echo e(Session::get('message')); ?> ", "Worning");
                break;
            case 'error':
                toastr.error(" <?php echo e(Session::get('message')); ?> ", "Error");
                break;
        }

    <?php endif; ?>

</script>
<?php /**PATH D:\xampp\htdocs\halumshop-master\resources\views/backend/partials/_message.blade.php ENDPATH**/ ?>