<form method="POST" action="<?php echo e(route('register')); ?>">
    <?php echo csrf_field(); ?>
    <input type="text" name="name" placeholder="Name" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="text" name="address" placeholder="Address" required>
    <input type="tel" name="contact_number" placeholder="Contact Number" required>
    <input type="date" name="dob" placeholder="Date of Birth" required>
    <input type="password" name="password" placeholder="Password" required>
    <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
    <button type="submit">Register</button>
</form>
<?php /**PATH C:\Users\LAKSHAN\Documents\pharamcy\example\resources\views/register.blade.php ENDPATH**/ ?>