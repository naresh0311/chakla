<div class="categoryImages view">
<h2><?php  __('Category Image');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $categoryImage['CategoryImage']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Category'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($categoryImage['Category']['id'], array('controller' => 'categories', 'action' => 'view', $categoryImage['Category']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Image'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $categoryImage['CategoryImage']['image']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Category Image', true), array('action' => 'edit', $categoryImage['CategoryImage']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Category Image', true), array('action' => 'delete', $categoryImage['CategoryImage']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $categoryImage['CategoryImage']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Category Images', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category Image', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories', true), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category', true), array('controller' => 'categories', 'action' => 'add')); ?> </li>
	</ul>
</div>
