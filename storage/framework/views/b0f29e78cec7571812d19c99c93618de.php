<div>

    <div class="py-3 py-md-5">
        <div class="container">
            <h4>My Cart</h4>
            <hr>
            <?php if(session('error')): ?>
                <h3 class="alert alert-danger"><?php echo e(session('error')); ?></h3>
            <?php endif; ?>
            <?php if(session('message')): ?>
                <h3 class="alert alert-success"><?php echo e(session('message')); ?></h3>
            <?php endif; ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="shopping-cart" wire:poll.keep-alive.4s>

                        <div class="cart-header d-none d-sm-none d-mb-block d-lg-block">
                            <div class="row">
                                <div class="col-md-4">
                                    <h4>Products</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>Price</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>Quantity</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>Sub Total</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>Remove</h4>
                                </div>
                            </div>
                        </div>

                        <?php $__empty_1 = true; $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cartitem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <?php if($cartitem->product): ?>
                                <div class="cart-item">
                                    <div class="row">
                                        <div class="col-md-4 my-auto">
                                            <a href="<?php echo e(url('viewdetail/product/' . $cartitem->product->model)); ?>">
                                                <label class="product-name">
                                                    <img src="<?php echo e(asset('storage/' . $cartitem->product->image)); ?>"
                                                        class="mr-3" style="height: 100px !important" alt="">
                                                    <?php echo e($cartitem->product->model); ?>

                                                </label>
                                            </a>
                                        </div>
                                        <div class="col-md-2 my-auto">
                                            <label class="price">$ <?php echo e($cartitem->product->price); ?> </label>
                                        </div>
                                        <div class="col-md-2 col-7 my-auto">
                                            <div class="quantity">
                                                <div class="input-group">
                                                    <?php if($cartitem->quantity > 1): ?>
                                                        <button type="button" class="btn btn1"
                                                            wire:loading.attr="disabled"
                                                            wire:click="decrementQuantity(<?php echo e($cartitem->id); ?>)"><i
                                                                class="fa fa-minus"></i></button>
                                                    <?php else: ?>
                                                    <?php endif; ?>
                                                    <input type="text" value="<?php echo e($cartitem->quantity); ?>" readonly
                                                        class="input-quantity" />
                                                    <button type="button" class="btn btn1" wire:loading.attr="disabled"
                                                        wire:click="incrementQuantity(<?php echo e($cartitem->id); ?>)"><i
                                                            class="fa fa-plus"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2 my-auto">
                                            <label class="price">$
                                                <?php echo e($cartitem->product->price * $cartitem->quantity); ?>

                                                <?php $totalPrice += $cartitem->product->price * $cartitem->quantity  ?>
                                            </label>
                                        </div>
                                        <div class="col-md-2 col-5 my-auto">
                                            <div class="remove">
                                                <button type="button" wire:loading.attr="disabled"
                                                    wire:click="removeCartItem( <?php echo e($cartitem->id); ?> )"
                                                    class="btn btn-danger btn-sm">
                                                    <span wire:loading.remove
                                                        wire:target="removeCartItem( <?php echo e($cartitem->id); ?> )">
                                                        <i class="fa fa-trash"></i> Remove
                                                    </span>
                                                    <span wire:loading
                                                        wire:target="removeCartItem( <?php echo e($cartitem->id); ?> )">
                                                        <i class="fa fa-trash"></i> Removing
                                                    </span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            No Cart Item available
                        <?php endif; ?>


                    </div>
                </div>
            </div>
            <?php if($totalPrice): ?>
                <div class="row">
                    <div class="col-md-8 my-md-auto mt-3">
                        <h5>
                            <a href="<?php echo e(route('home')); ?>">shopping more</a>
                        </h5>
                    </div>
                    <div class="col-md-4 mt-3">
                        <div class="shadow-sm bg-white p3">
                            <h4>Total:
                                <span class="float-end">$ <?php echo e($totalPrice); ?> </span>
                            </h4>
                            <hr>
                            <a href="<?php echo e(route('checkout_product')); ?>" class="btn btn-warning w-100">CheckOut</a>
                        </div>
                    </div>
                </div>
            <?php else: ?>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\Seiv Yi\Downloads\dd\E_commerce\resources\views\livewire\pages\user\productcart\product-cart-show.blade.php ENDPATH**/ ?>