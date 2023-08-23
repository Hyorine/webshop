<header class="PageHeader" style="">
    <div class="HeaderMainDiv" style="">
        <div>
            <img id="logoTag" src="<?php echo e(asset('Pictures/logo.jpg')); ?>" alt="Logo">
        </div>
       
        <div>
            <?php if(Auth::check()): ?>
                <?php echo $__env->make('loginMenu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php else: ?>
                <?php echo $__env->make('UnLoginMenu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
        </div>
    </div>
</header>
<?php /**PATH /home/vagrant/code/AH/resources/views/header.blade.php ENDPATH**/ ?>