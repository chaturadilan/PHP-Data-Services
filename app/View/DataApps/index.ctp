<div class="dataApps index">
	<h2><?php echo __('Data Apps'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th><?php echo $this->Paginator->sort('source_id'); ?></th>
			<th><?php echo $this->Paginator->sort('secret'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($dataApps as $dataApp): ?>
	<tr>
		<td><?php echo h($dataApp['DataApp']['id']); ?>&nbsp;</td>
		<td><?php echo h($dataApp['DataApp']['name']); ?>&nbsp;</td>
		<td><?php echo h($dataApp['DataApp']['description']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($dataApp['Source']['name'], array('controller' => 'sources', 'action' => 'view', $dataApp['Source']['id'])); ?>
		</td>
		<td><?php echo h($dataApp['DataApp']['secret']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $dataApp['DataApp']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $dataApp['DataApp']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $dataApp['DataApp']['id']), null, __('Are you sure you want to delete # %s?', $dataApp['DataApp']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Data App'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Sources'), array('controller' => 'sources', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Source'), array('controller' => 'sources', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Data Collections'), array('controller' => 'data_collections', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Data Collection'), array('controller' => 'data_collections', 'action' => 'add')); ?> </li>
	</ul>
</div>
