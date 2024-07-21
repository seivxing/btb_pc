<!doctype html>
<html lang="en">

<head>
    <title><?php echo e(setting('title_name')); ?></title>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="https://btb_pc_store.railway.internal/style/button.css">
    <link rel="stylesheet" href="https://btb_pc_store.railway.internal/style/footer.css">
    <link rel="stylesheet" href="https://btb_pc_store.railway.internal/navbar/bootstrap.min.css">
    <link rel="stylesheet" href="https://btb_pc_store.railway.internal/navbar/owl.carousel.min.css">
    <link rel="stylesheet" href="https://btb_pc_store.railway.internal/navbar/style.css">
    <link rel="stylesheet" href="https://btb_pc_store.railway.internal/navbar/fonts/icomoon/style.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://btb_pc_store.railway.internal/style/body.css">


    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::styles(); ?>



</head>

<body>
    <!--Content Start -->
    <!-- resources/views/home.blade.php -->
    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>
    <!-- Rest of your home view content -->

    <div>
        <?php echo $__env->yieldContent('content'); ?>
    </div>
    <!--Content End -->


    <!--Footer Start-->
    <?php echo $__env->make('layout.user.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!--Footer End-->


    <script src="/jsnavbar/jquery-3.3.1.min.js"></script>
    <script src="/jsnavbar/popper.min.js"></script>
    <script src="/jsnavbar/bootstrap.min.js"></script>
    <script src="/jsnavbar/jquery.sticky.js"></script>
    <script src="/jsnavbar/main.js"></script>
    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::scripts(); ?>

</body>

</html>
<?php /**PATH C:\Users\Seiv Yi\Downloads\dd\E_commerce\resources\views\layout\user\app.blade.php ENDPATH**/ ?>