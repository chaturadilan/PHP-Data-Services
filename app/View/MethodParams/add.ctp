<div class="methodParams form">
<?php echo $this->Form->create('MethodParam'); ?>
	<fieldset>
		<legend><?php echo __('Add Method Param'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('description');
		echo $this->Form->input('validation');
		echo $this->Form->input('is_required');
		echo $this->Form->input('expression');
		echo $this->Form->input('method_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Method Params'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Methods'), array('controller' => 'methods', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Methods'), array('controller' => 'methods', 'action' => 'add')); ?> </li>
	</ul>
</div>
