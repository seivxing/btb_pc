<div>

    <div class="py-3 py-md-4 checkout">
        <div class="container">
            <h4>Checkout</h4>
            <hr>

            <?php if($this->totalLaptopAmount != '0'): ?>
                <div class="row">
                    <div class="col-md-12 mb-4">
                        <div class="shadow bg-white p-3">
                            <h4 class="text-primary">
                                Total Amount :
                                <span class="float-end">$ <?php echo e($this->totalLaptopAmount); ?></span>
                            </h4>
                            <hr>
                            <small>* Items will be delivered in 2 - 3 days.</small>
                            <br />
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="shadow bg-white p-3">
                            <h4 class="text-primary">
                                Information Payment
                            </h4>
                            <?php if(session('error')): ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <?php echo e(session('error')); ?>

                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php endif; ?>
                            <?php if(session('message')): ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <?php echo e(session('message')); ?>

                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php endif; ?>
                            <hr>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label>Full Name</label>
                                    <input type="text" wire:model.defer='fullname' readonly class="form-control"
                                        placeholder="Enter Full Name" />
                                    <?php $__errorArgs = ['fullname'];
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
                                <div class="col-md-6 mb-3">
                                    <label>Phone Number</label>
                                    <input type="number" wire:model.defer='phonenumber' class="form-control"
                                        placeholder="Enter Phone Number" />
                                    <?php $__errorArgs = ['phonenumber'];
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
                                <div class="col-md-12 mb-3">
                                    <label>Full Address</label>
                                    <textarea wire:model.defer="address" class="form-control" rows="2"></textarea>
                                    <?php $__errorArgs = ['address'];
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
                                <hr>
                                <div class="col-md-6 mb-3">
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label p-1">Upload QR</label>
                                        <input type="file" wire:model.defer='payment_qr' accept="image/png image/jpeg"
                                            id="payment_qr" class="form-control">
                                        <?php $__errorArgs = ['payment_qr'];
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
                                <div class="col-md-6 mb-3">
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label p-1">Pay Now</label>
                                        <br>
                                        <img src=" <?php echo e(asset('bs5/img/ROC-Merchandise-QR-Code-658x1024.jpg')); ?>" alt="">
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <button type="button" wire:click="codOrder" class="btn btn-primary">Place Order</button>
                                </div>
                            </div>


                        </div>
                    </div>

                </div>
            <?php else: ?>
            <div class="card card-body shadow text-center p-md-5 ">
                <h4>NO Items in cart to checkout</h4>
                <a href="<?php echo e(route('home')); ?>" class="btn btn-primary">Shop Now</a>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\Seiv Yi\Downloads\dd\E_commerce\resources\views\livewire\pages\user\checkout\ceck-out.blade.php ENDPATH**/ ?>