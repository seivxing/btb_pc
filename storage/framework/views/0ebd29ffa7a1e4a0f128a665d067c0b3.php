<div>
    <h3>General Setting</h3>
    <?php if(session('message')): ?>
        <h3 class="alert alert-success"><?php echo e(session('message')); ?></h3>
    <?php endif; ?>

    <form wire:submit.prevent="updateSetting" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="bg-light rounded h-20 p-4 shadow">
            <div class="form-group">
                <label for="app_name">App Name</label>
                <input type="text" wire:model.defer="app_name"
                    class="form-control ">
                <?php $__errorArgs = ['app_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="invalid-feedback" role="alert">
                        <strong><?php echo e($message); ?></strong>
                    </span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="form-group mt-3">
                <label for="title_name">Title Name</label>
                <input type="text" wire:model.defer="title_name"
                    class="form-control">
                <?php $__errorArgs = ['title_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="invalid-feedback" role="alert">
                        <strong><?php echo e($message); ?></strong>
                    </span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="form-group mt-3">
                <label for="image">Icon</label>
                <input type="file" wire:model.defer="image"
                    class="form-control ">
                <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="invalid-feedback" role="alert">
                        <strong><?php echo e($message); ?></strong>
                    </span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">SaveChange</button>
            </div>
        </div>
    </form>
    <div style="width: 100%; padding: 20px; background-color: #f8f9fa; border-radius: 5px;">
        
        <div style="margin-bottom: 20px;" >
            <p style="font-size: 18px; color: #333; font-family: 'Cursive';" wire:poll>Total size of livewire-tmp folder: <?php echo e($totalSize); ?></p>

            <button wire:click="calculateTotalSize" style="margin-right: 10px; padding: 10px; background-color: #007bff; color: #fff; border: none; border-radius: 5px;">Recalculate Size</button>
            <button wire:click="deleteLivewireTmpFiles" onclick="return confirm('Are you sure you want to deleted the temp file ?')" style="padding: 10px; background-color: #dc3545; color: #fff; border: none; border-radius: 5px;">Delete Theme file </button>
        </div>
        
        <div>
            <h3>Export Database:</h3>
            <button wire:click="export" class="btn btn-primary" style="padding: 10px; background-color: #28a745; color: #fff; border: none; border-radius: 5px;">Export Database</button>
        </div>
    </div>



</div>
<?php /**PATH C:\Users\Seiv Yi\Downloads\dd\E_commerce\resources\views\livewire\pages\admin\setting\general-setting.blade.php ENDPATH**/ ?>