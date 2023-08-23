<?php if(isset($modul)): ?>
	<?php switch($modul):
		case ('registration'): ?>
			<?php echo $__env->make('registrationForm', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<?php break; ?>
		<?php case ('Item'): ?>
			<?php echo $__env->make('ItemView', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<?php break; ?>
		<?php case ('error'): ?>
			<?php echo $__env->make('error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<?php break; ?>
        <?php default: ?>
        <?php break; ?>
	<?php endswitch; ?>
<?php else: ?>
	
<?php endif; ?><?php /**PATH /home/vagrant/code/AH/resources/views/content.blade.php ENDPATH**/ ?>