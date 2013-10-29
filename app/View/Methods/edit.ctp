<div class="methods form">
<?php echo $this->Form->create('Method'); ?>
	<fieldset>
		<legend><?php echo __('Edit Method'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('description');
		echo $this->Form->input('command');
		echo $this->Form->input('http_methods');
		echo $this->Form->input('data_collections_id');
		echo $this->Form->input('method_type_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Method.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Method.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Methods'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Data Collections'), array('controller' => 'data_collections', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Data Collections'), array('controller' => 'data_collections', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Method Types'), array('controller' => 'method_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Method Type'), array('controller' => 'method_types', 'action' => 'add')); ?> </li>
	</ul>
</div>
