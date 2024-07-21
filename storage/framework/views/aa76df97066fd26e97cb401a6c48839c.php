<?php $__env->startSection('content'); ?>

<section class="ftco-section">
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="<?php echo e(route('home')); ?>">BTB PC</a>
            <form action="#" class="searchform order-sm-start order-lg-last">
                <div class="form-group d-flex">
                    <input type="text" class="form-control pl-3" placeholder="Search">
                    <button type="submit" placeholder="" class="form-control search"><span
                            class="fa fa-search"></span></button>
                </div>
            </form>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="fa fa-bars"></span> Menu
            </button>
            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav m-auto">
                    <li class="nav-item active"><a href="#" class="nav-link">Home</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">Brand</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown04">

                            <?php $__currentLoopData = $categoryname; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoryname): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a class="dropdown-item"
                                    href="<?php echo e(route('category.show', ['category' => $categoryname->category_name])); ?>">
                                    <?php echo e($categoryname->category_name); ?>

                                </a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>

                    </li>

                </ul>



            </div>
            <ul class="nav justify-content-end">
                <li class="nav-item">
                    <ul class="navbar-nav ms-auto">
                        <?php if(auth()->guard()->guest()): ?>
                            <?php if(Route::has('login')): ?>
                                <li class="nav-item mr-3">
                                    <a href="<?php echo e(route('login')); ?>" class="nav-item"><?php echo e(__('Login')); ?></a>
                                </li>
                            <?php endif; ?>

                            <?php if(Route::has('register')): ?>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('register')); ?>" class="nav-item"><?php echo e(__('Register')); ?></a>
                                </li>
                            <?php endif; ?>
                        <?php else: ?>
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('tracking.show')); ?>">
                                    <i class="fas fa-truck"></i>Tracking (<?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('tracking-count');

$__html = app('livewire')->mount($__name, $__params, 'lw-739296319-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>)
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('view_cart')); ?>">
                                    <i class="fas fa-shopping-cart"></i>Cart (<?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('pages.user.cart.cart-count', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-739296319-1', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>)
                                </a>
                            </li>
                        </ul>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false"><?php echo e(Auth::user()->name); ?></a>
                            <div class="dropdown-menu" aria-labelledby="dropdown04">
                                        <a class="dropdown-item" href="<?php echo e(route('logout')); ?>" class="dropdown-item">Log Out</a>

                            </div>

                        </li>
                        <?php endif; ?>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <!-- END nav -->
</section>

    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('pages.user.cart.cart-show', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-739296319-2', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.user.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Seiv Yi\Downloads\dd\E_commerce\resources\views\pages\user\cart\index.blade.php ENDPATH**/ ?>