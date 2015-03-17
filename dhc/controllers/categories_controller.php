<?php
class CategoriesController extends AppController {

	var $name = 'Categories';
	var $helpers = array('Paginator', 'Javascript', 'Ajax');
	var $components = array('Auth', 'Session', 'RequestHandler' );

	function index($url="News") 
	{
		$this->layout = "default_front_end";
		$categoryVals = $this->Category->find('all',array('conditions' => array('Category.url' => $url),'order' => array('Category.position' => 'ASC')));
		//print_r($categoryVals);exit;
		if ($categoryVals[0]['Category']['pagetitle']=="") {
			$pagewindowtitle = $categoryVals[0]['Category']['category_name'];
		} else {
			$pagewindowtitle = $categoryVals[0]['Category']['pagetitle'];
		} 
		$page_title=array($pagewindowtitle, $categoryVals[0]['Category']['keywords'], $categoryVals[0]['Category']['description']);
		//echo "<pre>";print_r($categoryVals);exit;

		//echo "<pre>";print_r($categoryVals);print_r($categories);exit;
		$categoryArticles = $this->Article->find('all',array('fields' => array('Article.id','Article.article_name','Article.link_title','Article.url'), 'conditions' => array('category_id' => $categoryVals[0]['Category']['id'], 'article_type_id'=>'1'), 'order'=>array('Article.position'=>'ASC')));
		if(count($categoryVals[0]['CategoryImage'])>0)
		{
			$icx=0;
			foreach($categoryVals[0]['CategoryImage'] as $CategoryImage)
			{
				$categoryImages[$icx]['CategoryImages']=$CategoryImage;
				$icx++;
			}
			$this->set(compact('categoryVals', 'categoryArticles', 'page_title', 'categoryImages'));
		}
		else
		{
			$this->set(compact('categoryVals', 'categoryArticles', 'page_title'));
		}
		//$categories = $this->Category->find('all',array('conditions' => array('Category.url' => $url)));
	}
	
	function verdict($url="News") 
	{
		$this->layout = "default_front_end";
		$categoryVals = $this->Category->find('all',array('fields' => array('Category.id', 'Category.category_name', 'Category.category_verdict', 'Category.url'), 'conditions' => array('Category.url' => $url)));
		//echo "<pre>";print_r($categoryVals);exit;
		
		$this->loadModel('SiteSetting');
		$page_title=$this->SiteSetting->getValues();
		
		$page_title[0]=$categoryVals[0]['Category']['category_name']." - Matters";
		$this->set(compact('categoryVals', 'page_title'));
		if(count($categoryVals[0]['CategoryImage'])>0)
		{
			$icx=0;
			foreach($categoryVals[0]['CategoryImage'] as $CategoryImage)
			{
				$categoryImages[$icx]['CategoryImages']=$CategoryImage;
				$icx++;
			}
			$this->set(compact('categoryVals', 'categoryArticles', 'page_title', 'categoryImages'));
		}
		
	}
	function verdict_list() 
	{
		$this->layout = "default_front_end";
		$categoryVals = $this->Category->find('all',array('fields' => array('Category.id', 'Category.category_name', 'Category.category_verdict', 'Category.url'), 'order'=>array('Category.category_name'=>'ASC')));
		$this->loadModel('SiteSetting');
		$page_title=$this->SiteSetting->getValues();
		
		$page_title[0]="Matters";
		$this->set(compact('categoryVals', 'page_title'));
	}
	
