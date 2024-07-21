<div>

    <h3>Product Setting</h3>

    <?php if(session('message')): ?>
        <h3 class="alert alert-success"><?php echo e(session('message')); ?></h3>
    <?php endif; ?>

    <div class="bg-light text-center rounded p-4">
        <div class="flex items-center space-x-4 mb-4">
            <label for="search" class="text-gray-600">Search</label>
            <input type="text" class="border border-gray-300 rounded-md p-2" wire:model.live="search">
            <label for="start_date" class="text-gray-600">Start Date:</label>
            <input id="start_date" type="date" wire:model.live="start_date"
                class="border rounded-md px-2 py-1 focus:outline-none focus:ring focus:border-blue-300">
            <label for="end_date" class="text-gray-600">End Date:</label>
            <input id="end_date" type="date" wire:model.live="end_date"
                class="border rounded-md px-2 py-1 focus:outline-none focus:ring focus:border-blue-300">

            <button wire:click="deleteProducts"
                wire:confirm.prompt="Are you sure  <?php echo e($start_date); ?> to <?php echo e($end_date); ?>?\n Type CONFIRM to confirm |CONFIRM"
                class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-md focus:outline-none"
                style="background-color: rgb(245, 118, 118) !important; color:black !important">
                Delete Products in Period
            </button>
            <button wire:click="resetTable" wire:confirm="“Confirm ID reset? Works only if ‘product’ table is empty.”"
                class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-md focus:outline-none"
                style="background: rgb(36, 149, 241) !important;">Reset </button>
        </div>
        <div class="table-responsive">
            <table class="table text-start text-center align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-dark">
                        <th>ID</th>
                        <th>Category_Name</th>
                        <th>Brand</th>
                        <th>Model</th>
                        <th>Price</th>
                        <th>GPU</th>
                        <th>CPU</th>
                        <th>RAM</th>
                        <th>Quantity</th>
                        <th>Color</th>
                        <th>Display</th>
                        <th>Weight</th>
                        <th>Battery</th>
                        <th>Official_Warranty</th>
                        <th>Image</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($product->id); ?></td>
                            <td><?php echo e($product->productcategory->category_name); ?></td>
                            <td><?php echo e($product->productbrand->brand); ?></td>
                            <td><?php echo e($product->model); ?></td>
                            <td><?php echo e($product->price); ?></td>
                            <td><?php echo e($product->gpu); ?></td>
                            <td><?php echo e($product->cpu); ?></td>
                            <td><?php echo e($product->ram); ?></td>
                            <td style="<?php echo e($product->quantity < 3 ? 'background-color: #FFCCCC !important;' : ''); ?>">
                                <?php echo e($product->quantity); ?>

                            </td>
                            <td><?php echo e($product->color); ?></td>
                            <td><?php echo e($product->display); ?></td>
                            <td><?php echo e($product->weight); ?></td>
                            <td><?php echo e($product->battery); ?></td>
                            <td><?php echo e($product->official_warranty); ?></td>
                            <td><a href="<?php echo e(asset('storage/' . $product->image)); ?>" download><img
                                        src="<?php echo e(asset('storage/' . $product->image)); ?>" style=" width:80px !important" alt=""
                                        class="img-fluid"></a>
                            </td>
                            <td><?php echo e($product->description); ?></td>
                            <td>

                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="mt-2 float-end btn-sm">
        <?php echo e($products->links()); ?>

    </div>
</div>
<?php /**PATH C:\Users\Seiv Yi\Downloads\dd\E_commerce\resources\views\livewire\pages\admin\setting\product-setting.blade.php ENDPATH**/ ?>