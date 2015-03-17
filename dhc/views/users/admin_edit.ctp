<!--Header And content-->
<div class="content-box">

<div class="content-box-header">
<h3 style="cursor: s-resize;">Edit User</h3>

<div class="clear"></div>
</div>
			

<div class="content-box-content" style="display: block;">
<?php if ($this->Session->check('Message.flash')):?>
<div class="notification success png_bg">
<?php echo $this->Html->image("icons/cross_grey_small.png",array('url'=>'#','class'=>'close','title'=>"Close this notification", 'alt'=>"close", 'onclick'=>'slide_up();'));?>
<div>
	<?php echo $this->Session->flash()?>
</div>
</div>
<?php endif; ?>



<?php echo $this->Form->create('User');?>
	<fieldset>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('first_name');
		echo $this->Form->input('last_name');
		echo $this->Form->input('username');
		//echo $this->Form->input('password');
		echo $this->Form->input('email');
		?>
		<div><b>Permissions</b></div>
		<div><table><tr><td><input type=checkbox name="data[User][permission_catogories]" value=1 <?php if($this->data['User']['permission_catogories']==1) { echo "checked";}?>>Catogories</td>
		<td><input type=checkbox name="data[User][permission_pages]" value=1 <?php if($this->data['User']['permission_pages']==1) { echo "checked";}?>>Pages</td>
		<td><input type=checkbox name="data[User][permission_news]" value=1 <?php if($this->data['User']['permission_news']==1) { echo "checked";}?>>News</td>
		<td><input type=checkbox name="data[User][permission_home_rotator]" value=1 <?php if($this->data['User']['permission_home_rotator']==1) { echo "checked";}?>>Home Rotator</td>
		<td><input type=checkbox name="data[User][permission_static_pages]" value=1 <?php if($this->data['User']['permission_static_pages']==1) { echo "checked";}?>>Static Pages</td>
		<td><input type=checkbox name="data[User][modification_email_status]" value=1 <?php if($this->data['User']['modification_email_status']==1) { echo "checked";}?>>Email Status</td>
		</td></tr></table>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>

</div>
</div>