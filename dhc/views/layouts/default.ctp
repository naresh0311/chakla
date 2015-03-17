<?php
/*
 *
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.cake.libs.view.templates.layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>Admin CMS Control</title>
	<?php
		$articleTabSet=0;
		echo $this->Html->meta('icon');

		echo $this->Html->css('blue');
		echo $this->Html->css('cake.generic');
		echo $this->Html->css('ie');
		echo $this->Html->css('invalid');
		
		echo $this->Html->css('red');
		echo $this->Html->css('reset');
		echo $this->Html->css('style');

		echo $scripts_for_layout;
		
		echo $this->Html->script('jquery-1.3.2.min');
		echo $this->Html->script('simpla.jquery.configuration');
		echo $this->Html->script('jquery.wysiwyg');
		echo $this->Html->script('facebox');
	?>
<script type="text/javascript">

function slide_up()
{
	$('.notification').slideUp();
}
</script>	
</head>
<body>
	<div id="container">




			<div id="sidebar"><div id="sidebar-wrapper"> <!-- Sidebar with logo and menu -->
			
			<h1 id="sidebar-title"><a href="#">Simpla Admin</a></h1>
		  
			<!-- Logo (221px wide) -->
			<a href="#"><img id="logo" src="<?php echo HOST_ADDRESS; ?>img/logo.png" alt="Simpla Admin logo" /></a>
		  
			<!-- Sidebar Profile links -->
			<div id="profile-links">
			<?php $userAgent=$this->Session->read('Auth.User'); ?>
				Hello, <a href="<?php echo HOST_ADDRESS; ?>admin/users/edit/<?php echo $userAgent['id']; ?>" title="Edit your profile"><?php echo $userAgent['first_name']." ".$userAgent['last_name'];?></a>, 
				<br />
				<a href="<?php echo HOST_ADDRESS; ?>" title="View the Site" target="_blank">View the Site</a> | <a href="<?php echo HOST_ADDRESS; ?>admin/users/logout" title="Sign Out">Sign Out</a>
			</div>        
			
			<ul id="main-nav">  <!-- Accordion Menu -->
				
			<li><a href="<?php echo HOST_ADDRESS; ?>admin/article_comments" class="nav-top-item  no-submenu <?php if($this->name=="ArticleComments"){ echo " current";} ?>">
					Dashboard</a></li>
			
			<?php
			if($userAgent['permission_catogories']==1)
			{
				?><li><a href="<?php echo HOST_ADDRESS; ?>admin/categories" class="nav-top-item-blue  no-submenu <?php if($this->name=="Categories" && ($this->data['Category']['id']>100001 || $this->data['Category']['id']<99997)){ echo " current";} ?>">
			Categories</a></li><?php
			}
			if($userAgent['permission_pages']==1)
			{
				?><li><a href="<?php echo HOST_ADDRESS; ?>admin/articles/index/1" class="nav-top-item-blue  no-submenu <?php 
			if($this->name=="Articles" && ((isset($tabValues[4]) && $tabValues[4]==1) || (isset($this->data['Article']['article_type_id']) && $this->data['Article']['article_type_id']==1))){ echo " current";} ?>">
			Pages</a></li><?php
			}
			if($userAgent['permission_news']==1)
			{
				?><li><a href="<?php echo HOST_ADDRESS; ?>admin/articles/index/2" class="nav-top-item-blue  no-submenu <?php 
			if($this->name=="Articles" && ((isset($tabValues[4]) && $tabValues[4]==2) || (isset($this->data['Article']['article_type_id']) && $this->data['Article']['article_type_id']==2))){ echo " current";} ?>">
			News</a></li><?php
			}
			if($userAgent['permission_home_rotator']==1)
			{
				?><li><a href="<?php echo HOST_ADDRESS; ?>admin/categories/edit/100001" class="nav-top-item-blue  no-submenu <?php if($this->name=="Categories" && ($this->data['Category']['id']<100002 && $this->data['Category']['id']>99996)){ echo " current";} ?>">
			Banners</a></li><?php
			}
			if($userAgent['permission_static_pages']==1)
			{
			?><li><a href="<?php echo HOST_ADDRESS; ?>admin/articles/index/3" class="nav-top-item-blue  no-submenu <?php 
			if($this->name=="Articles" && ((isset($tabValues[4]) && $tabValues[4]==3) || (isset($this->data['Article']['article_type_id']) && $this->data['Article']['article_type_id']==3))){ echo " current";} ?>">
			Static Pages</a></li>
			
			<li><a href="<?php echo HOST_ADDRESS; ?>admin/articles/index/4" class="nav-top-item-blue  no-submenu <?php 
			if($this->name=="Articles" && ((isset($tabValues[4]) && $tabValues[4]==4) || (isset($this->data['Article']['article_type_id']) && $this->data['Article']['article_type_id']==4))){ echo " current";} ?>">
			Orphan Pages</a></li><?php
			}
			if($userAgent['id']==1)
			{
				?><li><a href="<?php echo HOST_ADDRESS; ?>admin/site_settings/edit/1" class="nav-top-item-red  no-submenu <?php if($this->name=="SiteSettings"){ echo " current";} ?>">
			Site Settings</a></li>
			<li><a href="<?php echo HOST_ADDRESS; ?>admin/users" class="nav-top-item-red  no-submenu <?php if($this->name=="Users"){ echo " current";} ?>">
			Users</a></li><?php
			}
			?>
			</ul> <!-- End #main-nav -->
			
			<div id="messages" style="display: none"> <!-- Messages are shown when a link with these attributes are clicked: href="#messages" rel="modal"  -->
				
				<h3>3 Messages</h3>
			 
				<p>
					<strong>17th May 2009</strong> by Admin<br />
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus magna. Cras in mi at felis aliquet congue.
					<small><a href="#" class="remove-link" title="Remove message">Remove</a></small>
				</p>
			 
				<p>
					<strong>2nd May 2009</strong> by Jane Doe<br />
					Ut a est eget ligula molestie gravida. Curabitur massa. Donec eleifend, libero at sagittis mollis, tellus est malesuada tellus, at luctus turpis elit sit amet quam. Vivamus pretium ornare est.
					<small><a href="#" class="remove-link" title="Remove message">Remove</a></small>
				</p>
			 
				<p>
					<strong>25th April 2009</strong> by Admin<br />
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus magna. Cras in mi at felis aliquet congue.
					<small><a href="#" class="remove-link" title="Remove message">Remove</a></small>
				</p>
				
				<form action="" method="post">
					
					<h4>New Message</h4>
					
					<fieldset>
						<textarea class="textarea" name="textfield" cols="79" rows="5"></textarea>
					</fieldset>
					
					<fieldset>
					
						<select name="dropdown" class="small-input">
							<option value="option1">Send to...</option>
							<option value="option2">Everyone</option>
							<option value="option3">Admin</option>
							<option value="option4">Jane Doe</option>
						</select>
						
						<input class="button" type="submit" value="Send" />
						
					</fieldset>
					
				</form>
				
			</div> <!-- End #messages -->
			
		</div></div>
		
		<div  id="main-content"><?php echo $content_for_layout; ?></div>
			
	</div>
	<?php //echo $this->element('sql_dump'); ?>
</body>
</html>