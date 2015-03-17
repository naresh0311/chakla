<?php echo $this->Javascript->link('/js/tinymce/jscripts/tiny_mce/tiny_mce.js'); ?>
<?php echo $this->Javascript->link('/js/tinymce_init.js'); ?>
<!--Search Box-->
<div class="content-box" style="width:350px">
<div class="content-box-header">
<h3 style="cursor: s-resize;">Search Categories</h3>
<div class="clear"></div>
</div>
<div class="content-box-content" style="display: block;">
<?php echo $this->Form->create('Category');?>
<input type="text" class="text-input" name="data[Category][cname]" />
<input class="button" type="submit" value="Find Category" name="data[Category][search]" style="margin-right:3px" /></div>
</form>
</div>
<!--End Search Box-->

<!--Header And content-->
<div class="content-box">



<div class="content-box-header">
<h3 style="cursor: s-resize;">Categories</h3>
<ul class="content-box-tabs">
<li>
<a class="<?php echo $tabValues[0];?>" href="#tab1">List Categories</a>
</li>
<li>
<a class="<?php echo $tabValues[1];?>" href="#tab2">Add Category</a>
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

<div id="tab1"  class="<?php echo $tabValues[2];?>">
<?php echo $this->Form->create('Category');?>
<div>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<td style="border-bottom:0;"><input class="check-all" type="checkbox"></td>
			<th><?php echo $this->Paginator->sort('category_name');?></th>
			<th><?php echo $this->Paginator->sort('position');?></th>
	</tr>
	<?php
	$selectedIds="";
	$i = 0;
	foreach ($categories as $category):
	if($category['Category']['id']!="100001")
	{
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><input type=checkbox name="data[Category][id][]" value="<?php echo $category['Category']['id']; ?>" ></td>
		<td><?php echo $category['Category']['category_name']; ?></td>
		<td><input type=text name="position_<?php echo $category['Category']['id']; ?>" value="<?php echo $category['Category']['position']; ?>"  size=4></td>
		<td>
			<?php echo $this->Html->image("icons/pencil.png", array( "alt" => "Edit", 'url' => array('action' => 'edit', 'action' => 'edit', $category['Category']['id']))); ?>
            <?php echo $this->Html->image("icons/cross.png", array( "alt" => "Delete", 'url' => array('action' => 'edit', 'action' => 'delete', $category['Category']['id']),'onClick'=>'return confirm("Are you sure you wish to delete this record?");')); ?>
		</td>
	</tr>
<?php
$selectedIds.="~".$category['Category']['id'];
 }
endforeach;
 ?><input type=hidden name="selectedIds" value="<?php echo $selectedIds;?>">
	</table>
	<p>
	<?php
	/*
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	*/
	?>	</p>
	
	<div style="clear:both;padding:0;"><div class="paging"">
	
		<div style="float:left;width:400px;clear:none;">
		<input class="button" type="submit" value="Update Position" name="data[Category][Update]" style="width:150px; margin-right:3px" />
		<input class="button" type="submit" value="Delete Selected" name="data[Category][delete]" style="width:150px; margin-right:3px"  onClick="return confirm('Are You Sure To Delete?');" />
		</div>
	
	<div style="float:left;clear:none;<?php if(strlen(trim($this->Paginator->numbers(array('class' => 'number'))))>0){}else{ echo "display:none;";} ?>">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers(array('class' => 'number'));?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
	</div><div style="clear:both;padding:0;"></div>
	

	
</div>
</div>
</form>
</div>
<div id="tab2" class="<?php echo $tabValues[3];?>">
<div>
<?php echo $this->Form->create('Category');?>
	<fieldset>
	<?php
		echo $this->Form->input('category_name');
		echo $this->Form->input('link_title');
		echo $this->Form->input('position');
		?>
		
		<div>
		<div><b>Category Images</b></div><div style="width:300px;height:100px;overflow-y:scroll;overflow-x:hidden;float:left;">
		<table>
		<tr bgcolor="#ccc">
		<th width=200 style="border:1px solid;padding:4px;">Image</th>
		<th width=100 style="border:1px solid;border-left:0;padding:4px;">Position</th>
		</tr>
		<tr><td colspan=2>No Image Found For This Category</td></tr>
		</table>
		</div>
		</div>
		<div class="submit"><input type="submit" value="Upload An Image" name="data[Category][submitImage]" /></div>
		<?php
		echo $this->Form->input('content',array('rows'=>'5','cols'=>'50','class' =>'mceEditor','style' =>'height:600px'));
		echo $this->Form->input('pagetitle');
		echo $this->Form->input('keywords');
		echo $this->Form->input('description');
	?>
	</fieldset>
<div class="submit"><input type="submit" value="Submit" name="data[Category][submit]" /></div></form>
</div>

</div>
</div>
</div>