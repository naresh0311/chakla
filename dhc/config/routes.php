<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different urls to chosen controllers and their actions (functions).
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
 * @subpackage    cake.app.config
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/views/pages/home.ctp)...
 */
	
	
/**
 * ...and connect the rest of 'Pages' controller's urls.
 */
	Router::connect('/index', array('controller' => 'articles', 'action' => 'news'));
	Router::connect('/contactus', array('controller' => 'articles', 'action' => 'contactus'));
	Router::connect("/", array("controller" => "articles", "action" => "news"));
	
	Router::connect('/index/*',array('controller' => 'articles','action' => 'index')); // routing for static pages where sname is static page name ex. @Home
	Router::connect('/news-areas/*',array('controller' => 'categories','action' => 'index')); // routing for static pages where sname is static page name ex. @Home
	
	Router::connect('/pages/*', array('controller' => 'articles', 'action' => 'display'));
	Router::connect('/verdict_list', array('controller' => 'categories', 'action' => 'verdict_list'));
?>