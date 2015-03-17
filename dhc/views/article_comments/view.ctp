<div class="articleComments view">
<h2><?php  __('Article Comment');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $articleComment['ArticleComment']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Article'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($articleComment['Article']['id'], array('controller' => 'articles', 'action' => 'view', $articleComment['Article']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Comment'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $articleComment['ArticleComment']['comment']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Comment By'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $articleComment['ArticleComment']['comment_by']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Article Comment', true), array('action' => 'edit', $articleComment['ArticleComment']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Article Comment', true), array('action' => 'delete', $articleComment['ArticleComment']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $articleComment['ArticleComment']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Article Comments', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Article Comment', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Articles', true), array('controller' => 'articles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Article', true), array('controller' => 'articles', 'action' => 'add')); ?> </li>
	</ul>
</div>
