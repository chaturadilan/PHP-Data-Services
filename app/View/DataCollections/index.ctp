<div class="dataCollections index">
	<h2><?php echo __('Data Collections'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th><?php echo $this->Paginator->sort('data_app_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($dataCollections as $dataCollection): ?>
	<tr>
		<td><?php echo h($dataCollection['DataCollection']['id']); ?>&nbsp;</td>
		<td><?php echo h($dataCollection['DataCollection']['name']); ?>&nbsp;</td>
		<td><?php echo h($dataCollection['DataCollection']['description']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($dataCollection['DataApp']['name'], array('controller' => 'data_apps', 'action' => 'view', $dataCollection['DataApp']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $dataCollection['DataCollection']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $dataCollection['DataCollection']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $dataCollection['DataCollection']['id']), null, __('Are you sure you want to delete # %s?', $dataCollection['DataCollection']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Data Collection'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Data Apps'), array('controller' => 'data_apps', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Data App'), array('controller' => 'data_apps', 'action' => 'add')); ?> </li>
	</ul>
</div>
