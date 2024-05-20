<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uploaded Prescriptions</title>
    <!-- Additional CSS, meta tags, etc. -->
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <header>
        <!-- Your header content here -->
    </header>

    <main>
        <h1>Uploaded Prescriptions</h1>
        <table>
            <thead>
                <tr>
                    <th>Prescription ID</th>
                    <th>User</th>
                    <th>Delivery Address</th>
                    <th>Delivery Time Slot</th>
                    <th>Notes</th>
                    <th>Image Path</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $prescriptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prescription): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($prescription->id); ?></td>
                        <td><?php echo e($prescription->user->name); ?></td>
                        <td><?php echo e($prescription->delivery_address); ?></td>
                        <td><?php echo e($prescription->delivery_time_slot); ?></td>
                        <td><?php echo e($prescription->notes); ?></td>
                        <td><?php echo e($prescription->image_path); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>

        <form method="POST" action="<?php echo e(route('quotation.create', $prescription->id)); ?>">
            <?php echo csrf_field(); ?>
            <input type="number" name="quotation_amount" placeholder="Quotation Amount" required>
            <textarea name="terms" placeholder="Terms (optional)"></textarea>
            <button type="submit">Create Quotation</button>
        </form>
        <form method="POST" action="<?php echo e(route('quotation.accept', $prescription->id)); ?>">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="quotation_id" value="<?php echo e($prescription->quotation->id); ?>">
            <button type="submit" name="status" value="accepted">Accept Quotation</button>
        </form>
        <form method="POST" action="<?php echo e(route('quotation.reject', $prescription->id)); ?>">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="quotation_id" value="<?php echo e($prescription->quotation->id); ?>">
            <button type="submit" name="status" value="rejected">Reject Quotation</button>
        </form>
        
    </main>

    <footer>
        <!-- Your footer content here -->
    </footer>

    <!-- Additional scripts, libraries, etc. -->
</body>
</html>
<?php /**PATH C:\Users\LAKSHAN\Documents\pharamcy\example\resources\views/index.blade.php ENDPATH**/ ?>