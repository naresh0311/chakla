<!--Search Box-->
<div class="content-box" style="width:350px">
<?php echo $this->Session->flash(); ?>
<div class="content-box-header">
<h3 style="cursor: s-resize;">Search Users</h3>
<div class="clear"></div>
</div>
<div class="content-box-content" style="display: block;">
<input type="text" class="text-input" name="data[Order][cname]" value="<?php echo $this->data['Order']['cname']?>" />
<input class="button" type="submit" value="Find User" onClick = "return check_search_orders()" name="data[Order][search]" style="margin-right:3px" /></div>
</div>
<!--End Search Box-->

<!--Header And content-->
<div class="content-box">
<?php echo $this->Session->flash(); ?>
<div class="content-box-header">
<h3 style="cursor: s-resize;">Users</h3>
<ul class="content-box-tabs">
<li>
<a class="" href="#tab1">List Users</a>
</li>
<li>
<a class="default-tab current" href="#tab2">Add User</a>
</li>
</ul>
<div class="clear"></div>
</div>
			

<div class="content-box-content" style="display: block;">
<div id="tab2" class="tab-content default-tab">
<div>
<?php echo $this->Form->create('User');?>
	<fieldset>
		<legend><?php __('Add User'); ?></legend>
	<?php
		echo $this->Form->input('first_name');
		echo $this->Form->input('last_name');
		echo $this->Form->input('username');
		echo $this->Form->input('password');
		echo $this->Form->input('email');
		echo $this->Form->input('permission_catogories');
		echo $this->Form->input('permission_pages');
		echo $this->Form->input('permission_news');
		echo $this->Form->input('permission_home_rotator');
		echo $this->Form->input('permission_static_pages');
		echo $this->Form->input('modification_email_status');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Users', true), array('action' => 'index'));?></li>
	</ul>
</div>
</div>
</div>
</div>