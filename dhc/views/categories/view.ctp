<div class="categories view">
<h2><?php  __('Category');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $category['Category']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Category Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $category['Category']['category_name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Category Verdict'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $category['Category']['category_verdict']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Position'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $category['Category']['position']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Category', true), array('action' => 'edit', $category['Category']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Category', true), array('action' => 'delete', $category['Category']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $category['Category']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Category Images', true), array('controller' => 'category_images', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category Image', true), array('controller' => 'category_images', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List News', true), array('controller' => 'news', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New News', true), array('controller' => 'news', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pages', true), array('controller' => 'pages', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Page', true), array('controller' => 'pages', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Category Images');?></h3>
	<?php if (!empty($category['CategoryImage'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Category Id'); ?></th>
		<th><?php __('Image'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($category['CategoryImage'] as $categoryImage):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $categoryImage['id'];?></td>
			<td><?php echo $categoryImage['category_id'];?></td>
			<td><?php echo $categoryImage['image'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'category_images', 'action' => 'view', $categoryImage['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'category_images', 'action' => 'edit', $categoryImage['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'category_images', 'action' => 'delete', $categoryImage['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $categoryImage['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Category Image', true), array('controller' => 'category_images', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Related News');?></h3>
	<?php if (!empty($category['News'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Title'); ?></th>
		<th><?php __('Date'); ?></th>
		<th><?php __('Category Id'); ?></th>
		<th><?php __('Writer'); ?></th>
		<th><?php __('Content'); ?></th>
		<th><?php __('Keywords'); ?></th>
		<th><?php __('Description'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($category['News'] as $news):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $news['id'];?></td>
			<td><?php echo $news['title'];?></td>
			<td><?php echo $news['date'];?></td>
			<td><?php echo $news['category_id'];?></td>
			<td><?php echo $news['writer'];?></td>
			<td><?php echo $news['content'];?></td>
			<td><?php echo $news['keywords'];?></td>
			<td><?php echo $news['description'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'news', 'action' => 'view', $news['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'news', 'action' => 'edit', $news['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'news', 'action' => 'delete', $news['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $news['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New News', true), array('controller' => 'news', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Related Pages');?></h3>
	<?php if (!empty($category['Page'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Category Id'); ?></th>
		<th><?php __('Page Name'); ?></th>
		<th><?php __('Modified'); ?></th>
		<th><?php __('Content'); ?></th>
		<th><?php __('Keywords'); ?></th>
		<th><?php __('Description'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($category['Page'] as $page):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $page['id'];?></td>
			<td><?php echo $page['category_id'];?></td>
			<td><?php echo $page['page_name'];?></td>
			<td><?php echo $page['modified'];?></td>
			<td><?php echo $page['content'];?></td>
			<td><?php echo $page['keywords'];?></td>
			<td><?php echo $page['description'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'pages', 'action' => 'view', $page['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'pages', 'action' => 'edit', $page['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'pages', 'action' => 'delete', $page['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $page['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Page', true), array('controller' => 'pages', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
