<div>

    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>


    <header class="site-navbar js-sticky-header site-navbar-target" role="banner">

        <div class="container">
            <div class="row align-items-center position-relative">


                <div class="site-logo">
                    <a href="<?php echo e(route('home')); ?>" class="text-black"><span class="text-primary">BTB PC</a>
                </div>

                <div class="col-12">
                    <nav class="site-navigation text-right ml-auto " role="navigation">

                        <ul class="site-menu main-menu js-clone-nav ml-auto d-none d-lg-block">
                            <li><a href="<?php echo e(route('home')); ?>" class="nav-link">Home</a></li>



                            <li class="has-children">
                                <a href="#about-section" class="nav-link">Brand</a>
                                <ul class="dropdown arrow-top">
                                    <?php $__currentLoopData = $productbrands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productbrand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        
                                        <li><a  class="nav-link"
                                            wire:click="redirecToproductbrand(<?php echo e($productbrand->id); ?>)"value="<?php echo e($productbrand->id); ?>"><?php echo e($productbrand->brand); ?></a>
                                    </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </ul>
                            </li>

                            
                            <?php if(auth()->guard()->guest()): ?>
                                <?php if(Route::has('login')): ?>
                                    <li><a href="<?php echo e(route('login')); ?>" class="nav-link">Login</a></li>
                                <?php endif; ?>
                                <?php if(Route::has('register')): ?>
                                    <li><a href="<?php echo e(route('register')); ?>" class="nav-link">Register</a></li>
                                <?php endif; ?>
                            <?php endif; ?>

                            <?php if(auth()->guard()->check()): ?>
                                <li><a class="nav-link" href="<?php echo e(route('tracking_product')); ?>"><i
                                            class="fas fa-truck"></i>Tracking (<?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('pages.user.producttracking.product-tracking-count');

$__html = app('livewire')->mount($__name, $__params, 'lw-3270503701-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>)</a></li>
                                <li><a class="nav-link" href="<?php echo e(route('view_productcart')); ?>"><i
                                            class="fas fa-truck"></i>Cart (<?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('pages.user.productcart.product-cart-count');

$__html = app('livewire')->mount($__name, $__params, 'lw-3270503701-1', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>)</a></li>
                                <li><a class="nav-link" href="<?php echo e(route('logout')); ?>">Log Out</a>
                                </li>
                            <?php endif; ?>




                        </ul>

                    </nav>

                </div>

                <div class="toggle-button d-inline-block d-lg-none"><a href="#"
                        class="site-menu-toggle py-5 js-menu-toggle text-black"><span class="icon-menu h3"></span></a>
                </div>

            </div>
        </div>

    </header>

    <h2 class="font-weight-bold mb-2">From the Shop</h2>
    <p class="font-italic text-muted mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt.</p>

    <h2>Product</h2>
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
                        <img img src="<?php echo e(asset('storage/' . $product->image)); ?>" alt=""
                            class="img-fluid d-block mx-auto mb-3">
                        <hr>
                        <p class="text-dark mb-0"><strong>CATEGORY:</strong>
                            <?php echo e($product->productcategory->category_name); ?></p>
                        <p class="text-dark mb-0"><strong>BRAND:</strong> <?php echo e($product->productbrand->brand); ?></p>
                        <p class="text-dark mb-0"><strong>MODEL:</strong> <?php echo e($product->model); ?></p>
                        <p class="text-dark mb-0"><strong>Price:</strong> <?php echo e($product->price); ?>$</p>
                        <p class="text-muted small mb-0"><strong>CPU:</strong> <?php echo e($product->cpu); ?></p>
                        <p class="text-primary small mb-0"><strong>GPU:</strong> <?php echo e($product->gpu); ?></p>
                        <p class="text-dark mb-0"><strong>RAM:</strong><?php echo e($product->ram); ?></p>
                        <p class="text-muted small mb-0"><strong>WARRANTY
                                YEARS</strong><?php echo e($product->official_warranty); ?>

                        </p>

                        <div class="d-flex justify-content-center mt-3">
                            <div class="row">
                                <div class="col-sm-3">
                                    <a href="<?php echo e(route('viewdetailproduct', ['model' => $product->model])); ?>"
                                        class="btn btn-md">
                                        <span>View Detail</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>


</div>
<?php /**PATH C:\Users\Seiv Yi\Downloads\dd\E_commerce\resources\views\livewire\pages\user\allproduct.blade.php ENDPATH**/ ?>