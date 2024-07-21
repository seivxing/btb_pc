<?php $__env->startSection('setting', 'active'); ?>
<?php $__env->startSection('product_setting', 'active'); ?>

<?php $__env->startSection('content'); ?>

<?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('pages.admin.setting.product-setting', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-1994565270-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Seiv Yi\Downloads\dd\E_commerce\resources\views\pages\admin\setting\productSetting.blade.php ENDPATH**/ ?>