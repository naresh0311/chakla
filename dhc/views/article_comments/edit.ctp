<div class="articleComments form">
<?php echo $this->Form->create('ArticleComment');?>
	<fieldset>
		<legend><?php __('Edit Article Comment'); ?></legend>
	<?php
		echo $this->Form->input('id');
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

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('ArticleComment.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('ArticleComment.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Article Comments', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Articles', true), array('controller' => 'articles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Article', true), array('controller' => 'articles', 'action' => 'add')); ?> </li>
	</ul>
</div>