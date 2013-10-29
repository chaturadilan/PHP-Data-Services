<div class="methodTypes view">
<h2><?php echo __('Method Type'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($methodType['MethodType']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($methodType['MethodType']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Alias'); ?></dt>
		<dd>
			<?php echo h($methodType['MethodType']['alias']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Http Methods'); ?></dt>
		<dd>
			<?php echo h($methodType['MethodType']['http_methods']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Method Type'), array('action' => 'edit', $methodType['MethodType']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Method Type'), array('action' => 'delete', $methodType['MethodType']['id']), null, __('Are you sure you want to delete # %s?', $methodType['MethodType']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Method Types'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Method Type'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Methods'), array('controller' => 'methods', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Method'), array('controller' => 'methods', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Methods'); ?></h3>
	<?php if (!empty($methodType['Method'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Command'); ?></th>
		<th><?php echo __('Http Methods'); ?></th>
		<th><?php echo __('Data Collections Id'); ?></th>
		<th><?php echo __('Method Type Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($methodType['Method'] as $method): ?>
		<tr>
			<td><?php echo $method['id']; ?></td>
			<td><?php echo $method['name']; ?></td>
			<td><?php echo $method['description']; ?></td>
			<td><?php echo $method['command']; ?></td>
			<td><?php echo $method['http_methods']; ?></td>
			<td><?php echo $method['data_collections_id']; ?></td>
			<td><?php echo $method['method_type_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'methods', 'action' => 'view', $method['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'methods', 'action' => 'edit', $method['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'methods', 'action' => 'delete', $method['id']), null, __('Are you sure you want to delete # %s?', $method['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Method'), array('controller' => 'methods', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
