<div>
    <table class="table text-start text-center align-middle table-bordered table-hover mb-0">
        <thead>
            <tr class="text-dark">
                <th colspan="5">
                    <label for="start_date">Start Date:</label>
                    <input type="date" id="start_date" wire:model.live="startDate" class="form-control">
                    <label for="end_date">End Date:</label>
                    <input type="date" id="end_date" wire:model.live="endDate" class="form-control">
                </th>
            </tr>
            <tr class="text-dark">
                <th>Product ID:</th>
                <th>Model</th>
                <th>Price</th>
                <th>Total Quantity:</th>
                <th>Total Amount</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $productQuantities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productQuantity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($productQuantity->product): ?>
                <tr>
                    <td><?php echo e($productQuantity->product->id); ?></td>
                    <td><?php echo e($productQuantity->product->model); ?></td>
                    <td><?php echo e($productQuantity->product->price); ?></td>
                    <td><?php echo e($productQuantity->total_quantity); ?></td>
                </tr>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php /**PATH C:\Users\Seiv Yi\Downloads\dd\E_commerce\resources\views\livewire\pages\admin\salerecord\sale-record-component.blade.php ENDPATH**/ ?>