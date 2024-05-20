<form method="POST" action="<?php echo e(route('prescription.upload')); ?>" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <input type="file" name="prescription_images[]" accept="image/*" multiple required>
    <textarea name="notes" placeholder="Additional notes"></textarea>
    <input type="text" name="delivery_address" placeholder="Delivery Address">
    <select name="delivery_time_slot">
        <option value="09:00-11:00">9:00 AM - 11:00 AM</option>
        <option value="11:00-13:00">11:00 AM - 1:00 PM</option>
        <!-- Add more time slots as needed -->
    </select>
    <button type="submit">Upload Prescription</button>
</form>
<?php /**PATH C:\Users\LAKSHAN\Documents\pharamcy\example\resources\views/dashboard.blade.php ENDPATH**/ ?>