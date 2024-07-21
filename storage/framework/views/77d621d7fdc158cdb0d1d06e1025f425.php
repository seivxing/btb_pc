<div>
    <div class="row">
        <div class="col-lg-8">
            <?php if(session('error')): ?>
                <h3 class="alert alert-danger"><?php echo e(session('error')); ?></h3>
            <?php endif; ?>
            <div class="shadow">
                <div class="row pb-5 mb-4">
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                            <!-- Card-->
                            <div class="card rounded border-0">
                                <div class="card-body p-4">
                                    <?php if($product->quantity >= 1): ?>
                                        <label class="stock bg-success text-white p-1 rounded-3">In Stock</label>
                                    <?php else: ?>
                                        <label class="stock bg-danger text-white p-1 rounded-3">Out of Stock</label>
                                    <?php endif; ?>
                                    <div class="bg-white border">
                                        <img src="<?php echo e(asset('storage/' . $product->image)); ?>" class="w-100 h-100"
                                            alt="Img">
                                    </div>
                                    <hr>
                                    <p class="text-dark mb-0"><strong>CATEGORY:</strong>
                                        <?php echo e($product->productcategory->category_name); ?></p>
                                    <p class="text-dark mb-0"><strong>BRAND:</strong>
                                        <?php echo e($product->productbrand->brand); ?>

                                    </p>
                                    <p class="text-dark mb-0"><strong>MODEL:</strong> <?php echo e($product->model); ?></p>
                                    <p class="text-dark mb-0"><strong>Price:</strong> <?php echo e($product->price); ?>$</p>
                                    <p class="text-muted small mb-0"><strong>CPU:</strong> <?php echo e($product->cpu); ?></p>
                                    <p class="text-primary small mb-0"><strong>GPU:</strong> <?php echo e($product->gpu); ?></p>
                                    <p class="text-dark mb-0"><strong>RAM:</strong><?php echo e($product->ram); ?></p>
                                    <p class="text-muted small mb-0"><strong>WARRANTY
                                            YEARS</strong><?php echo e($product->official_warranty); ?>

                                    </p>

                                    <div class="d-flex justify-content-center mt-3">
                                        <div class="mt-2">
                                            <button type="button" wire:click="addToCard(<?php echo e($product->id); ?>)"
                                                class="btn btn1 btn-primary">
                                                <i class="fa fa-shopping-cart"></i> Add
                                            </button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
        <div class="col-4" wire:poll.keep-alive.4s>
            <div class="shadow p-2">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Products</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Sub Total</th>
                            <th scope="col">Remove</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php $__empty_1 = true; $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cartitem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <?php if($cartitem->product): ?>
                                <tr>
                                    <td><?php echo e($cartitem->product->model); ?></td>
                                    <td>$ <?php echo e($cartitem->product->price); ?></td>
                                    <td>
                                        <?php if($cartitem->quantity > 1): ?>
                                        <button type="button" class="btn btn1" wire:loading.attr="disabled"
                                            wire:click="decrementQuantity(<?php echo e($cartitem->id); ?>)"><i
                                                class="fa fa-minus"></i></button>
                                                <?php else: ?>
                                                <?php endif; ?>
                                        <?php echo e($cartitem->quantity); ?>

                                        <button type="button" class="btn btn1" wire:loading.attr="disabled"
                                            wire:click="incrementQuantity(<?php echo e($cartitem->id); ?>)"><i
                                                class="fa fa-plus"></i></button>
                                    </td>
                                    <td>
                                        $ <?php echo e($cartitem->product->price * $cartitem->quantity); ?>

                                        <?php $totalPrice += $cartitem->product->price * $cartitem->quantity  ?>
                                    </td>
                                    <td>
                                        <button type="button" wire:loading.attr="disabled"
                                            wire:click="removeCartItem( <?php echo e($cartitem->id); ?> )"
                                            class="btn btn-danger btn-sm">
                                            <span wire:loading.remove
                                                wire:target="removeCartItem( <?php echo e($cartitem->id); ?> )">
                                                <i class="fa fa-trash"></i>
                                            </span>
                                            <span wire:loading wire:target="removeCartItem( <?php echo e($cartitem->id); ?> )">
                                                <i class="fa fa-trash"></i>
                                            </span>
                                        </button>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <h5 class="p-4"> No Cart Item available</h5>
                        <?php endif; ?>

                    </tbody>
                </table>

                <?php if($totalPrice): ?>
                    <div class="row">
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
</div>
<?php /**PATH C:\Users\Seiv Yi\Downloads\dd\E_commerce\resources\views\livewire\pages\admin\sale\index.blade.php ENDPATH**/ ?>