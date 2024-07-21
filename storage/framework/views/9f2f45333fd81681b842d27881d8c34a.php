<div>
    <div class="py-3 py-md-5">
        <div class="container">
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
            <div class="row">
                <div class="col-md-5 mt-3">
                    <div class="bg-white border">
                        <img src="<?php echo e(asset('storage/' . $product->image)); ?>" class="w-100 h-100" alt="Img">
                    </div>
                </div>
                <div class="col-md-7 mt-3">
                    <div class="product-view">
                        <h4 class="product-name">
                            <?php echo e($product->model); ?>

                            <label class="label-stock bg-success">In Stock</label>
                        </h4>
                        <hr>
                        <p class="product-path">
                            Home / Category / product/ <?php echo e($product->model); ?>

                        </p>
                        <div>
                            <span class="selling-price">$<?php echo e($product->price); ?></span>
                            <p class="text-dark mb-0"><strong>MODEL:</strong> <?php echo e($product->model); ?></p>
                            <p class="text-dark mb-0"><strong>Color:</strong> <?php echo e($product->color); ?></p>
                            <p class="text-dark mb-0"><strong>Price:</strong> <?php echo e($product->price); ?>$</p>
                            <p class="text-dark mb-0"><strong>CPU:</strong> <?php echo e($product->gpu); ?></p>
                            <p class="text-dark mb-0"><strong>GPU:</strong> <?php echo e($product->gpu); ?></p>
                            <p class="text-dark mb-0"><strong>RAM:</strong><?php echo e($product->ram); ?></p>
                            <p class="text-dark mb-0"><strong>WARRANTY
                                    YEARS:</strong><?php echo e($product->official_warranty); ?>

                                
                        </div>
                        <div class="mt-2">
                            <div class="input-group">
                                <span class="btn btn1" wire:click="decrementQuantity"><i class="fa fa-minus"></i></span>
                                <input type="text" wire:click="quantityCount" value="<?php echo e($this->quantityCount); ?>"
                                    readonly class="input-quantity" />
                                <span class="btn btn1" wire:click="incrementQuantity"><i class="fa fa-plus"></i></span>
                            </div>
                        </div>
                        <div class="mt-2">
                            <button type="button" wire:click="addToCard(<?php echo e($product->id); ?>)" class="btn btn1">
                                <i class="fa fa-shopping-cart"></i> Add To Cart
                            </button>
                            <a href="" class="btn btn1"> <i class="fa fa-heart"></i> Add To Wishlist </a>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mt-3">
                    <div class="card">
                        <div class="card-header bg-white">
                            <h4>Description</h4>
                        </div>
                        <div class="card-body">
                            <p>
                                <?php echo e($product->description); ?>

                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\Seiv Yi\Downloads\dd\E_commerce\resources\views\livewire\pages\user\view-product.blade.php ENDPATH**/ ?>