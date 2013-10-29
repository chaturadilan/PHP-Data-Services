<div class="methodParams view">
<h2><?php echo __('Method Param'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($methodParam['MethodParam']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($methodParam['MethodParam']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($methodParam['MethodParam']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Validation'); ?></dt>
		<dd>
			<?php echo h($methodParam['MethodParam']['validation']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Is Required'); ?></dt>
		<dd>
			<?php echo h($methodParam['MethodParam']['is_required']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Expression'); ?></dt>
		<dd>
			<?php echo h($methodParam['MethodParam']['expression']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Methods'); ?></dt>
		<dd>
			<?php echo $this->Html->link($methodParam['Methods']['name'], array('controller' => 'methods', 'action' => 'view', $methodParam['Methods']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Method Param'), array('action' => 'edit', $methodParam['MethodParam']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Method Param'), array('action' => 'delete', $methodParam['MethodParam']['id']), null, __('Are you sure you want to delete # %s?', $methodParam['MethodParam']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Method Params'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Method Param'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Methods'), array('controller' => 'methods', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Methods'), array('controller' => 'methods', 'action' => 'add')); ?> </li>
	</ul>
</div>
