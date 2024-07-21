<div>
    <?php echo $__env->make('livewire.pages.admin.renewstockproduct.model-form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php if(session('message')): ?>
        <h3 class="alert alert-success"><?php echo e(session('message')); ?></h3>
    <?php endif; ?>

    <div class="bg-light text-center rounded p-4">
        <div class="table-responsive">
            <a href="#" data-bs-toggle="modal" data-bs-target="#addLaptopModal"
                class="btn btn-primary m-2 float-end mb-3">Renew  Product Stock </a>
                <input wire:model.live="search" style="margin-right: 100px" type="text" placeholder="search model..."
            class="bg-gray-100 ml-2 rounded px-4 py-2 hover:bg-gray-100" />
                <label for="recordSelect" class="block text-sm font-medium text-gray-700">Record</label>
            <select wire:model.live="perPage"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="20">20</option>
                <option value="50">50</option>
                <option value="100">100</option>
            </select>

            <div>
                <input type="date" wire:model.live="startDate">
                <input type="date" wire:model.live="endDate">

                <!-- Displaying the total amount within the specified date range -->
                <div>Total Amount between <?php echo e($startDate); ?> to <?php echo e($endDate); ?>: <?php echo e($totalAmount); ?> USD </div>
                
            </div>
            <table class="table  text-center text-start align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-dark">
                        <th wire:click="toggleSort('id')">ID</th>
                        <th>Product_ID</th>
                        <th>Model</th>
                        <th>Quantity</th>
                        <th>PRICE</th>
                        <th>TOTAL_AMOUNT   </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $renewstocks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $renewstock): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($renewstock->id); ?></td>
                            <td><?php echo e($renewstock->product_id); ?></td>
                            <td><?php echo e($renewstock->model); ?></td>
                            <td><?php echo e($renewstock->quantity); ?></td>
                            <td><?php echo e($renewstock->price); ?>$</td>
                            <td><?php echo e($renewstock->total_amount); ?>$</td>

                            <td>
                                <div class="btn-group" role="group">
                                    <a type="" class="btn btn-success"
                                        wire:click="editStockProduct(<?php echo e($renewstock->id); ?>)" data-bs-toggle="modal"
                                        data-bs-target="#editLaptopModal">Edit</a>
                                    <a type="" class="btn btn-danger"
                                        wire:click="deleteStockProduct(<?php echo e($renewstock->id); ?>)" data-bs-toggle="modal"
                                        data-bs-target="#deleteLaptopModal">Delete</a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <div class="mt-2 float-end btn-sm">
                <?php echo e($renewstocks->links()); ?>

            </div>
        </div>

    </div>
    <!-- Update Laptop Modal -->
    <div wire:ignore.self class="modal fade" id="editLaptopModal" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Update RenewStock</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form wire:submit.prevent="updateStockProduct" >
                    <?php echo csrf_field(); ?>
                    <div class="bg-light rounded h-100 p-4">

                        <div class="mb-3">

                            <input  type="text" wire:model.lazy="model"  class="form-control"  >

                            <?php $__errorArgs = ['model'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="mb-3">
                            <input type="number" wire:model="quantity" class="form-control" placeholder="Quantity">
                            <?php $__errorArgs = ['quantity'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="mb-3">
                            <input type="number" wire:model="price" class="form-control" placeholder="Price">
                            <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- delete Laptop Modal -->
    <div wire:ignore.self class="modal fade" id="deleteLaptopModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Laptop Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form wire:submit.prevent="destroyStockProduct">
                    <div class="modal-body">
                        <h6>Are you sure you want to delete this data?</h6>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Yes .Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



</div>

<?php $__env->startPush('script'); ?>
    <script>
        window.addEventListener('close-modal', event => {
            $('#addLaptopModal').modal('hide');
        })
    </script>
    <script>
        window.addEventListener('close-modal', event => {
            $('#editLaptopModal').modal('hide');
        })
    </script>
      <script>
        window.addEventListener('close-modal', event => {
            $('#deleteLaptopModal').modal('hide');
        })

    </script>
<?php $__env->stopPush(); ?>






<?php /**PATH C:\Users\Seiv Yi\Downloads\dd\E_commerce\resources\views\livewire\pages\admin\renewstockproduct\renew-stock-product-component.blade.php ENDPATH**/ ?>