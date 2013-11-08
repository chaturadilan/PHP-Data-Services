<div class="methodParams index">
	<h2><?php echo __('Method Params'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th><?php echo $this->Paginator->sort('validation'); ?></th>
			<th><?php echo $this->Paginator->sort('is_required'); ?></th>
			<th><?php echo $this->Paginator->sort('expression'); ?></th>
			<th><?php echo $this->Paginator->sort('method_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($methodParams as $methodParam): ?>
	<tr>
		<td><?php echo h($methodParam['MethodParam']['id']); ?>&nbsp;</td>
		<td><?php echo h($methodParam['MethodParam']['name']); ?>&nbsp;</td>
		<td><?php echo h($methodParam['MethodParam']['description']); ?>&nbsp;</td>
		<td><?php echo h($methodParam['MethodParam']['validation']); ?>&nbsp;</td>
		<td><?php echo h($methodParam['MethodParam']['is_required']); ?>&nbsp;</td>
		<td><?php echo h($methodParam['MethodParam']['expression']); ?>&nbsp;</td>
		<td><?php echo h($methodParam['MethodParam']['method_id']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $methodParam['MethodParam']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $methodParam['MethodParam']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $methodParam['MethodParam']['id']), null, __('Are you sure you want to delete # %s?', $methodParam['MethodParam']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Method Param'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Methods'), array('controller' => 'methods', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Methods'), array('controller' => 'methods', 'action' => 'add')); ?> </li>
	</ul>
</div>
