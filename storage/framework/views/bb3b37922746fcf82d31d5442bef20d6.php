<?php $__env->startSection('producttracking','active'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <h4>
        <i class="fas fa-shopping-cart"> My Order Detail</i>
    </h4>
    <a href="<?php echo e(url('admin/detail/invoice/'.$order->id.'/generate')); ?>" class="btn text-white float-end m-2" style="background-color: #0bcf0b">Download Invoice</a>
    <a href="<?php echo e(url('admin/detail/invoice/'.$order->id)); ?>" target="_blank" class="btn text-white float-end m-2" style="background-color: #1077f4">View Invoice</a>
    <div class="shadow bg-white p-3">
        <div class="row p-3">
            <div class="col-nd-6 mr-5">
                <h5>Order Detail</h5>
                <hr>
                <h6>Order Id : <?php echo e($order->id); ?></h6>
                <h6>Order Date : <?php echo e($order->created_at->format('d-m-Y h:i A')); ?></h6>
                <h6>Payment : QR</h6>
                <h6 class="border p-1 " style="color:black">
                    <?php
                    if ($order->status == 'in progress') {
                        echo 'Order Status Message: <span class="text-uppercase" style="color: #70d6f8;">' . $order->status . '</span>';
                    } elseif ($order->status == 'confirm') {
                        echo 'Order Status Message: <span class="text-uppercase" style="color: #00FF00;">' . $order->status . '</span>';
                    } else {
                        echo 'Order Status Message: <span class="text-uppercase" style="color: #FF0000;">' . $order->status . '</span>';
                    }
                    ?>
                </h6>
            </div>

            <div class="col-nd-6">
                <h5>User Detail</h5>
                <hr>
                <h6>User Name : <?php echo e($user->name); ?></h6>
                <h6>Email : <?php echo e($user->email); ?></h6>
                <h6>Phone Number : <?php echo e($order->phone_number); ?></h6>
                <h6>Address : <?php echo e($order->address); ?></h6>
            </div>
        </div>
        <br>
        <h5>Order Item</h5>
        <hr>
        
        <table class="table  text-center text-start align-middle table-bordered table-hover mb-0">
            <thead>
                <tr class="text-dark">
                    <th>Item Id</th>
                    <th>Image</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $totalPrice = 0;
                ?>
                <?php $__currentLoopData = $order->orderItemproduct; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orderItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td width="10%"><?php echo e($orderItem->id); ?></td>
                        <td width="10%"><img src="<?php echo e(asset('storage/' . $orderItem->product->image)); ?>"
                                class="mr-3" style="height: 100px !important" alt="">
                        </td>
                        <td><?php echo e($orderItem->product->model); ?></td>
                        <td width="10%">$ <?php echo e($orderItem->price); ?></td>
                        <td width="10%"><?php echo e($orderItem->quantity); ?></td>
                        <td width="10%" class="fw-bold">$ <?php echo e($orderItem->quantity * $orderItem->price); ?></td>
                        <?php
                            $totalPrice += $orderItem->quantity * $orderItem->price;
                        ?>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td colspan="5" class="fw-bold">Total Amount</td>
                    <td colspan="1" class="fw-bold">
                        $ <?php echo e($totalPrice); ?>

                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Seiv Yi\Downloads\dd\E_commerce\resources\views\pages\admin\producttracking\producttrackingdetail.blade.php ENDPATH**/ ?>