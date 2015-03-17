<?php echo $this->Javascript->link('/js/tinymce/jscripts/tiny_mce/tiny_mce.js'); ?>
<?php echo $this->Javascript->link('/js/tinymce_init.js'); ?>
<div class="content-box">


<div class="content-box-header">
<?php
if($this->data['Category']['id']<100002 && $this->data['Category']['id']>99996)
{
?><h3 style="cursor: s-resize;">Banners</h3>
<ul class="content-box-tabs">
<li><a <?php if($this->data['Category']['id']==100001){ echo "class=\"default-tab current\""; } ?> href="#tab1">Home Rotator</a></li>
<li>
<a <?php if($this->data['Category']['id']==99998){ echo "class=\"default-tab current\""; } ?>  href="#tab3">News</a>
</li>

<li>
<a <?php if($this->data['Category']['id']==99999){ echo "class=\"default-tab current\""; } ?>  href="#tab4">Contact Us</a>
</li>


</ul>

<?php
}
else
{
?><h3 style="cursor: s-resize;">Edit Category</h3><?php
}
?>
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

<div>
<?php echo $this->Form->create('Category');?>
	<fieldset>
	<?php
		echo $this->Form->input('id');
		if($this->data['Category']['id']<100002 && $this->data['Category']['id']>99996)
		{
		?>
		<div id="tab1" class="tab-content<?php if($this->data['Category']['id']==100001){ echo " default-tab"; } ?>" style="display: block;">
		<div>
		<div style="float:left;">
		<table width="600">
		<tr bgcolor="#ccc">
		<th style="border:1px solid;padding:4px;" width=400>Image</th>
		<th style="border:1px solid;border-left:0;padding:4px;" width=100>Position</th>
		<th style="border:1px solid;border-left:0;padding:4px;" width=100>Delete</th>
		</tr>
		<?php
		if(count($CategoryImage1)>0)
		{
			foreach($CategoryImage1 as $imagess)
			{
				$images=$imagess['CategoryImage'];
				?><tr>
				<td><div><span onclick='window.open("<?php echo HOST_ADDRESS ?>img/products_images/<?php echo $images['image'] ?>","mywindow","channelmode=1,toolbar=0,status=0,width=600,height=400")'; style="cursor:pointer;"><?php echo $images['image'] ?></span></div></td>
				<td><input type=text size=3 value="<?php echo $images['position'] ?>" name="data[CategoryImage][position][<?php echo $images['id']?>]"></td>
				<td align=center><?php echo $this->Html->image("icons/cross.png", array( "alt" => "Delete", 'url' => array('controller' => 'category_images', 'action' => 'delete', $images['id'], $images['category_id']),'onClick'=>'return confirm("Are you sure you wish to delete this record?");')); ?></td>
				</tr><?php
			}
		}
		else
		{
			?><tr><td colspan=3>No Image Found For This Category</td></tr><?php
		}
		?>
		</table>
		</div>
		</div>
		<div style="clear:both;"><?php echo $this->Html->link(__('Upload Another Image', true), array('controller' => 'category_images','action' => 'add',100001)); ?></div>
		</div>
		
		<div id="tab3" class="tab-content<?php if($this->data['Category']['id']==99998){ echo " default-tab"; } ?>" style="display: block;">
		<div>
		<div style="float:left;">
		<table width="600">
		<tr bgcolor="#ccc">
		<th style="border:1px solid;padding:4px;" width=400>Image</th>
		<th style="border:1px solid;border-left:0;padding:4px;" width=100>Position</th>
		<th style="border:1px solid;border-left:0;padding:4px;" width=100>Delete</th>
		</tr>
		<?php
		if(count($CategoryImage3)>0)
		{
			foreach($CategoryImage3 as $imagess)
			{
				$images=$imagess['CategoryImage'];
				?><tr>
				<td><div><span onclick='window.open("<?php echo HOST_ADDRESS ?>img/products_images/<?php echo $images['image'] ?>","mywindow","channelmode=1,toolbar=0,status=0,width=600,height=400")'; style="cursor:pointer;"><?php echo $images['image'] ?></span></div></td>
				<td><input type=text size=3 value="<?php echo $images['position'] ?>" name="data[CategoryImage][position][<?php echo $images['id']?>]"></td>
				<td align=center><?php echo $this->Html->image("icons/cross.png", array( "alt" => "Delete", 'url' => array('controller' => 'category_images', 'action' => 'delete', $images['id'], $images['category_id']),'onClick'=>'return confirm("Are you sure you wish to delete this record?");')); ?></td>
				</tr><?php
			}
		}
		else
		{
			?><tr><td colspan=3>No Image Found For This Category</td></tr><?php
		}
		?>
		</table>
		</div>
		</div>
		<div style="clear:both;"><?php echo $this->Html->link(__('Upload Another Image', true), array('controller' => 'category_images','action' => 'add',99998)); ?></div>
		</div>
		
		<div id="tab4" class="tab-content<?php if($this->data['Category']['id']==99999){ echo " default-tab"; } ?>" style="display: block;">
		<div>
		<div style="float:left;">
		<table width="600">
		<tr bgcolor="#ccc">
		<th style="border:1px solid;padding:4px;" width=400>Image</th>
		<th style="border:1px solid;border-left:0;padding:4px;" width=100>Position</th>
		<th style="border:1px solid;border-left:0;padding:4px;" width=100>Delete</th>
		</tr>
		<?php
		if(count($CategoryImage4)>0)
		{
			foreach($CategoryImage4 as $imagess)
			{
				$images=$imagess['CategoryImage'];
				?><tr>
				<td><div><span onclick='window.open("<?php echo HOST_ADDRESS ?>img/products_images/<?php echo $images['image'] ?>","mywindow","channelmode=1,toolbar=0,status=0,width=600,height=400")'; style="cursor:pointer;"><?php echo $images['image'] ?></span></div></td>
				<td><input type=text size=3 value="<?php echo $images['position'] ?>" name="data[CategoryImage][position][<?php echo $images['id']?>]"></td>
				<td align=center><?php echo $this->Html->image("icons/cross.png", array( "alt" => "Delete", 'url' => array('controller' => 'category_images', 'action' => 'delete', $images['id'], $images['category_id']),'onClick'=>'return confirm("Are you sure you wish to delete this record?");')); ?></td>
				</tr><?php
			}
		}
		else
		{
			?><tr><td colspan=3>No Image Found For This Category</td></tr><?php
		}
		?>
		</table>
		</div>
		</div>
		<div style="clear:both;"><?php echo $this->Html->link(__('Upload Another Image', true), array('controller' => 'category_images','action' => 'add',99999)); ?></div>
		</div>
		<?php
		}
		else
		{
		echo $this->Form->input('category_name');
		echo $this->Form->input('link_title');
		echo $this->Form->input('position');
		?>
		<div>
		<div><b>Category Images</b></div><div style="width:400px;height:100px;overflow-y:scroll;overflow-x:hidden;float:left;">
		<table>
		<tr bgcolor="#ccc">
		<th width=220 style="border:1px solid;padding:4px;">Image</th>
		<th width=100 style="border:1px solid;border-left:0;padding:4px;">Position</th>
		<th width=80 style="border:1px solid;border-left:0;padding:4px;">&nbsp;</th>
		</tr>
		<?php
		if(count($this->data['CategoryImage'])>0)
		{
			foreach($this->data['CategoryImage'] as $images)
			{
			?><tr>
			<td><div style="width:220px!important;overflow:hidden;"><span onclick='window.open("<?php echo HOST_ADDRESS; ?>/img/products_images/<?php echo $images['image'] ?>","mywindow","channelmode=1,toolbar=0,status=0,width=600,height=400")'; style="cursor:pointer;"><?php echo $images['image'] ?></span></div></td>
			<td><input type=text size=3 value="<?php echo $images['position'] ?>" name="data[CategoryImage][position][<?php echo $images['id']?>]"></td>
			<td><?php echo $this->Html->image("icons/cross.png", array( "alt" => "Delete", 'url' => array('controller' => 'category_images', 'action' => 'delete', $images['id'], $images['category_id']),'onClick'=>'return confirm("Are you sure you wish to delete this record?");')); ?></td>
			</tr><?php
			}
		}
		else
		{
			?><tr><td colspan=2>No Image Found For This Category</td></tr><?php
		}
		?>
		</table>
		</div>
		</div>
		<div style="clear:both;"><?php echo $this->Html->link(__('Upload Another Image', true), array('controller' => 'category_images','action' => 'add',$this->data['Category']['id'])); ?></div>
		
		<?php
		echo $this->Form->input('content',array('rows'=>'5','cols'=>'50','class' =>'mceEditor','style' =>'height:600px'));
	?>
	
	<div><?php
	//echo "<pre>";print_r($this->data);echo "</pre>";
	?><table><tr>
		<td><div><b>Pages in this category</b></div><div style="width:400px;height:100px;overflow-y:scroll;overflow-x:hidden;float:left;">
		<table>
		<tr bgcolor="#ccc">
		<th width=300 style="border:1px solid;padding:4px;">Page Name</th>
		<th width=100 style="border:1px solid;border-left:0;padding:4px;">Position</th>
		</tr>
		<?php
		if(count($this->data['ArticleCategory'])>0)
		{
			foreach($articles as $images)
			{
				if(strlen($images['Article']['article_name'])>0)
				{
					?><tr>
					<td><?php echo $images['Article']['article_name'] ?></td>
					<td><input type=text size=3 value="<?php echo $images['Article']['position'] ?>" name="data[Article][position][<?php echo $images['Article']['id']?>]"></td>
					</tr><?php
				}
			}
		}
		else
		{
			?><tr><td colspan=2>No Page Found For This Category</td></tr><?php
		}

		?>
		</table>
		</div></td>
		

		
		</tr></table></div>
	<?php
	echo $this->Form->input('pagetitle');
	echo $this->Form->input('keywords');
	echo $this->Form->input('description');
	}
	?>
	
	</fieldset><?php echo $this->Form->end(__('Submit', true)); ?>
</div>
</div>
</div>