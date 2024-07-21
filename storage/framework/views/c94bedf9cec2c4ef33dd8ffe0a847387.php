<?php $__env->startSection('content'); ?>

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
                                <?php $__currentLoopData = $brandnames; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brandname): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    
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

$__html = app('livewire')->mount($__name, $__params, 'lw-4274817530-0', $__slots ?? [], get_defined_vars());

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

$__html = app('livewire')->mount($__name, $__params, 'lw-4274817530-1', $__slots ?? [], get_defined_vars());

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

    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('pages.user.productcart.product-cart-show', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-4274817530-2', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.user.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Seiv Yi\Downloads\dd\E_commerce\resources\views\pages\user\productcart\index.blade.php ENDPATH**/ ?>