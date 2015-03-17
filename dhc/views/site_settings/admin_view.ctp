<div class="siteSettings view">
<h2><?php  __('Site Setting');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $siteSetting['SiteSetting']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Site Turn Option'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $siteSetting['SiteSetting']['site_turn_option']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Contact Email'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $siteSetting['SiteSetting']['contact_email']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Site Setting', true), array('action' => 'edit', $siteSetting['SiteSetting']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Site Setting', true), array('action' => 'delete', $siteSetting['SiteSetting']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $siteSetting['SiteSetting']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Site Settings', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Site Setting', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
