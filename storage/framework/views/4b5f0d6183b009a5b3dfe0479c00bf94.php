<div wire:poll.keep-alive.7s>
    <style>
        .confirm {
            background-color: #4CAF50;
            /* Change background color as desired */
            color: white;
            padding: 8px 16px;
            /* Adjust padding for slimmer look */
            border: none;
            border-radius: 4px;
            /* Add some rounded corners */
            cursor: pointer;
            display: inline-block;
            font-size: 15px;
            font-family: cursive;
            font-style: italic
                /* Adjust font size if needed */
        }

        .inprogress {
            background-color: #d89134;
            /* Change background color as desired */
            color: white;
            padding: 8px 16px;
            /* Adjust padding for slimmer look */
            border: none;
            border-radius: 4px;
            /* Add some rounded corners */
            cursor: pointer;
            display: inline-block;
            font-size: 15px;
            font-family: cursive;
            font-style: italic
                /* Adjust font size if needed */
        }

        .cancel {
            background-color: #f76767;
            /* Change background color as desired */
            color: white;
            padding: 8px 16px;
            /* Adjust padding for slimmer look */
            border: none;
            border-radius: 4px;
            /* Add some rounded corners */
            cursor: pointer;
            display: inline-block;
            font-size: 15px;
            font-family: cursive;
            font-style: italic
        }
    </style>
    <div>

        <label for="start_date">Start Date:</label>
        <input type="date" id="start_date" wire:model.live="startDate" class="form-control">
        <label for="end_date">End Date:</label>
        <input type="date" id="end_date" wire:model.live="endDate" class="form-control">

        <?php if(session('error')): ?>
            <h3 class="alert alert-danger"><?php echo e(session('error')); ?></h3>
        <?php endif; ?>
        <?php if(session('delete')): ?>
            <h3 class="alert alert-danger"><?php echo e(session('delete')); ?></h3>
        <?php endif; ?>
    </div>
    <table class="table text-start text-center align-middle table-bordered table-hover mb-0">
        <thead>
            <tr class="text-dark">
                <th>User Name</th>
                <th>Order Date</th>
                <th>Status Message</th>
                <th>Payment Image</th>
                <th>Total_Amount</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($item->full_name); ?></td>
                    <td><?php echo e($item->created_at->format('d-m-Y')); ?></td>
                    <td>
                        <?php if($item->status == 'confirm'): ?>
                            <button class="confirm">Confirm</button>
                        <?php elseif($item->status == 'cancel'): ?>
                            <button class="cancel">Cancel</button>
                        <?php else: ?>
                            <button class="inprogress"
                                onclick=" confirm('Are you sure?') || event.stopImmediatePropagation()"
                                wire:click="markOrderReturned(<?php echo e($item->id); ?>)"> In progress</button>
                            <br>
                            <button class="cancel mt-2"
                                onclick=" confirm('Are you sure to cancel?') || event.stopImmediatePropagation()"
                                wire:click="cancelOrder(<?php echo e($item->id); ?>)">Cancel</button>
                        <?php endif; ?>

                    </td>
                    <td><a href="<?php echo e(asset('storage/' . $item->payment_qr)); ?>" download>
                            <img style="height: 120px !important;width:200px !important"
                                src="<?php echo e(asset('storage/' . $item->payment_qr)); ?>" alt="" class="img-fluid"></a>
                    </td>
                    <td><?php echo e($item->total_amount); ?></td>
                    <td>
                        <a type="button" href="<?php echo e(route('trackingproductadmin', ['orderId' => $item->id])); ?>"
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


<?php /**PATH C:\Users\Seiv Yi\Downloads\dd\E_commerce\resources\views\livewire\pages\admin\producttrackingadmin\product-tracking-admin.blade.php ENDPATH**/ ?>