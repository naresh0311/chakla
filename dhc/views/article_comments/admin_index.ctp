<!--Header And content-->
<div class="content-box">


<?php if ($this->Session->check('Message.flash')):?>
<div class="notification success png_bg">
<?php echo $this->Html->image("icons/cross_grey_small.png",array('url'=>'#','class'=>'close','title'=>"Close this notification", 'alt'=>"close", 'onclick'=>'slide_up();'));?>
<div>
	<?php echo $this->Session->flash()?>
</div>
</div>
<?php endif; ?>


<div class="content-box-header">
<h3 style="cursor: s-resize;">Welcome</h3>
<div class="clear"></div>
</div>
			
<div class="content-box-content" style="display: block;">
<h3>Welcome to the Admin Panel</h3>
</div>
</div>