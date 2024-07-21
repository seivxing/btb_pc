<div>
    <?php echo $__env->make('livewire.pages.admin.product.model-formproduct', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <h3>Laptop List</h3>

    <?php if(session('message')): ?>
        <h3 class="alert alert-success"><?php echo e(session('message')); ?></h3>
    <?php endif; ?>
    <?php if(session('delete')): ?>
        <h3 class="alert alert-danger"><?php echo e(session('delete')); ?></h3>
    <?php endif; ?>

    <div class="bg-light text-center rounded p-4">
        <div class="table-responsive">
            <a href="#" data-bs-toggle="modal" data-bs-target="#addProductModal"
                class="btn btn-primary m-2 float-end mb-3">Add Product</a>
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
            <label class="w-40 text-sm font-medium text-gray-900">Category  Type :</label>
            <select wire:model.live="selectedCategory" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                <option value="">All Categories</option>
                <?php $__currentLoopData = $productcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($category->id); ?>"><?php echo e($category->category_name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <label class="w-40 text-sm font-medium text-gray-900">Category  Type :</label>
            <select wire:model.live="selectedBrand" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                <option value="">All Brand</option>
                <?php $__currentLoopData = $productbrands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brandname): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($brandname->id); ?>"><?php echo e($brandname->brand); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>


            <table class="table  text-center text-start align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-dark">
                        <th wire:click="toggleSort('id')">ID</th>
                        <th>ProductCategory</th>
                        <th>ProductBrand</th>
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
                            <td><a href="<?php echo e(asset('storage/'.$product->image)); ?>" download><img src="<?php echo e(asset('storage/' . $product->image)); ?>" style="height: 100px !important" alt=""
                                class="img-fluid" ></a></td>
                            <td><?php echo e($product->description); ?></td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a type="" class="btn btn-success"
                                        wire:click="editProduct(<?php echo e($product->id); ?>)" data-bs-toggle="modal"
                                        data-bs-target="#editProductModal">Edit</a>
                                    <a type="" class="btn btn-danger"
                                        wire:click="deleteProduct(<?php echo e($product->id); ?>)" data-bs-toggle="modal"
                                        data-bs-target="#deleteProductModal">Delete</a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <div class="mt-2 float-end btn-sm">
                <?php echo e($products->links()); ?>

            </div>
        </div>

    </div>

    <!-- delete Laptop Modal -->
    <div wire:ignore.self class="modal fade" id="deleteProductModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Product Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form wire:submit.prevent="destroyProduct">
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

    <!-- Update Laptop Modal -->
    <div wire:ignore.self class="modal fade" id="editProductModal" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Laptop</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form wire:submit.prevent="updateProduct" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="bg-light rounded h-100 p-4">
                        <div class="mb-3">
                            <select wire:model.defer="productcategory_id" id="" class="form-select mb-3">
                                <option value="">Select Product_Category</option>
                                <?php $__currentLoopData = $productcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($productcategory->id); ?>">
                                        <?php echo e($productcategory->category_name); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php $__errorArgs = ['productcategory_id'];
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
                            <select wire:model.defer="brand_id" id="" class="form-select mb-3">
                                <option value="">Select Product_Brand</option>
                                <?php $__currentLoopData = $productbrands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productbrand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($productbrand->id); ?>">
                                        <?php echo e($productbrand->brand); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php $__errorArgs = ['brand_id'];
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
                        <div class="input-group mb-3">
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
                            <span class="input-group-text"> </span>
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
                        <div class="input-group mb-3">
                            <input type="text" wire:model.defer="gpu" class="form-control" placeholder="GPU">
                            <?php $__errorArgs = ['gpu'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            <span class="input-group-text"> </span>
                            <input type="text" wire:model.defer="cpu" class="form-control" placeholder="CPU">
                            <?php $__errorArgs = ['cpu'];
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
                        <div class="input-group mb-3">
                            <input type="text" wire:model.defer="color" class="form-control" placeholder="Color">
                            <?php $__errorArgs = ['color'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            <span class="input-group-text"> </span>
                            <input type="text" wire:model.defer="display" class="form-control"
                                placeholder="Display">
                            <?php $__errorArgs = ['display'];
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
                        <div class="input-group mb-3">
                            <input type="text" wire:model.defer="weight" class="form-control"
                                placeholder="Weight">
                            <?php $__errorArgs = ['weight'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            <span class="input-group-text"> </span>
                            <input type="text" wire:model.defer="battery" class="form-control"
                                placeholder="Battery">
                            <?php $__errorArgs = ['battery'];
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
                            <input type="file" id="image" wire:model="image" class="form-control">
                            <img src="<?php echo e(asset('storage')); ?>/<?php echo e($old_image); ?>" alt=""
                                style="width: 90px;height: 90px;">
                            <input type="hidden" wire:model='old_image'>
                            <?php if($image): ?>
                                <br>
                                <span>Replace with</span>
                                <img class="rounded mt-3 d-block" src="<?php echo e($image->temporaryUrl()); ?>" alt=""
                                    style="width: 90px;height: 90px;">
                            <?php endif; ?>
                            <?php $__errorArgs = ['image'];
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
                            <textarea type="text" wire:model.defer="description" class="form-control" placeholder="Description"> </textarea>
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



</div>

<?php $__env->startPush('script'); ?>
    <script>
        window.addEventListener('close-modal', event => {
            $('#addProductModal').modal('hide');
        })
    </script>
    <script>
        window.addEventListener('close-modal', event => {
            $('#editProductModal').modal('hide');
        })
    </script>
      <script>
        window.addEventListener('close-modal', event => {
            $('#deleteProductModal').modal('hide');
        })

    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\Users\Seiv Yi\Downloads\dd\E_commerce\resources\views\livewire\pages\admin\product\product-component.blade.php ENDPATH**/ ?>