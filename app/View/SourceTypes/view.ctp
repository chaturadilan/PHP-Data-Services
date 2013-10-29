<div class="sourceTypes view">
<h2><?php echo __('Source Type'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($sourceType['SourceType']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($sourceType['SourceType']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($sourceType['SourceType']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Init Params'); ?></dt>
		<dd>
			<?php echo h($sourceType['SourceType']['init_params']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Source Type'), array('action' => 'edit', $sourceType['SourceType']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Source Type'), array('action' => 'delete', $sourceType['SourceType']['id']), null, __('Are you sure you want to delete # %s?', $sourceType['SourceType']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Source Types'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Source Type'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Sources'), array('controller' => 'sources', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Source'), array('controller' => 'sources', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Sources'); ?></h3>
	<?php if (!empty($sourceType['Source'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Params'); ?></th>
		<th><?php echo __('Source Type Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($sourceType['Source'] as $source): ?>
		<tr>
			<td><?php echo $source['id']; ?></td>
			<td><?php echo $source['name']; ?></td>
			<td><?php echo $source['description']; ?></td>
			<td><?php echo $source['params']; ?></td>
			<td><?php echo $source['source_type_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'sources', 'action' => 'view', $source['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'sources', 'action' => 'edit', $source['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'sources', 'action' => 'delete', $source['id']), null, __('Are you sure you want to delete # %s?', $source['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Source'), array('controller' => 'sources', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
