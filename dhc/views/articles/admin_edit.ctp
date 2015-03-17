<?php echo $this->Javascript->link('/js/tinymce/jscripts/tiny_mce/tiny_mce.js'); ?>
<?php echo $this->Javascript->link('/js/tinymce_init.js'); ?>
<?php echo $this->Javascript->link('/js/jquery.datepick.js'); ?>
<?php echo $this->Html->css('jquery.datepick'); ?>
<script type="text/javascript">
function submitForm(jab)
{
	jab2=eval("document."+jab);
	jab2.submit();
}
$(function() {
	$('#popupDatepicker').datepick();
	$('#inlineDatepicker').datepick({onSelect: showDate});
});

function showDate(date) {
	alert('The date chosen is ' + date);
}
</script>
<!--Header And content-->
<div class="content-box">


<div class="content-box-header">
<h3 style="cursor: s-resize;">Edit <?php echo $articleTypes[$this->data['Article']['article_type_id']];?></h3>
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



<?php echo $this->Form->create('Article');?>
	<fieldset>
	<?php
		if($this->data['Article']['article_type_id']==1 || $this->data['Article']['article_type_id']==2)
		{
			//print_r($newsTypes);print_r($categories);
			echo $this->Form->input('article_name', array('label'=>$articleTypes[$this->data['Article']['article_type_id']]));
			if($this->data['Article']['article_type_id']==1)
			{
				echo $this->Form->input('link_title');
			}
			if($this->data['Article']['article_type_id']==2)
			{
				echo $this->Form->input('created', array('type'=>'text', 'label'=>'Article Date', 'id'=>'popupDatepicker'));
			}
			if($this->data['Article']['article_type_id']==2)
			{
				echo $this->Form->input('news_type_id', array('label'=>'Article Type'));
			}
			if($this->data['Article']['article_type_id']<2)
			{
				echo $this->Form->input('category_id', array('label'=>'Category'));
			
			?><div>
		<div><b>Images</b></div><div style="width:500px;height:100px;overflow-y:scroll;overflow-x:hidden;float:left;">
		<table>
		<tr bgcolor="#ccc">
		<th width=320 style="border:1px solid;padding:4px;">Image</th>
		<th width=100 style="border:1px solid;border-left:0;padding:4px;">Position</th>
		<th width=80 style="border:1px solid;border-left:0;padding:4px;">&nbsp;</th>
		</tr>
		<?php
		//echo "<pre>";print_r($CategoryImage);"<pre>";
		if(count($CategoryImage)>0)
		{
			for($icx=0; $icx<count($CategoryImage); $icx++)
			{
				$images=$CategoryImage[$icx]['CategoryImage'];
				?><tr>
				<td><div style="width:320px!important;overflow:hidden;"><span onclick='window.open("<?php echo HOST_ADDRESS; ?>/img/products_images/<?php echo $images['image'] ?>","mywindow","channelmode=1,toolbar=0,status=0,width=600,height=400")'; style="cursor:pointer;"><?php echo $images['image'] ?></span></div></td>
				<td><input type=text size=3 value="<?php echo $images['position'] ?>" name="data[CategoryImage][position][<?php echo $images['id']?>]"></td>
				<td><?php echo $this->Html->image("icons/cross.png", array( "alt" => "Delete", 'url' => array('controller' => 'category_images', 'action' => 'delete', $images['id'], $images['article_id'], 'page'),'onClick'=>'return confirm("Are you sure you wish to delete this record?");')); ?></td>
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
		<div style="clear:both;"><?php echo $this->Html->link(__('Upload Another Image', true), array('controller' => 'category_images','action' => 'add', $this->data['Article']['id'], 'page')); ?></div>
		
		</div><?php
		}
			echo $this->Form->input('content',array('rows'=>'5','cols'=>'50','class' =>'mceEditor','style' =>'height:600px'));
			echo $this->Form->input('pagetitle');
			echo $this->Form->input('keywords');
			echo $this->Form->input('description');
		}
		else
		{
			if($this->data['Article']['article_type_id']==3)
			{
				echo $this->Form->input('article_name',array('type'=>'hidden'));
				?><!--<div class="input text required">
				<label for="ArticleArticleName">Static Page Name</label>
				<input id="ArticleArticleName2" type="text" value="<?php echo $this->data['Article']['article_name']; ?>" maxlength="255" name="data[Article][article_name2]" disabled="disabled">
				</div>--><?php
			}
			else
			{
				echo $this->Form->input('article_name',array('label'=>$articleTypes[$this->data['Article']['article_type_id']].' Name'));
			}
			
			if($this->data['Article']['article_type_id']==4)
			{
				echo $this->Form->input('article_template_id', array('label'=>'Page Template'));
			}
			?>
			<div>
		<div><b>Images</b></div><div style="width:500px;height:100px;overflow-y:scroll;overflow-x:hidden;float:left;">
		<table>
		<tr bgcolor="#ccc">
		<th width=320 style="border:1px solid;padding:4px;">Image</th>
		<th width=100 style="border:1px solid;border-left:0;padding:4px;">Position</th>
		<th width=80 style="border:1px solid;border-left:0;padding:4px;">&nbsp;</th>
		</tr>
		<?php
		//echo "<pre>";print_r($CategoryImage);"<pre>";
		if(count($CategoryImage)>0)
		{
			for($icx=0; $icx<count($CategoryImage); $icx++)
			{
				$images=$CategoryImage[$icx]['CategoryImage'];
				?><tr>
				<td><div style="width:320px!important;overflow:hidden;"><span onclick='window.open("<?php echo HOST_ADDRESS; ?>/img/products_images/<?php echo $images['image'] ?>","mywindow","channelmode=1,toolbar=0,status=0,width=600,height=400")'; style="cursor:pointer;"><?php echo $images['image'] ?></span></div></td>
				<td><input type=text size=3 value="<?php echo $images['position'] ?>" name="data[CategoryImage][position][<?php echo $images['id']?>]"></td>
				<td><?php echo $this->Html->image("icons/cross.png", array( "alt" => "Delete", 'url' => array('controller' => 'category_images', 'action' => 'delete', $images['id'], $images['article_id'], 'page'),'onClick'=>'return confirm("Are you sure you wish to delete this record?");')); ?></td>
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
		<div style="clear:both;"><?php echo $this->Html->link(__('Upload Another Image', true), array('controller' => 'category_images','action' => 'add', $this->data['Article']['id'], 'page')); ?></div>
		
		</div>
			<?php
			echo $this->Form->input('content',array('rows'=>'5','cols'=>'50','class' =>'mceEditor','style' =>'height:600px'));
			echo $this->Form->input('pagetitle');
			echo $this->Form->input('keywords');
			echo $this->Form->input('description');
			//echo $this->Form->input('url');
			//echo $this->Form->input('position');
		}
	?><input type=hidden name="data[Article][article_type_id]" value="<?php echo $this->data['Article']['article_type_id']; ?>">
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
</div>