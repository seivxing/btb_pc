<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('style/button.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('style/footer.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('navbar/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('navbar/owl.carousel.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('navbar/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('navbar/fonts/icomoon/style.css')); ?>">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('style/body.css')); ?>">

    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::styles(); ?>

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
                            <li><a href="#home-section" class="nav-link">Home</a></li>



                            <li class="has-children">
                                <a href="<?php echo e(route('home')); ?>" class="nav-link">Brand</a>
                                <ul class="dropdown arrow-top">
                                    <?php $__currentLoopData = $brandname; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brandname): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        
                                        <li><a  class="nav-link"
                                            href="<?php echo e(route('brand.show', ['brand' => $brandname->brand])); ?>"><?php echo e($brandname->brand); ?></a>
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

$__html = app('livewire')->mount($__name, $__params, 'lw-3083813828-0', $__slots ?? [], get_defined_vars());

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

$__html = app('livewire')->mount($__name, $__params, 'lw-3083813828-1', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>)</a></li>
                                <li><a class="nav-link" href="<?php echo e(route('logout')); ?>"><i class="fas fa-truck"></i>Log Out</a>
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
    <h1><?php echo e($brand->brand); ?></h1>
    <div class="row">
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                <!-- Card-->
                <div class="card rounded border-0">

                    <div class="card-body p-4">
                        <?php if($product->quantity > 1): ?>
                            <label class="stock bg-success text-white p-1 rounded-3">In Stock</label>
                        <?php else: ?>
                            <label class="stock bg-danger text-white p-1 rounded-3">Out of Stock</label>
                        <?php endif; ?>
                        <img img src="<?php echo e(asset('storage/' . $product->image)); ?>" alt=""
                            class="img-fluid d-block mx-auto mb-3">
                        <hr>
                        <p class="text-dark mb-0"><strong>CATEGORY:</strong> <?php echo e($product->productcategory->category_name); ?></p>
                        <p class="text-dark mb-0"><strong>BRAND:</strong> <?php echo e($product->productbrand->brand); ?></p>
                        <p class="text-dark mb-0"><strong>MODEL:</strong> <?php echo e($product->model); ?></p>
                        <p class="text-dark mb-0"><strong>Price:</strong> <?php echo e($product->price); ?>$</p>
                        <p class="text-dark mb-0"><strong>CPU:</strong> <?php echo e($product->cpu); ?></p>
                        <p class="text-dark mb-0"><strong>GPU:</strong> <?php echo e($product->gpu); ?></p>
                        <p class="text-dark mb-0"><strong>RAM:</strong><?php echo e($product->ram); ?></p>
                        <p class="text-dark mb-0s"><strong>WARRANTY
                                YEARS: </strong><?php echo e($product->official_warranty); ?>

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
<script src="/jsnavbar/jquery-3.3.1.min.js"></script>
    <script src="/jsnavbar/popper.min.js"></script>
    <script src="/jsnavbar/bootstrap.min.js"></script>
    <script src="/jsnavbar/jquery.sticky.js"></script>
    <script src="/jsnavbar/main.js"></script>
    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::scripts(); ?>





<?php echo $__env->make('layout.user.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Seiv Yi\Downloads\dd\E_commerce\resources\views\brand\show.blade.php ENDPATH**/ ?>