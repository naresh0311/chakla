<?php
class UsersController extends AppController {

	var $name = 'Users';
	var $helpers = array('Paginator', 'Javascript', 'Ajax');
	var $components = array('Auth', 'Session', 'RequestHandler' );

	
/*
	function beforeFilter() {
    parent::beforeFilter();
    $this->Auth->allow('*');
    }
*/

	
	
	function admin_index() {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
		$tabValues=array("default-tab current", "", "tab-content default-tab", "tab-content", "");
		$passwordVal="";
		
		if(isset($this->data['User']['search']))
		{
			$keyword=$this->data['User']['cname'];
			$conditions=array("OR" => array("first_name LIKE" => "%".$keyword."%","last_name LIKE" => "%".$keyword."%","username LIKE" => "%".$keyword."%","email LIKE" => "%".$keyword."%"));
			$this->paginate = array('conditions' =>$conditions);
			$this->set('users', $this->paginate());
		}
		elseif(isset($this->data['User']['Delete']))
		{
			foreach($this->data["User"]["id"] as $articleId)
			{
				$queryx="DELETE FROM users WHERE id='$articleId'";
				mysql_query($queryx) or die("$queryx ".mysql_error());
			}
			$this->redirect(array('action' => 'index'));
		}
		elseif(isset($this->data['User']['action']))
		{
			foreach($this->data["User"]["id"] as $articleId)
			{
				if($this->data['User']['apply']=="Delete")
				{
					$queryx="DELETE FROM users WHERE id='$articleId'";
					//echo "<br>".$queryx;
					mysql_query($queryx) or die("$queryx ".mysql_error());
				}
			}
			//echo "<br>None";exit;
			$this->redirect(array('action' => 'index'));
		}
		elseif(isset($this->data['User']['submit']))
		{
			//echo "<pre>";print_r($_POST['data']['User']);exit;
			$tabValues=array("", "default-tab current", "tab-content", "tab-content default-tab", mysql_real_escape_string($_POST['data']['User']['password']));
			$this->User->create();
			if(!isset($this->data['User']['permission_catogories']))
			{
				$this->data['User']['permission_catogories']=0;
			}
			if(!isset($this->data['User']['permission_pages']))
			{
				$this->data['User']['permission_pages']=0;
			}
			if(!isset($this->data['User']['permission_news']))
			{
				$this->data['User']['permission_news']=0;
			}
			if(!isset($this->data['User']['permission_home_rotator']))
			{
				$this->data['User']['permission_home_rotator']=0;
			}
			if(!isset($this->data['User']['permission_static_pages']))
			{
				$this->data['User']['permission_static_pages']=0;
			}
			if(!isset($this->data['User']['modification_email_status']))
			{
				$this->data['User']['modification_email_status']=0;
			}
			
			if ($this->User->save($this->data)) {
				$this->Session->setFlash(__('The user has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.', true));
			}
			//echo "yes inside too";exit;
		}
		$this->set('tabValues', $tabValues);
	}
	

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid user', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('user', $this->User->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->User->create();
			if ($this->User->save($this->data)) {
				$this->Session->setFlash(__('The user has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.', true));
			}
		}
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid user', true));
			//$this->redirect(array('action' => 'index'));
		}
	
		if (!empty($this->data)) {
		if(!isset($this->data['User']['permission_catogories']))
		{
			$this->data['User']['permission_catogories']=0;
		}
		if(!isset($this->data['User']['permission_pages']))
		{
			$this->data['User']['permission_pages']=0;
		}
		if(!isset($this->data['User']['permission_news']))
		{
			$this->data['User']['permission_news']=0;
		}
		if(!isset($this->data['User']['permission_home_rotator']))
		{
			$this->data['User']['permission_home_rotator']=0;
		}
		if(!isset($this->data['User']['permission_static_pages']))
		{
			$this->data['User']['permission_static_pages']=0;
		}
		if(!isset($this->data['User']['modification_email_status']))
		{
			$this->data['User']['modification_email_status']=0;
		}
			//print_r($this->data['User']);exit;
			if ($this->User->save($this->data)) {
				$this->Session->setFlash(__('The user has been saved', true));
				
				$userAgent=$this->Session->read('Auth.User');
				if($userAgent['id']!=$id)
				{
					$this->redirect(array('action' => 'index'));
				}
				else
				{
					$this->redirect(array('controller' => 'article_comments'));
				}
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->User->read(null, $id);
		}
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for user', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->User->delete($id)) {
			$this->Session->setFlash(__('User deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('User was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	 function admin_login() 
	{
		$this->layout = "default2";
		if ($this->Session->read('Auth.User')) 
		{
			$this->redirect('/admin/article_comments', null, false);
		}
		if(isset($this->data['User']['username']))
		{
			$conditions=array('username' => $this->data['User']['username'], 'password' => $this->Auth->password($this->data['User']['password']));
			$admin=$this->User->find('all', array('conditions'=>$conditions));
			if(count($admin)>0)
			{
				//echo "yakk2--".count($admin)."--<pre>";print_r($conditions);print_r($admin);exit;
				$success=1;
				$this->Session->write('Auth.User', $admin[0]['User']);
				$this->redirect('/admin/article_comments', null, false); // redirect to default place
			}
			else
			{
				//echo "nakk2--".count($admin)."--<pre>";print_r($conditions);print_r($admin);exit;
				$this->Session->setFlash('Incorrect email or password');
			}
		}
    }
	 function login() 
	{
		$this->layout = "default2";
		if ($this->Session->read('Auth.User')) 
		{
			$this->redirect('/admin/article_comments', null, false);
		}
    }
    function admin_logout() {
		//echo "got";exit;

		//$this->Session->setFlash('Good-Bye');
   		 //$this->redirect($this->Auth->logout());
	 	$this->Session->write('Auth.User', "bakra");
		$this->Session->destroy();
		$this->redirect(HOST_URL."admin");exit;
    }
}
