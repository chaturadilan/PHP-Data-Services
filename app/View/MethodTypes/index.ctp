<div class="methodTypes index">
	<h2><?php echo __('Method Types'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('alias'); ?></th>
			<th><?php echo $this->Paginator->sort('http_methods'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($methodTypes as $methodType): ?>
	<tr>
		<td><?php echo h($methodType['MethodType']['id']); ?>&nbsp;</td>
		<td><?php echo h($methodType['MethodType']['name']); ?>&nbsp;</td>
		<td><?php echo h($methodType['MethodType']['alias']); ?>&nbsp;</td>
		<td><?php echo h($methodType['MethodType']['http_methods']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $methodType['MethodType']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $methodType['MethodType']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $methodType['MethodType']['id']), null, __('Are you sure you want to delete # %s?', $methodType['MethodType']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Method Type'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Methods'), array('controller' => 'methods', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Method'), array('controller' => 'methods', 'action' => 'add')); ?> </li>
	</ul>
</div>
