<!--Header And content-->
<div class="content-box">


<div class="content-box-header">
<h3 style="cursor: s-resize;">Edit Site Setting</h3>
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

<?php echo $this->Form->create('SiteSetting');?>
	<fieldset>
	<?php
		//print_r($this->data);
		echo $this->Form->input('id');
		?><div style="width:200px;"><table cellpadding=5><tr>
		<td width=200 style="border-bottom:0">Turn Off Site</td> 
		<td width=100 style="border-bottom:0"><input type=radio name="data[SiteSetting][site_turn_option]" value=1 <?php if($this->data['SiteSetting']['site_turn_option']==1){echo " checked";}?>> Yes</td>
		<td width=100 style="border-bottom:0"><input type=radio name="data[SiteSetting][site_turn_option]" value=0 <?php if($this->data['SiteSetting']['site_turn_option']!=1){echo " checked";}?>> No</td>
		</tr></table></div><?php
		echo $this->Form->input('contact_email');
		echo $this->Form->input('default_page_title');
		echo $this->Form->input('default_keywords');
		echo $this->Form->input('default_description');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
</div>