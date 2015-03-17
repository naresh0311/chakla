<?php 
//echo "<pre>";print_r($articleTypes[1]);
echo $this->Javascript->link('/js/tinymce/jscripts/tiny_mce/tiny_mce.js'); ?>
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
<div <?php if($tabValues[4]==3) { echo "style=\"display:none;\"";}?>>
<div class="content-box" style="width:350px;float:left;clear:none;margin-right:40px;">
<div class="content-box-header">
<h3 style="cursor: s-resize;">Search <?php echo $articleTypes[$tabValues[4]]?></h3>
<div class="clear"></div>
</div>
<div class="content-box-content" style="display: block;">
<form id="ArticleAdminIndexForm" accept-charset="utf-8" method="post" action="<?php echo HOST_ADDRESS; ?>admin/articles/index/<?php echo $tabValues[4]; ?>">
<input type="text" class="text-input" name="data[Article][cname]" />
<input class="button" type="submit" value="Find Article" name="data[Article][search]" style="margin-right:3px" /></div>
</form>
</div>

<div class="content-box" style="width:350px;float:left;clear:none;display:<?php if($tabValues[4]==1) { echo "block";} else { echo "none";}?>;">
<div class="content-box-header">
<h3 style="cursor: s-resize;">Show Only Pages In</h3>
<div class="clear"></div>
</div>
<div class="content-box-content" style="display: block;">
<form id="ArticleAdminIndexForm" name="filterSearch" accept-charset="utf-8" method="post" action="<?php echo HOST_ADDRESS; ?>admin/articles/index/<?php echo $tabValues[4]; ?>">


<select class="select" onchange="submitForm('filterSearch');" name="data[Article][filterCategory]">
<option value="">All</option>
<?php
foreach($categories as $key=>$value)
{
	?><option value="<?php echo $key; ?>" <?php if(isset($this->data['Article']['filterCategory']) && $this->data['Article']['filterCategory']==$key){ echo " selected";}?>><?php echo $value; ?></option><?php
}
?>
</select>
</form>
</div>
</div>



<div class="content-box" style="width:350px;float:left;clear:none;display:<?php if($tabValues[4]==2) { echo "block";} else { echo "none";}?>;">
<div class="content-box-header">
<h3 style="cursor: s-resize;">Show Only News In</h3>
<div class="clear"></div>
</div>
<div class="content-box-content" style="display: block;">
<form id="ArticleAdminIndexForm" name="filterSearch2" accept-charset="utf-8" method="post" action="<?php echo HOST_ADDRESS; ?>admin/articles/index/<?php echo $tabValues[4]; ?>">


<select class="select" onchange="submitForm('filterSearch2');" name="data[Article][filterCategory2]">
<option value="">All</option>
<?php
foreach($newsTypes as $key=>$value)
{
	?><option value="<?php echo $key; ?>" <?php if(isset($this->data['Article']['filterCategory2']) && $this->data['Article']['filterCategory2']==$key){ echo " selected";}?>><?php echo $value; ?></option><?php
}
?>
</select>
</form>
</div>
</div>
</div>
<div style="clear:both;"></div>
<!--End Search Box-->

<!--Header And content-->
<div class="content-box">

