<div class="dataApps view">
<h2><?php echo __('Data App'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($dataApp['DataApp']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($dataApp['DataApp']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($dataApp['DataApp']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Source'); ?></dt>
		<dd>
			<?php echo $this->Html->link($dataApp['Source']['name'], array('controller' => 'sources', 'action' => 'view', $dataApp['Source']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Secret'); ?></dt>
		<dd>
			<?php echo h($dataApp['DataApp']['secret']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Data App'), array('action' => 'edit', $dataApp['DataApp']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Data App'), array('action' => 'delete', $dataApp['DataApp']['id']), null, __('Are you sure you want to delete # %s?', $dataApp['DataApp']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Data Apps'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Data App'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Sources'), array('controller' => 'sources', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Source'), array('controller' => 'sources', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Data Collections'), array('controller' => 'data_collections', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Data Collection'), array('controller' => 'data_collections', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Data Collections'); ?></h3>
	<?php if (!empty($dataApp['DataCollection'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Data App Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($dataApp['DataCollection'] as $dataCollection): ?>
		<tr>
			<td><?php echo $dataCollection['id']; ?></td>
			<td><?php echo $dataCollection['name']; ?></td>
			<td><?php echo $dataCollection['description']; ?></td>
			<td><?php echo $dataCollection['data_app_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'data_collections', 'action' => 'view', $dataCollection['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'data_collections', 'action' => 'edit', $dataCollection['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'data_collections', 'action' => 'delete', $dataCollection['id']), null, __('Are you sure you want to delete # %s?', $dataCollection['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Data Collection'), array('controller' => 'data_collections', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
