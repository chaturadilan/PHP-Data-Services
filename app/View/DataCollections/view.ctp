<div class="dataCollections view">
<h2><?php echo __('Data Collection'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($dataCollection['DataCollection']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($dataCollection['DataCollection']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($dataCollection['DataCollection']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Data App'); ?></dt>
		<dd>
			<?php echo $this->Html->link($dataCollection['DataApp']['name'], array('controller' => 'data_apps', 'action' => 'view', $dataCollection['DataApp']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Data Collection'), array('action' => 'edit', $dataCollection['DataCollection']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Data Collection'), array('action' => 'delete', $dataCollection['DataCollection']['id']), null, __('Are you sure you want to delete # %s?', $dataCollection['DataCollection']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Data Collections'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Data Collection'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Data Apps'), array('controller' => 'data_apps', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Data App'), array('controller' => 'data_apps', 'action' => 'add')); ?> </li>
	</ul>
</div>
