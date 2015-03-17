<?php
/**
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
</head>
<body id="login">

<div id="login-wrapper" class="png_bg">
			<div id="login-top" style="padding-top:180px;">
			
				<h1>Simpla Admin</h1>
				<!-- Logo (221px width) -->
			</div> <!-- End #logn-top -->
			
			<div id="login-content">
				
				<?php
$this->Session->flash('auth');
?>
				
				<form id="UserLoginForm" method="post" action="/admin/users/login">
				
					<div class="notification information png_bg" style="display:none;">
						<div>
							Just click "Sign In". No password needed.
						</div>
					</div>
					
					
					<div style="float:left;width:320px;">
						<div style="float:left;width:80px;clear:none !important;padding:0;margin:0">Username</div>
						<div style="float:left;width:210px;clear:none !important;padding:0;margin:0"><input id="UserUsername" class="text-input" type="text" maxlength="255" name="data[User][username]"></div>
						<div style="clear:both;padding:0;margin:0;"></div>
						
						<div style="float:left;width:80px;clear:none !important;padding:0;margin:0">Password</div>
						<div style="float:left;width:210px;clear:none !important;padding:0;margin:0"><input id="UserPassword" class="text-input" type="password" name="data[User][password]"></div>
						<div style="clear:both;padding:0;margin:0;"></div>
						<div style="clear:both;padding:0 30px 0 0;margin:0;"><input class="button" type="submit" value="Sign In" style="width:60px !important;" /></div>
						
					</div>
					
					<div style="clear:both"></div>
				</form>
			</div> <!-- End #login-content -->
			
		</div>

</body>
</html>