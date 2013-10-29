<div class="methodTypes form">
<?php echo $this->Form->create('MethodType'); ?>
	<fieldset>
		<legend><?php echo __('Add Method Type'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('alias');
		echo $this->Form->input('http_methods');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Method Types'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Methods'), array('controller' => 'methods', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Method'), array('controller' => 'methods', 'action' => 'add')); ?> </li>
	</ul>
</div>
