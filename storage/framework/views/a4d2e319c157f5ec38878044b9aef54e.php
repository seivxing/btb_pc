

<?php $__env->startSection('sale','active'); ?>

<?php $__env->startSection('content'); ?>

<?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('pages.admin.sale.index', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-618897454-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Seiv Yi\Downloads\dd\E_commerce\resources\views\pages\admin\sale\index.blade.php ENDPATH**/ ?>