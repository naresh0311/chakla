<div class="content-box">
<div class="content-box-header">
<h3 style="cursor: s-resize;">Add Image</h3>
<div class="clear"></div>
</div>
			

<div class="content-box-content" style="display: block;">

<?php if ($this->Session->check('Message.flash')):?>
<div class="notification success png_bg">
<?php echo $this->Html->image("icons/cross_grey_small.png",array('url'=>'#','class'=>'close','title'=>"Close this notification", 'alt'=>"close", 'onclick'=>'slide_up();'));?>
<div id="flashMessage" class="message">
<div id="flashMessage" class="message">
	<?php echo $this->Session->flash()?>
</div></div>
</div>
<?php endif; ?>

<div>
<?php 
if(isset($page) && $page=="page")
{
	echo $this->Form->create('CategoryImage', array('enctype' => 'multipart/form-data','url' => array('controller' => 'category_images', 'action' => 'add', $id, $page)));
	?><input type="hidden" name="data[CategoryImage][article_id]" value="<?php echo $id; ?>"><?php
}
else
{
	echo $this->Form->create('CategoryImage', array('enctype' => 'multipart/form-data','url' => array('controller' => 'category_images', 'action' => 'add', $id)));
	?><input type="hidden" name="data[CategoryImage][category_id]" value="<?php echo $id; ?>"><?php
}
?>
	<fieldset>
	<?php
		//echo $this->Form->input('category_id');
		//echo $this->Form->input('image');
	    echo $form->input('image', array('type'=>'file'));
		echo $this->Form->input('position');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>

</div>
</div>