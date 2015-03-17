<?php
//echo "<pre>";//print_r($users);
?>
<!--Search Box-->

<div class="content-box" style="width:350px">
<div class="content-box-header">
<h3 style="cursor: s-resize;">Search Users</h3>
<div class="clear"></div>
</div>
<div class="content-box-content" style="display: block;">
<?php echo $this->Form->create('User');?>
<input type="text" class="text-input" name="data[User][cname]" />
<input class="button" type="submit" value="Find User" name="data[User][search]" style="margin-right:3px" /></div>
</form>
</div>
<!--End Search Box-->

<!--Header And content-->
<div class="content-box">

<div class="content-box-header">
<h3 style="cursor: s-resize;">Users</h3>
<ul class="content-box-tabs">
<li>
<a class="<?php echo $tabValues[0];?>" href="#tab1">List Users</a>
</li>
<li>
<a class="<?php echo $tabValues[1];?>" href="#tab2">Add User</a>
</li>
</ul>
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

<div id="tab1" class="<?php echo $tabValues[2];?>">
<?php echo $this->Form->create('User');?>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<td style="border-bottom:0;"><input class="check-all" type="checkbox"></td>
			<th><?php echo $this->Paginator->sort('first_name');?></th>
			<th><?php echo $this->Paginator->sort('last_name');?></th>
			<th><?php echo $this->Paginator->sort('username');?></th>
			<!--<th><?php echo $this->Paginator->sort('password');?></th>-->
			<th><?php echo $this->Paginator->sort('email');?></th>
			<!--
			<th><?php echo $this->Paginator->sort('permission_catogories');?></th>
			<th><?php echo $this->Paginator->sort('permission_pages');?></th>
			<th><?php echo $this->Paginator->sort('permission_news');?></th>
			<th><?php echo $this->Paginator->sort('permission_home_rotator');?></th>
			<th><?php echo $this->Paginator->sort('permission_static_pages');?></th>
			<th><?php echo $this->Paginator->sort('modification_email_status');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			-->
			<th class="actions" align=center></th>
	</tr>
	<?php
	$i = 0;
	foreach ($users as $user):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><input type=checkbox name="data[User][id][]" value="<?php echo $user['User']['id']; ?>" ></td>
		<td><?php echo $user['User']['first_name']; ?></td>
		<td><?php echo $user['User']['last_name']; ?></td>
		<td><?php echo $user['User']['username']; ?></td>
		<!--<td><?php echo $user['User']['password']; ?></td>-->
		<td><?php echo $user['User']['email']; ?></td>
		<!--
		<td><?php echo $user['User']['permission_catogories']; ?></td>
		<td><?php echo $user['User']['permission_pages']; ?></td>
		<td><?php echo $user['User']['permission_news']; ?></td>
		<td><?php echo $user['User']['permission_home_rotator']; ?></td>
		<td><?php echo $user['User']['permission_static_pages']; ?></td>
		<td><?php echo $user['User']['modification_email_status']; ?></td>
		<td><?php echo $user['User']['created']; ?></td>
		<td><?php echo $user['User']['modified']; ?></td>
		-->
		<td>
			<?php echo $this->Html->image("icons/pencil.png", array( "alt" => "Edit", 'url' => array('action' => 'edit', $user['User']['id']))); ?>
            <?php echo $this->Html->image("icons/cross.png", array( "alt" => "Delete", 'url' => array('action' => 'delete', $user['User']['id']),'onClick'=>'return confirm("Are you sure you wish to delete this record?");')); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	/*
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	*/
	?>	</p>

	<div style="clear:both;padding:0;"></div><div class="paging" style="clear:none;">
	
		<div style="float:left;width:200px;clear:none;">
		<input class="button" type="submit" value="Delete" name="data[User][Delete]" style="width:150px; margin-right:3px"  onClick="return confirm('Are You Sure To Delete');" />
		</div>
	
	<div style="clear:none;float:left;<?php if(strlen(trim($this->Paginator->numbers(array('class' => 'number'))))>0){}else{ echo "display:none;";} ?>">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
	
	
	</div><div style="clear:both;padding:0;"></div>
</form>
</div>
<div id="tab2" class="<?php echo $tabValues[3];?>">

<div >
<?php echo $this->Form->create('User');?>
<fieldset>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('first_name');
		echo $this->Form->input('last_name');
		echo $this->Form->input('username');
		?>
		
		<div class="input password required">
		<label for="UserPassword">Password</label>
		<input id="UserPassword" type="password" value="<?php echo $tabValues[4]; ?>" name="data[User][password]">
		<div class="error-message" <?php if(isset($_POST['data']['User']['password']) && trim($_POST['data']['User']['password'])=="") {echo "style=\"display:block\""; } else {echo "style=\"display:none\""; } ?>>Please Enter Password</div>
		</div>
		
		<?php
		//echo $this->Form->input('password' , array('type' => 'password', 'value'=>$tabValues[4]));
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
<div class="submit"><input type="submit" value="Submit" name="data[User][submit]" /></div></form>
</div>
</div>
</div></div>