<div class="content-box-header">
<h3 style="cursor: s-resize;"><?php echo $articleTypes[$tabValues[4]]?></h3>
<?php if($tabValues[4]!=3) 
{
	?><ul class="content-box-tabs">
	<li><a class="<?php echo $tabValues[0];?>" href="#tab1">List <?php echo $articleTypes[$tabValues[4]]; if($articleTypes[$tabValues[4]]!="News") echo "s"; ?></a></li>
	<li>
	<a class="<?php echo $tabValues[1];?>" href="#tab2">Add <?php echo $articleTypes[$tabValues[4]]?></a>
	</li>
	</ul><?php
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

<div id="tab1" class="<?php echo $tabValues[2];?>">
<form id="ArticleAdminIndexForm"  method="post" action="<?php echo HOST_ADDRESS; ?>admin/articles/index/<?php echo $tabValues[4]; ?>">
	<table cellpadding="0" cellspacing="0">
	<tr>
		<?php 
		if($tabValues[4]!=3)
		{
			?><td style="border-bottom:0;"><input class="check-all" type="checkbox"></td><?php
		}
			if($tabValues[4]==2)
			{
				?><th><a href="/admin/articles/index/2/page:1/sort:article_name/direction:asc">Article Title</a></th>
				<th><a href="/admin/articles/index/2/page:1/sort:created/direction:asc">Date</a></th>
				<th><a href="/admin/articles/index/2/page:1/sort:news_type_id/direction:asc">Category</a></th>
				<th><a href="/admin/articles/index/2/page:1/sort:user_id/direction:asc">Written By</a></th><?php
			}
			elseif($tabValues[4]==1)
			{
				?><th><a href="/admin/articles/index/1/page:1/sort:article_name/direction:asc">Page Name</a></th>
				<th><a href="/admin/articles/index/1/page:1/sort:category_id/direction:asc">Category</a></th>
				<th><a href="/admin/articles/index/1/modified:1/sort:user_id/direction:asc">Last Modified</a></th><?php
			}
			elseif($tabValues[4]==3)
			{
				?><th><a href="/admin/articles/index/3/page:1/sort:article_name/direction:asc">Page Name</a></th>
				<!--<th><a href="/admin/articles/index/3/page:1/sort:position/direction:asc">Position</a></th>--><?php
			}
			elseif($tabValues[4]==4)
			{
				?><th><a href="/admin/articles/index/4/page:1/sort:article_name/direction:asc">Page Name</a></th>
				<th><a href="/admin/articles/index/4/page:1/sort:url/direction:asc">Url</a></th>
				<th><a href="/admin/articles/index/4/modified:1/sort:user_id/direction:asc">Last Modified</a></th><?php
			}
			?>
			<th class="actions"></th>
	</tr>
	<?php
	$i = 0;
	foreach ($articles as $article):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<?php 
		if($tabValues[4]!=3)
		{
			?><td><input type=checkbox name="data[Article][id][]" value="<?php echo $article['Article']['id']; ?>" ></td><?php 
		}
		?>
		<?php
		if($tabValues[4]==2)
		{
			?><td><?php echo $article['Article']['article_name']; ?></td>
			<td><?php echo date("m/d/Y", strtotime($article['Article']['created'])); ?></d>
			<td><?php echo $article['NewsType']['article']; ?></td>
			<td><?php echo $article['User']['first_name']." ".$article['User']['last_name']; ?></td>
			
			<!--<td><?php echo $this->Html->link($article['NewsType']['article'], array('controller' => 'news_types', 'action' => 'view', $article['NewsType']['id'])); ?></td>
			<td><?php echo $this->Html->link($article['User']['username'], array('controller' => 'users', 'action' => 'view', $article['User']['id'])); ?></td>-->
			<?php
		}
		elseif($tabValues[4]==1)
		{
			?><td><?php echo $article['Article']['article_name']; ?></td>
			<td><?php echo $article['Category']['category_name']; ?></td>
			<td><?php 
			if($article['Article']['modified']!=$article['Article']['created'])
			{
				echo date("m/d/Y", strtotime($article['Article']['modified']))." (".$users[$article['Article']['modified_by']].")"; 
			}
			?></d>
			<?php
		}
		elseif($tabValues[4]==3)
		{
			?><td><?php echo $article['Article']['article_name']; ?></td>
			<!--<td><input type=text name="position_<?php echo $article['Article']['id']; ?>" value="<?php echo $article['Article']['position']; ?>"  size=4></td>--><?php
		}
		elseif($tabValues[4]==4)
		{
			?><td><?php echo $article['Article']['article_name']; ?></td>
			<td><?php echo HOST_ADDRESS."index/".$article['Article']['url']; ?></td>
			<td><?php 
			if($article['Article']['modified']!=$article['Article']['created'])
			{
				echo date("m/d/Y", strtotime($article['Article']['modified']))." (".$users[$article['Article']['modified_by']].")"; 
			}
			?></d>
			<?php
		}
		?>
		
		<td>
			<?php echo $this->Html->image("icons/pencil.png", array( "alt" => "Edit", 'url' => array('action' => 'edit', $article['Article']['id']))); ?>
            <?php if($tabValues[4]!=3) 
			{
				 echo $this->Html->image("icons/cross.png", array( "alt" => "Delete", 'url' => array('action' => 'delete', $article['Article']['id'], $article['Article']['article_type_id']),'onClick'=>'return confirm("Are you sure you wish to delete this record?");')); 
			}
			?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	/*echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));*/
	?>	</p>

	
	
	<div style="clear:both"></div><div class="paging">
	
		<div style="float:left;width:310px;clear:none;">
		<?php 
		if($tabValues[4]==3)
		{
			?><!--<input class="button" type="submit" value="Update Position" name="data[Article][Update]" style="width:150px; margin-right:3px" />--><?php
		}
		else
		{
			?><input class="button" type="submit" value="Delete Selected" name="data[Article][Delete]" style="width:150px; margin-right:3px"  onClick="return confirm('Are You Sure?');" />
			<?php
		}
		?>
		</div>
	
	<div style="float:left;clear:none;<?php if(strlen(trim($this->Paginator->numbers(array('class' => 'number'))))>0){}else{ echo "display:none;";} ?>">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers(array('class' => 'number'));?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
	<input type=hidden name="data[Article][article_type_id]" value="<?php echo $tabValues[4]; ?>">
	
	</div><div style="clear:both;"></div>
	
</form>	
	
	
	
	
</div>
<div id="tab2" class="<?php echo $tabValues[3];?>">

<?php echo $this->Form->create('Article');?>
	<fieldset>
	<input type=hidden name="data[Article][article_type_id]" value="<?php echo $tabValues[4]; ?>">
	<?php
		if($tabValues[4]==1)
		{
			echo $this->Form->input('article_name', array('label'=>'Page Name'));
			echo $this->Form->input('link_title');
			echo $this->Form->input('category_id', array( 'type' => 'select', 'label' => 'Category' ));
			echo $this->Form->input('content',array('rows'=>'5','cols'=>'50','class' =>'mceEditor','style' =>'height:600px'));
			echo $this->Form->input('pagetitle');
			echo $this->Form->input('keywords');
			echo $this->Form->input('description');
			?>
			<input type=hidden name="data[Article][article_template_id]" value="1">
			<input type=hidden name="data[Article][news_type_id]" value="1">
			<input type=hidden name="data[Article][user_id]" value="1">
			<input type=hidden name="data[Article][url]" value="sd">
			<input type=hidden name="data[Article][modified_by]" value="1">
			<input type=hidden name="data[Article][position]" value="1"><?php
		}
		elseif($tabValues[4]==2)
		{
			echo $this->Form->input('article_name');
			echo $this->Form->input('created', array('type'=>'text', 'label'=>'Article Date', 'id'=>'popupDatepicker'));
			?><div class="input select required">
			<label for="ArticleNewsTypeId">Article Type</label>
			<select id="ArticleNewsTypeId" name="data[Article][news_type_id]">
			<?php
			foreach( $scategories as $key => $value){
				?><option value="<?php echo $key; ?>" ><?php echo $value; ?></option><?php
			}?>
			</select></div><?php
			echo $this->Form->input('content',array('rows'=>'5','cols'=>'50','class' =>'mceEditor','style' =>'height:600px'));
			echo $this->Form->input('pagetitle');
			echo $this->Form->input('keywords');
			echo $this->Form->input('description');
		}
		else
		{
			echo $this->Form->input('article_name', array('label'=>'Page Name'));
			echo $this->Form->input('article_template_id', array('label'=>'Page Template'));
			echo $this->Form->input('content',array('rows'=>'5','cols'=>'50','class' =>'mceEditor','style' =>'height:600px'));
			echo $this->Form->input('pagetitle');
			echo $this->Form->input('keywords');
			echo $this->Form->input('description');
			//echo $this->Form->input('url');
			//echo $this->Form->input('position');
		}
	?>
	</fieldset>
<div class="submit"><input type="submit" value="Submit" name="data[Article][submit]" /></div></form>

<div >
</div>
</div>
</div>
</div>