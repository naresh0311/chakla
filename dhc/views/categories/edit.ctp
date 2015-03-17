<div class="categories form">
<?php echo $this->Form->create('Category');?>
	<fieldset>
		<legend><?php __('Edit Category'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('category_name');
		echo $this->Form->input('category_verdict');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Category.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Category.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Categories', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Category Images', true), array('controller' => 'category_images', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category Image', true), array('controller' => 'category_images', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List News', true), array('controller' => 'news', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New News', true), array('controller' => 'news', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pages', true), array('controller' => 'pages', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Page', true), array('controller' => 'pages', 'action' => 'add')); ?> </li>
	</ul>
</div>