	function admin_index() {
		$this->Category->recursive = 0;
		
		$conditions=array("NOT" => array("id" =>array("99997", "99998", "99999", "100001")));
		$this->paginate=array('conditions'=>$conditions, 'order'=>'position', 'limit'=>'20');
		$this->set('categories', $this->paginate());
		//echo "<pre>";print_r($this->paginate());exit;
		$userAgent=$this->Session->read('Auth.User');
		if($userAgent['permission_catogories']!=1 && $this->name=="Categories")
		{
			header("location:".HOST_ADDRESS."admin/article_comments");exit;
		}
		
		$tabValues=array("default-tab current", "", "tab-content default-tab", "tab-content");
		if(isset($this->data['Category']['search']))
		{
			$keyword=$this->data['Category']['cname'];
			$conditions=array(array("NOT" => array("id" =>array("99997", "99998", "99999", "100001"))), "OR" => array("category_name LIKE" => "%".$keyword."%","category_verdict LIKE" => "%".$keyword."%"));
			$this->paginate = array('conditions' =>$conditions, 'order'=>'position');
			$this->set('categories', $this->paginate());
		}
		elseif(isset($this->data['Category']['submit']) || isset($this->data['Category']['submitImage']))
		{
			$tabValues=array("", "default-tab current", "tab-content", "tab-content default-tab");
			$this->Category->create();
			if ($this->Category->save($this->data)) 
			{
				$categoryId = $this->Category->getLastInsertID();
				$categoryUrl=str_replace(array(" ", "/", "'" ), "-", $this->data['Category']['category_name']);	
				$categoryUrl=str_replace("&", "and", $categoryUrl);
				
				$queryx="UPDATE categories SET url='$categoryUrl' WHERE id='$categoryId'";
				mysql_query($queryx) or die("$queryx ".mysql_error());
					
				if($this->data['Category']['submitImage'])
				{
					$this->redirect(array('controller' => 'category_images','action' => 'add', $categoryId));
				}
				else
				{
					$this->Session->setFlash(__('The Category has been saved', true));
					$this->redirect(array('action' => 'index'));
				}
			} else {
				$this->Session->setFlash(__('The Category could not be saved. Please, try again.', true));
			}
		}
		elseif(isset($this->data['Category']['Update']))
		{
			$selectedIds2=explode("~", $_POST['selectedIds']);
			for($icx=1;$icx<count($selectedIds2);$icx++)
			{
				$articleId=$selectedIds2[$icx];
				$position=$_POST["position_".$articleId];
				$queryx="UPDATE categories SET position='$position' WHERE id='$articleId'";
				mysql_query($queryx) or die("$queryx ".mysql_error());
			}
			/*
			foreach($this->data["Category"]["id"] as $articleId)
			{
				$position=$_POST["position_".$articleId];
				$queryx="UPDATE categories SET position='$position' WHERE id='$articleId'";
				mysql_query($queryx) or die("$queryx ".mysql_error());
			}
			*/
			$this->Session->setFlash(__('Selected Category Position Updated Sucessfully', true));
			$this->set('categories', $this->paginate());
		}
		elseif(isset($this->data['Category']['delete']))
		{
			foreach($this->data["Category"]["id"] as $articleId)
			{
				$queryx="DELETE FROM categories WHERE id='$articleId'";
				mysql_query($queryx) or die("$queryx ".mysql_error());
			}
			$this->Session->setFlash(__('Selected Category Deleted Sucessfully', true));
			$this->set('categories', $this->paginate());
		}
		else
		{
			$conditions=array("NOT" => array("id" =>array("99997", "99998", "99999", "100001")));
			$this->paginate=array('conditions'=>$conditions, 'order'=>'position', 'limit'=>'20');
			$this->set('categories', $this->paginate());
			//echo "thats it";exit;
		}
		$this->set('tabValues', $tabValues);
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid category', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('category', $this->Category->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Category->create();
			if ($this->Category->save($this->data)) {
				$this->Session->setFlash(__('The category has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The category could not be saved. Please, try again.', true));
			}
		}
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid category', true));
			$this->redirect(array('action' => 'index'));
		}
		$userAgent=$this->Session->read('Auth.User');
		if($userAgent['permission_catogories']!=1 && $this->name=="Categories" && $id!=100001)
		{
			header("location:".HOST_ADDRESS."admin/article_comments");exit;
		}
		elseif($userAgent['permission_home_rotator']!=1 && $this->name=="Categories" && $id==100001)
		{
			header("location:".HOST_ADDRESS."admin/article_comments");exit;
		}
		
		if (!empty($this->data)) {
			//echo "<pre>";print_r($this->data);exit;
			foreach($this->data['CategoryImage']['position'] as $key=> $value)
			{
				$queryx="UPDATE category_images SET position='$value' WHERE id='$key'";
				mysql_query($queryx) or die("$queryx ".mysql_error());
			}
			if(isset($this->data['Article']['position']))
			{
				foreach($this->data['Article']['position'] as $key=> $value)
				{
					$queryx="UPDATE articles SET position='$value' WHERE id='$key'";
					mysql_query($queryx) or die("$queryx ".mysql_error());
				}
			}
			$this->data['Category']['url']=str_replace(array(" ", "/", "'" ), "-", $this->data['Category']['category_name']);
			$this->data['Category']['url']=str_replace("&", "and", $this->data['Category']['url']);
			
			if ($this->Category->save($this->data)) {
				if($id<99996 || $id>100002)
				{
				//echo "id=".$id;exit;
					$this->Session->setFlash(__('The category has been saved', true));
					$this->redirect(array('action' => 'index'));
				}
				else
				{
					$this->Session->setFlash(__('Banner has been saved', true));
				}
			} else {
				$this->Session->setFlash(__('The category could not be saved. Please, try again.', true));
			}
		}
			$this->data = $this->Category->read(null, $id);
			$this->loadModel('Article');
			if($id>99996 && $id<100002)
			{
				$this->loadModel('CategoryImage');
				$CategoryImage1 = $this->CategoryImage->find('all', array('fields'=>array('id', 'category_id','article_id', 'image','position'), 'conditions'=>array('CategoryImage.category_id'=>'100001'), 'order'=>array('CategoryImage.position'=>'ASC')));
				$CategoryImage2 = $this->CategoryImage->find('all', array('fields'=>array('id', 'category_id','article_id', 'image','position'), 'conditions'=>array('CategoryImage.category_id'=>'99997'), 'order'=>array('CategoryImage.position'=>'ASC')));
				$CategoryImage3 = $this->CategoryImage->find('all', array('fields'=>array('id', 'category_id','article_id', 'image','position'), 'conditions'=>array('CategoryImage.category_id'=>'99998'), 'order'=>array('CategoryImage.position'=>'ASC')));
				$CategoryImage4 = $this->CategoryImage->find('all', array('fields'=>array('id', 'category_id','article_id', 'image','position'), 'conditions'=>array('CategoryImage.category_id'=>'99999'), 'order'=>array('CategoryImage.position'=>'ASC')));
				$this->set(compact('CategoryImage1', 'CategoryImage2', 'CategoryImage3', 'CategoryImage4'));
				//echo "<pre>";print_r($CategoryImage1);exit;
			}
			
			foreach($this->data['ArticleCategory'] as $images)
			{
				$articleIds[]=$images['article_id'];
			}
			if(isset($articleIds))
			{
				$articles = $this->Article->find('all',array('fields' => array('Article.article_name','Article.position'), 'conditions' => array('Article.id' => $articleIds), 'order'=>array('position'=>'ASC')));
				$this->set('articles', $articles);
			}
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for category', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Category->delete($id)) {
			$this->Session->setFlash(__('Category deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Category was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
