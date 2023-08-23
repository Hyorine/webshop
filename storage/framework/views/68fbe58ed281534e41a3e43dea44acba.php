<?php if(isset($ItemOp)): ?>
	<?php switch($ItemOp):
		case ('add'): ?>
			<?php echo $__env->make('ItemAddForm', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<?php break; ?>
		<?php case ('viewAll'): ?>
			<?php echo $__env->make('ItemsView', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<?php break; ?>
        <?php default: ?>
        
        <?php break; ?>
	<?php endswitch; ?>
<?php else: ?>
	
<?php endif; ?><?php /**PATH /home/vagrant/code/AH/resources/views/ItemOperation.blade.php ENDPATH**/ ?>