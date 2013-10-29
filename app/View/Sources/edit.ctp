<div class="sources form">
<?php echo $this->Form->create('Source'); ?>
	<fieldset>
		<legend><?php echo __('Edit Source'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('description');
		echo $this->Form->input('params');
		echo $this->Form->input('source_type_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Source.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Source.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Sources'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Source Types'), array('controller' => 'source_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Source Type'), array('controller' => 'source_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Data Apps'), array('controller' => 'data_apps', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Data App'), array('controller' => 'data_apps', 'action' => 'add')); ?> </li>
	</ul>
</div>
