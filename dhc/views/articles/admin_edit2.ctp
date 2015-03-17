<?php echo $this->Javascript->link('/js/tinymce/jscripts/tiny_mce/tiny_mce.js'); ?>
<?php echo $this->Javascript->link('/js/tinymce_init.js'); ?>
<!--Header And content-->
<div class="content-box">
<?php echo $this->Session->flash();
//print_r($articleCategory);
?>
<div class="content-box-header">
<h3 style="cursor: s-resize;">Edit Article</h3>
<div class="clear"></div>
</div>
			

<div class="content-box-content" style="display: block;">
<?php echo $this->Form->create('Article');?>
	<fieldset>
	<?php
		if($this->data['Article']['article_type_id']==1 || $this->data['Article']['article_type_id']==2)
		{
			//print_r($newsTypes);print_r($categories);
			echo $this->Form->input('article_name');
			if($this->data['Article']['article_type_id']==2)
			{
				echo $this->Form->input('news_type_id', array('label'=>'Article Type'));
			}
			else
			{
				?><div class="input select required">
				<label for="ArticleCategoryId">Category</label>
				<input id="ArticleCategoryId_" type="hidden" value="" name="data[Article][category_id]">
				<select id="ArticleCategoryId" multiple="multiple" name="data[Article][category_id][]">
				<?php
				foreach($categories as $key => $value)
				{
					?><option value="<?php echo $key; ?>" <?php 
					foreach($articleCategory as $key2 => $value2)
					{
						if($key==$value2) { echo "selected"; }
					}
					?>><?php echo $value; ?></option><?php
				}
				?>
				</select>
				</div><?php
			}
			echo $this->Form->input('content',array('rows'=>'5','cols'=>'50','class' =>'mceEditor'));
			echo $this->Form->input('description');
			echo $this->Form->input('keywords');
		}
		else
		{
			echo $this->Form->input('article_name');
			echo $this->Form->input('article_template_id');
		
			echo $this->Form->input('content',array('rows'=>'5','cols'=>'50','class' =>'mceEditor'));
			echo $this->Form->input('description');
			echo $this->Form->input('keywords');
		
			echo $this->Form->input('url');
			echo $this->Form->input('position');
		}
	?><input type=hidden name="data[Article][article_type_id]" value="<?php echo $this->data['Article']['article_type_id']; ?>">
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
</div>