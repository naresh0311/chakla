<div class="articleComments form">
<?php echo $this->Form->create('ArticleComment');?>
	<fieldset>
		<legend><?php __('Add Article Comment'); ?></legend>
	<?php
		echo $this->Form->input('article_id');
		echo $this->Form->input('comment');
		echo $this->Form->input('comment_by');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Article Comments', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Articles', true), array('controller' => 'articles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Article', true), array('controller' => 'articles', 'action' => 'add')); ?> </li>
	</ul>
</div>