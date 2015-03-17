<div class="siteSettings form">
<?php echo $this->Form->create('SiteSetting');?>
	<fieldset>
		<legend><?php __('Add Site Setting'); ?></legend>
	<?php
		echo $this->Form->input('site_turn_option');
		echo $this->Form->input('contact_email');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Site Settings', true), array('action' => 'index'));?></li>
	</ul>
</div>