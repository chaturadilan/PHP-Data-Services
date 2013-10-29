<div class="sources view">
<h2><?php echo __('Source'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($source['Source']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($source['Source']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($source['Source']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Params'); ?></dt>
		<dd>
			<?php echo h($source['Source']['params']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Source Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($source['SourceType']['name'], array('controller' => 'source_types', 'action' => 'view', $source['SourceType']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Source'), array('action' => 'edit', $source['Source']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Source'), array('action' => 'delete', $source['Source']['id']), null, __('Are you sure you want to delete # %s?', $source['Source']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Sources'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Source'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Source Types'), array('controller' => 'source_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Source Type'), array('controller' => 'source_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Data Apps'), array('controller' => 'data_apps', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Data App'), array('controller' => 'data_apps', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Data Apps'); ?></h3>
	<?php if (!empty($source['DataApp'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Source Id'); ?></th>
		<th><?php echo __('Secret'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($source['DataApp'] as $dataApp): ?>
		<tr>
			<td><?php echo $dataApp['id']; ?></td>
			<td><?php echo $dataApp['name']; ?></td>
			<td><?php echo $dataApp['description']; ?></td>
			<td><?php echo $dataApp['source_id']; ?></td>
			<td><?php echo $dataApp['secret']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'data_apps', 'action' => 'view', $dataApp['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'data_apps', 'action' => 'edit', $dataApp['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'data_apps', 'action' => 'delete', $dataApp['id']), null, __('Are you sure you want to delete # %s?', $dataApp['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Data App'), array('controller' => 'data_apps', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
