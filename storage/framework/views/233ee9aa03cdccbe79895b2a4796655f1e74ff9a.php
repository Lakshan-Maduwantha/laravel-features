<form method="POST" action="<?php echo e(route('login')); ?>">
    <?php echo csrf_field(); ?>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Login</button>
</form>
<?php /**PATH C:\Users\LAKSHAN\Documents\pharamcy\example\resources\views/login.blade.php ENDPATH**/ ?>