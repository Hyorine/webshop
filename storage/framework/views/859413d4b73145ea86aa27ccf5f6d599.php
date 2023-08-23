<?php $__currentLoopData = $Products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="">
        <div class="ProductRightDiv"><img src="<?php echo e($Product->p_imageUrl); ?>" class="ProductIMG"></div>
        <div class="ProductLefttDiv">
            <h1>termék neve: <?php echo e($Product->p_name); ?></h1>
            <p>Termék ára: <?php echo e($Product->p_price); ?></p>
            <div>Leírás:<?php echo e($Product->p_description); ?></div>
            <button type="button" class="btn btn-light"><?php echo e(__('messages.PUpload')); ?></button>
        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH /home/vagrant/code/AH/resources/views/ItemsView.blade.php ENDPATH**/ ?>