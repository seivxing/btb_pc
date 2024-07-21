<div>

    <h3>Accessory List</h3>

    <?php if(session('message')): ?>
        <h3 class="alert alert-success"><?php echo e(session('message')); ?></h3>
    <?php endif; ?>

    <div class="bg-light text-center rounded p-4">
        <div class="table-responsive">
            <a href="#" data-bs-toggle="modal" data-bs-target="#addAccessoryModal"
                class="btn btn-primary m-2 float-end mb-3">Add Accessory</a>
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
                            <td><a href="<?php echo e(asset('storage/' . $laptop->image)); ?>" download>
                                <img style="height: 120px !important;width:200px !important" src="<?php echo e(asset('storage/' . $accessory->image)); ?>" alt="" class="img-fluid"
                                    style="width: 90ox; height: 90px;"></a></td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a type="" class="btn btn-success"
                                        wire:click="editAccessory(<?php echo e($accessory->id); ?>)" data-bs-toggle="modal"
                                        data-bs-target="#editAccessoryModal">Edit</a>
                                    <a type="" class="btn btn-danger"
                                        wire:click="deleteAccessory(<?php echo e($accessory->id); ?>)" data-bs-toggle="modal"
                                        data-bs-target="#deleteAccessoryModal">Delete</a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <div class="mt-2 float-end btn-sm">
                <?php echo e($accessorys->links()); ?>

            </div>
        </div>
    </div>

    <!-- Add Accessory Modal -->
    <div wire:ignore.self class="modal fade" id="addAccessoryModal" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Laptop</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form wire:submit.prevent="storeAccessory" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="bg-light rounded h-100 p-4">
                        <div class="mb-3">
                            <select wire:model.defer="category_id" id="" class="form-select mb-3">
                                <option value="">Select_Category</option>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($category->id); ?>"><?php echo e($category->category_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php $__errorArgs = ['category_id'];
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
                            <input type="text" wire:model.defer="model" class="form-control" placeholder="Model">
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
                            <input type="text" wire:model.defer="price" class="form-control" placeholder="Price">
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
                        <div class="mb-3">
                            <input type="number" wire:model.lazy="quantity" class="form-control"
                                placeholder="Quantity">
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
                            <input type="text" wire:model.defer="official_warranty" class="form-control"
                                placeholder="Official_Warranty">
                            <?php $__errorArgs = ['official_warranty'];
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
                            <label for="formFile" class="form-label p-1">Image</label>
                            <input type="file" wire:model='image' accept="image/png image/jpeg" id="image"
                                class="ring-1 rign-inset ring-gray-300 bg-gray-100 text-gray-900 text-sm rounded block w-full form-control">
                            <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-red-500 text-xs"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            <?php if($image): ?>
                                <img class="rounded mt-3 d-block" src="<?php echo e($image->temporaryUrl()); ?>" alt=""
                                    style="width: 90px;height: 90px;">
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Update Accessory Modal -->
    <div wire:ignore.self class="modal fade" id="editAccessoryModal" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Laptop</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form wire:submit.prevent="updateAccessory" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="bg-light rounded h-100 p-4">
                        <div class="mb-3">
                            <select wire:model.defer="category_id" id="" class="form-select mb-3">
                                <option value="">Select_Category</option>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($category->id); ?>"><?php echo e($category->category_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php $__errorArgs = ['category_id'];
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
                            <input type="text" wire:model.defer="model" class="form-control" placeholder="Model">
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
                            <input type="text" wire:model.defer="price" class="form-control" placeholder="Price">
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
                        <div class="mb-3">
                            <input type="number" wire:model.defer="quantity" class="form-control"
                                placeholder="Quantity">
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
                            <input type="text" wire:model.defer="official_warranty" class="form-control"
                                placeholder="Official_Warranty">
                            <?php $__errorArgs = ['official_warranty'];
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
                            <label for="formFile" class="form-label p-1">Image</label>
                            <input type="file" wire:model='image' accept="image/png image/jpeg" id="image"
                                class="ring-1 rign-inset ring-gray-300 bg-gray-100 text-gray-900 text-sm rounded block w-full form-control">
                            <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-red-500 text-xs"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            <?php if($image): ?>
                                <img class="rounded mt-3 d-block" src="<?php echo e($image->temporaryUrl()); ?>" alt=""
                                    style="width: 90px;height: 90px;">
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- delete Accessory Modal -->
    <div wire:ignore.self class="modal fade" id="deleteAccessoryModal" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Laptop Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form wire:submit.prevent="destroyAccessory">
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
            $('#addAccessoryModal').modal('hide');
        })
    </script>
    <script>
        window.addEventListener('close-modal', event => {
            $('#editAccessoryModal').modal('hide');
        })
    </script>
     <script>
        window.addEventListener('close-modal', event => {
            $('#deleteAccessoryModal').modal('hide');
        })
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\Users\Seiv Yi\Downloads\dd\E_commerce\resources\views\livewire\pages\admin\accessory\index.blade.php ENDPATH**/ ?>