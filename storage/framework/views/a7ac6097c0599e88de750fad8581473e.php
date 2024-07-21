<div>

    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ProductCategory Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form wire:submit.prevent="destroyProductCategory">
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


    <h3>ProductBrand List</h3>
    <?php if(session('message')): ?>
        <h3 class="alert alert-success"><?php echo e(session('message')); ?></h3>
    <?php endif; ?>
    <div class="bg-light text-center rounded p-4">
        <div class="table-responsive">
            <a href="<?php echo e(route('productcategory_create')); ?>" class="btn btn-primary m-2 float-end mb-3">Add ProductCategory</a>
            <table class="table text-center text-start align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-dark">
                        <th>id</th>
                        <th>Category Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $productcategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($productcategory->id); ?></td>
                            <td><?php echo e($productcategory->category_name); ?></td>
                            <td>
                                <a class="btn btn-success btn-sm"
                                    href="<?php echo e(url('/admin/productcategory/' . $productcategory->id . '/edit')); ?>">Edit</a>
                                <a href="#" class="btn btn-danger btn-sm btn-dele"
                                    wire:click="deleteProductCategory(<?php echo e($productcategory->id); ?>)" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        Not Found
                    <?php endif; ?>
                </tbody>
            </table>
            
        </div>
    </div>
</div>

<?php $__env->startPush('script'); ?>
    <script>
        window.addEventListener('close-modal', event => {
            $('#deleteModal').modal('hide');
        })
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\Users\Seiv Yi\Downloads\dd\E_commerce\resources\views\livewire\pages\admin\product\productcategory\product-category-component.blade.php ENDPATH**/ ?>