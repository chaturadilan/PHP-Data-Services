<div class="methods view">
<h2><?php echo __('Method'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($method['Method']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($method['Method']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($method['Method']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Command'); ?></dt>
		<dd>
			<?php echo h($method['Method']['command']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Http Methods'); ?></dt>
		<dd>
			<?php echo h($method['Method']['http_methods']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Data Collections'); ?></dt>
		<dd>
			<?php echo $this->Html->link($method['DataCollections']['name'], array('controller' => 'data_collections', 'action' => 'view', $method['DataCollections']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Method Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($method['MethodType']['name'], array('controller' => 'method_types', 'action' => 'view', $method['MethodType']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Method'), array('action' => 'edit', $method['Method']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Method'), array('action' => 'delete', $method['Method']['id']), null, __('Are you sure you want to delete # %s?', $method['Method']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Methods'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Method'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Data Collections'), array('controller' => 'data_collections', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Data Collections'), array('controller' => 'data_collections', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Method Types'), array('controller' => 'method_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Method Type'), array('controller' => 'method_types', 'action' => 'add')); ?> </li>
	</ul>
</div>
