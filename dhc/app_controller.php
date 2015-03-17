<?php
class AppController extends Controller 
{
		var $components = array('Auth' => array(
							 'authorize' => 'actions',
							 'actionPath' => 'controllers/',
							 'loginAction' => array(
							 'controller' => 'users',
							 'action' => 'login',
							 'plugin' => false,
							 'admin' => true),
							 ));							 
	function beforeFilter() 
	{
		$this->Auth->autoRedirect = false;
		$this->Auth->loginAction = array('admin'=>true,'controller'=>'users','action'=>'login');
		$this->Auth->allow('admin_login','admin_logout','index','display','verdict','verdict_list','contactus','disclaimer', 'news', 'press');
		$this->Auth->loginError = '<p align="center">Invalid Username and/or Password</p>';
		$this->Auth->authError = '<p align="center">You are not authorized to access that page</p>';
		
		$userAgent=$this->Session->read('Auth.User');
		if($userAgent['id']>0)
		{
			if($userAgent['id']!=1 && ($this->name=="SiteSettings" || $this->name=="Users"))
			{
				header("location:".HOST_ADDRESS."admin/article_comments");exit;
			}
			if($userAgent['id']!=1 && $this->name=="Users" && $this->data['Category']['id']!=100001)
			{
				header("location:".HOST_ADDRESS."admin/article_comments");exit;
			}
		}
		$admin = explode('_',$this->action);
		if($admin[0] != 'admin')
		{
			$this->loadModel('Category');
			$categories = $this->Category->find('all',array('fields' => array('Category.id','Category.category_name','Category.link_title','Category.content','Category.url'), 'conditions' =>array("NOT" => array("Category.id" =>array("99997", "99998", "99999", "100001"))), 'order'=>array('position'=>'ASC')));
			$this->loadModel('CategoryImages');
			$categoryImages = $this->CategoryImages->find('all',array('conditions' =>array("category_id" =>"100001"), 'order'=>array('position'=>'ASC')));
			$icx=0;
			$this->loadModel('Article');
			foreach($categories as $category)
			{
				//array_push($spage_details,$spage['Spage']);
				$articles = $this->Article->find('all',array('fields' => array('Article.id','Article.article_name','Article.link_title','Article.url'), 'conditions' => array('category_id' => $category['Category']['id'], 'article_type_id'=>'1'), 'order'=>array('Article.position'=>'ASC')));
				$categories[$icx]['Category']['pages']=$articles;
				$icx++;
			}
			$this->loadModel('SiteSetting');
			$page_title=$this->SiteSetting->getValues();
			
			$this->set(compact('categories', 'categoryImages', 'page_title'));
		}
	}
}
?>