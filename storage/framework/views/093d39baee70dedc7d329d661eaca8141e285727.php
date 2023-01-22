<?php if($enabled): ?>
    <div id="<?php echo e($nameFieldName); ?>_wrap" style="display:none;">
        <input name="<?php echo e($nameFieldName); ?>" type="text" value="" id="<?php echo e($nameFieldName); ?>">
        <input name="<?php echo e($validFromFieldName); ?>" type="text" value="<?php echo e($encryptedValidFrom); ?>">
    </div>
<?php endif; ?>
<?php /**PATH D:\xampp\htdocs\Dhacha\vendor\spatie\laravel-honeypot\src/../resources/views/honeypotFormFields.blade.php ENDPATH**/ ?>