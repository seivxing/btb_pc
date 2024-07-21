<div>
    <h3>Accessory Setting</h3>

    <?php if(session('message')): ?>
        <h3 class="alert alert-success"><?php echo e(session('message')); ?></h3>
    <?php endif; ?>
    <div class="table-responsive">
        <div class="flex items-center space-x-4 mb-4">
            <label for="search" class="text-gray-600">Search</label>
            <input type="text"  class="border border-gray-300 rounded-md p-2" wire:model.live="search">
            <label for="start_date" class="text-gray-600">Start Date:</label>
            <input
                id="start_date"
                type="date"
                wire:model.live="start_date"
                class="border rounded-md px-2 py-1 focus:outline-none focus:ring focus:border-blue-300"
            >
            <label for="end_date" class="text-gray-600">End Date:</label>
            <input
                id="end_date"
                type="date"
                wire:model.live="end_date"
                class="border rounded-md px-2 py-1 focus:outline-none focus:ring focus:border-blue-300"
            >

            <button
                wire:click="deleteAcessorys"
                wire:confirm.prompt="Are you sure  <?php echo e($start_date); ?> to <?php echo e($end_date); ?>?\n Type CONFIRM to confirm |CONFIRM"
                class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-md focus:outline-none"
                style="background-color: rgb(245, 118, 118) !important; color:black !important"
            >
                Delete Accessory in Period
            </button>
            <button
                wire:click="resetTable"
                wire:confirm="“Confirm ID reset? Works only if ‘accessory’ table is empty.”"
                class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-md focus:outline-none"
                style="background: rgb(36, 149, 241) !important;"
            >Reset </button>
        </div>
        <table class="table text-start text-center align-middle table-bordered table-hover mb-0">
            <thead>
                <tr class="text-dark">
                    <th>ID</th>
                    <th>Category_Name</th>
                    <th>Model</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Official_Warranty</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $accessorys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $accessory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($accessory->id); ?></td>
                        <td><?php echo e($accessory->category->category_name); ?></td>
                        <td><?php echo e($accessory->model); ?></td>
                        <td><?php echo e($accessory->price); ?></td>
                        <td style="<?php echo e($accessory->quantity < 3 ? 'background-color: #FFCCCC !important;' : ''); ?>">
                            <?php echo e($accessory->quantity); ?>

                        </td>
                        <td><?php echo e($accessory->official_warranty); ?></td>
                        <td><img src="<?php echo e(asset('storage/' . $accessory->image)); ?>" alt="" class="img-fluid"
                                style="width: 90ox; height: 90px;"></td>
                        <td>
                           ##
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
    <div class="mt-2 float-end btn-sm">
        <?php echo e($accessorys->links()); ?>

    </div>
</div>
<?php /**PATH C:\Users\Seiv Yi\Downloads\dd\E_commerce\resources\views\livewire\pages\admin\setting\accessory-setting.blade.php ENDPATH**/ ?>