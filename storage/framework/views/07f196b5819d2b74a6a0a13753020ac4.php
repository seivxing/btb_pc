<?php $__env->startSection('productcategory','active'); ?>

<?php $__env->startSection('content'); ?>
<h3>Add ProductBrand</h3>
<div class="bg-light rounded p-4">
    <form action="<?php echo e(route('productcategory_store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">ProductCategory </label>
            <input type="text" name="category_name" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
            <?php $__errorArgs = ['category_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p class="text-danger"><?php echo e($message); ?></p>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        <button type="submit" class="btn btn-primary">Add</button>
    </form>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Seiv Yi\Downloads\dd\E_commerce\resources\views\pages\admin\product\productcategory\create.blade.php ENDPATH**/ ?>