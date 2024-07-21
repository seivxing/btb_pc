<div class="sidebar pe-4 pb-3">

    <nav class="navbar bg-light navbar-light">
        <a href="<?php echo e(route('dashboard')); ?>" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary"><?php echo e(setting('app_name')); ?></h3>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="<?php echo e(asset('bs5/img/user.jpg')); ?>" alt=""
                    style="width: 40px; height: 40px;">
                <div
                    class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                </div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0">Jhon Doe</h6>
                <span>Admin</span>
            </div>
        </div>
        <div class="navbar-nav w-100">
            <a href="<?php echo e(route('dashboard')); ?>" class="nav-item nav-link"><i
                    class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
            
            
            
            
            <a href="<?php echo e(route('sale')); ?>" class="nav-item nav-link <?php echo $__env->yieldContent('sale'); ?>"><i
                    class="fa-solid fa-cart-shopping"></i>Directly Buy NEW</a>
            <a href="<?php echo e(route('directlybuy')); ?>" class="nav-item nav-link <?php echo $__env->yieldContent('directlybuy'); ?>"><i
                    class="fa-solid fa-cart-shopping"></i>Directly Buy</a>
            <a href="<?php echo e(route('productcategory_index')); ?>" class="nav-item nav-link <?php echo $__env->yieldContent('productcategory'); ?>"><i
                    class="fas fa-th-list"></i>Category</a>
            <a href="<?php echo e(route('product_index')); ?>" class="nav-item nav-link <?php echo $__env->yieldContent('product'); ?>"><i
                    class="fa-brands fa-product-hunt"></i>Product</a>
            <a href="<?php echo e(route('productbrand_index')); ?>" class="nav-item nav-link <?php echo $__env->yieldContent('productbrand'); ?>"><i
                    class="fas fa-keyboard"></i>Brand</a>
            
            <a href="<?php echo e(route('renewstockproduct')); ?>" class="nav-item nav-link <?php echo $__env->yieldContent('renewstockproduct'); ?>"><i
                    class="fa-solid fa-keyboard"></i>Renew Stock</a>
            <a href="<?php echo e(route('addstockproduct')); ?>" class="nav-item nav-link <?php echo $__env->yieldContent('addstockproduct'); ?>"><i
                    class="fas fa-keyboard"></i>Add Stock</a>
            
            <a href="<?php echo e(route('producttracking_index')); ?>" class="nav-item nav-link <?php echo $__env->yieldContent('producttracking'); ?>"><i
                    class="fas fa-map"></i> Product Tracking</a>
            <li class="nav-item">
                <a class="nav-link <?php echo $__env->yieldContent('setting'); ?>" data-bs-toggle="collapse" href="#ui-basic-1" aria-expanded="false"
                    aria-controls="ui-basic-1">
                    <i class="fas fa-cog"></i>
                    <span class="menu-title">Setting</span>
                </a>
                <div class="collapse" id="ui-basic-1">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link <?php echo $__env->yieldContent('introduction'); ?>"
                                href="<?php echo e(route('introduction_setting')); ?>"><i
                                    class="fas fa-desktop"></i>Introduction</a></li>
                        <li class="nav-item"> <a class="nav-link <?php echo $__env->yieldContent('general_Setting'); ?>"
                                href="<?php echo e(route('general_setting')); ?>"><i class="fas fa-tools"></i>General Setting</a>
                        </li>
                        <li class="nav-item"> <a class="nav-link <?php echo $__env->yieldContent('user_setting'); ?>"
                                href="<?php echo e(route('user_setting')); ?>"><i class="fas fa-user-cog"></i>User Setting</a></li>
                        <li class="nav-item"> <a class="nav-link <?php echo $__env->yieldContent('product_setting'); ?>"
                                href="<?php echo e(route('product_setting')); ?>"><i class="fas fa-wrench"></i>Product Setting</a>
                        </li>
                        
                    </ul>
                </div>
            </li>
            
            <li class="nav-item">
                <a class="nav-link <?php echo $__env->yieldContent('setting'); ?>" data-bs-toggle="collapse" href="#ui-basic-2"
                    aria-expanded="false" aria-controls="ui-basic-1">
                    <i class="fa-solid fa-flag"></i>
                    <span class="menu-title">Report</span>
                </a>
                <div class="collapse" id="ui-basic-2">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link <?php echo $__env->yieldContent('orderrecord'); ?>"
                                href="<?php echo e(route('order_record_quantity')); ?>"><i
                                    class="fa-solid fa-rectangle-list"></i>Order Record</a>
                        </li>
                        <li class="nav-item"> <a class="nav-link <?php echo $__env->yieldContent('salerecord'); ?>"
                                href="<?php echo e(route('sale_record_quantity')); ?>"><i class="fa-solid fa-table-list"></i>Sale
                                Record</a>
                        </li>


                    </ul>
                </div>
            </li>

            <a href="" class="nav-item nav-link">######</a>
            
            
        </div>
    </nav>
</div>
<?php /**PATH C:\Users\Seiv Yi\Downloads\dd\E_commerce\resources\views\layout\admin\sidebar.blade.php ENDPATH**/ ?>