<div wire:poll.keep-alive.2s>
    <table class="table text-start text-center align-middle table-bordered table-hover mb-0">
        <thead>
            <tr class="text-dark">
                <th>User Name</th>
                <th>Oder Date</th>
                <th>Status Message</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($item->full_name); ?></td>
                    <td><?php echo e($item->created_at->format('d-m-Y')); ?></td>
                    <td><?php if($item->status=='confirm'): ?>
                        <p style="text-decoration: underline" ><?php echo e($item->status); ?></p>
                        <?php elseif($item->status=='in progress'): ?>
                        <p  ><?php echo e($item->status); ?></p>
                    <?php endif; ?></td>
                    <td>
                        <a type="button" href="<?php echo e(url('tracking/'.$item->id)); ?>"
                            class="btn btn-primary btn-sm">View</a>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="4">No Orders available</td>
                </tr>
            <?php endif; ?>

        </tbody>
    </table>
</div>
<?php /**PATH C:\Users\Seiv Yi\Downloads\dd\E_commerce\resources\views\livewire\pages\user\tracking\tracking.blade.php ENDPATH**/ ?>