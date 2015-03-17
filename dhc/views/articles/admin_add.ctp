<div class="articles form">
<?php echo $this->Form->create('Article');?>
	<fieldset>
		<legend><?php __('Add Article'); ?></legend>
	<?php
		echo $this->Form->input('article_type_id');
		echo $this->Form->input('category_id');
		echo $this->Form->input('article_name');
		echo $this->Form->input('content');
		echo $this->Form->input('keywords');
		echo $this->Form->input('description');
		echo $this->Form->input('article_template_id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('news_type_id');
		echo $this->Form->input('modified_by');
		echo $this->Form->input('url');
		echo $this->Form->input('position');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Articles', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Article Types', true), array('controller' => 'article_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Article Type', true), array('controller' => 'article_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories', true), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category', true), array('controller' => 'categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Article Templates', true), array('controller' => 'article_templates', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Article Template', true), array('controller' => 'article_templates', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List News Types', true), array('controller' => 'news_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New News Type', true), array('controller' => 'news_types', 'action' => 'add')); ?> </li>
	</ul>
</div>