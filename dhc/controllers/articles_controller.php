<?php
class ArticlesController extends AppController {

	var $name = 'Articles';
	var $helpers = array('Paginator', 'Javascript', 'Ajax');
	var $components = array('Auth', 'Session', 'RequestHandler');

	function index($url="") 
	{
		$url=urldecode($url);
		//echo $url;
		$this->loadModel('SiteSetting');
		$page_title=$this->SiteSetting->getValues();
		if($url=="")
		{
			$pageContent = $this->Article->find('all',array('fields' => array('Article.id', 'Article.article_type_id', 'Article.article_name','Article.link_title','Article.url','Article.content','Article.keywords','Article.description','Article.news_type_id'), 'conditions' => array('Article.id' => '14')));
		}
		else
		{
			$pageContent = $this->Article->find('all',array('fields' => array('Article.id', 'Article.article_type_id','Article.article_name','Article.link_title','Article.url','Article.content','Article.keywords','Article.description','Article.news_type_id'), 'conditions' => array('Article.url' => $url)));
		}
		//exit;
		if($pageContent[0]['Article']['id']!=14)
		{
			if ($pageContent[0]['Article']['pagetitle']=="") {
				$pagewindowtitle = $pageContent[0]['Article']['article_name']." > ".$page_title[0];
			} else {
				$pagewindowtitle = $pageContent[0]['Article']['pagetitle'];
			} 
			$page_title=array($pagewindowtitle, $pageContent[0]['Article']['keywords'], $pageContent[0]['Article']['description'], $page_title[3]);
		}
		//echo "<pre>";print_r($pageContent);exit;
		$categoryImages = $this->CategoryImages->find('all',array('conditions' =>array("article_id" =>$pageContent[0]['Article']['id']), 'order'=>array('position'=>'ASC')));
		if(count($categoryImages)>0){}elseif($pageContent[0]['Article']['article_type_id']==2)
		{
			$categoryImages = $this->CategoryImages->find('all',array('conditions' =>array("category_id" =>99998), 'order'=>array('position'=>'ASC')));
		}
		if(count($categoryImages)>0)
		{
			$this->set(compact('pageContent', 'page_title', 'categoryImages'));
		}
		else
		{
			$this->set(compact('pageContent', 'page_title'));
		}
		if($page_title[3]==1)
		{
			$this->layout = "site_off";
			$this->render('home_off');
		}
		else
		{
			
			if($pageContent[0]['Article']['id']==14)
			{
				$this->layout = "default_front_end_home";
				$this->render('home');
			if ($pageContent[0]['Article']['pagetitle']=="") {
				$pagewindowtitle = $pageContent[0]['Article']['article_name']." > ".$page_title[0];
			} else {
				$pagewindowtitle = $pageContent[0]['Article']['pagetitle'];
			} 
			$page_title=array($pagewindowtitle, $pageContent[0]['Article']['keywords'], $pageContent[0]['Article']['description'], $page_title[3]);
			}
			else
			{
				$this->layout = "default_front_end";
			}
		}
	}
	function display($param1="", $url="Jackson") 
	{
		$this->loadModel('SiteSetting');
		$page_title=$this->SiteSetting->getValues();
		
		$this->layout = "default_front_end";
		$pageContent = $this->Article->find('all',array('conditions' => array('Article.url' => $url)));
		$categoryVals = $this->Category->find('all',array('conditions' => array('Category.id' => $pageContent[0]['Article']['category_id'])));
		  if ($pageContent[0]['Article']['pagetitle']=="") {
			  $pagewindowtitle = $pageContent[0]['Article']['article_name']." > ".$categoryVals[0]['Category']['category_name']." ".$page_title[0];
		  } else {
			  $pagewindowtitle = $pageContent[0]['Article']['pagetitle'];
		  }
		$page_title=array($pagewindowtitle, $pageContent[0]['Article']['keywords'], $pageContent[0]['Article']['description']);
		$categoryImagesx = $this->CategoryImages->find('all',array('conditions' =>array("article_id" =>$pageContent[0]['Article']['id']), 'order'=>array('position'=>'ASC')));
		
		
		$categoryArticles = $this->Article->find('all',array('fields' => array('Article.id','Article.article_name', 'Article.link_title', 'Article.url'), 'conditions' => array('category_id' => $categoryVals[0]['Category']['id'], 'article_type_id'=>'1'), 'order'=>array('Article.position'=>'ASC')));
		//print_r($categoryArticles);exit;
		
		if(count($categoryImagesx)>0)
		{
			$categoryImages=$categoryImagesx;
			$this->set(compact('pageContent', 'categoryVals', 'categoryArticles', 'page_title', 'categoryImages'));
		}
		elseif(count($categoryVals[0]['CategoryImage'])>0)
		{
			$icx=0;
			foreach($categoryVals[0]['CategoryImage'] as $CategoryImage)
			{
				$categoryImages[$icx]['CategoryImages']=$CategoryImage;
				$icx++;
			}
			$this->set(compact('pageContent', 'categoryVals', 'categoryArticles', 'page_title', 'categoryImages'));
		}
		else
		{
			$this->set(compact('pageContent', 'categoryVals', 'categoryArticles', 'page_title'));
		}
	}
	function news($param="all", $pagec=1) 
	{
		//echo "jack";exit;
		$this->loadModel('SiteSetting');
		$page_title=$this->SiteSetting->getValues();
		$limit=10;
		$offset=($pagec-1)*$limit;
		
		$this->layout = "default_front_end";
		$news = $this->Article->find('all',array('conditions' => array('Article.article_type_id ' => 2, 'Article.news_type_id ' => 1), 'order'=>array('Article.id'=>'DESC'),'offset'=>$offset, 'limit'=>$limit));
		$press_release = $this->Article->find('all',array('conditions' => array('Article.article_type_id ' => 2, 'Article.news_type_id ' => 2), 'order'=>array('Article.id'=>'DESC'),'offset'=>$offset, 'limit'=>$limit));
		for($ix=0;$ix<count($news);$ix++)
		{
			$news[$ix]['Article']['content']=$this->Article->strip_content($news[$ix]['Article']['content']);
		}
		for($ix=0;$ix<count($press_release);$ix++)
		{
			$press_release[$ix]['Article']['content']=$this->Article->strip_content($press_release[$ix]['Article']['content']);
		}
		
		$news_count = $this->Article->find('count',array('conditions' => array('Article.article_type_id ' => 2, 'Article.news_type_id ' => 1), 'order'=>array('Article.id'=>'DESC')));
		$press_release_count = $this->Article->find('count',array('conditions' => array('Article.article_type_id ' => 2, 'Article.news_type_id ' => 2), 'order'=>array('Article.id'=>'DESC')));
		
		$static_article = $this->Article->find('all',array('conditions' => array('Article.id ' => 46)));
		$categoryImagesx = $this->CategoryImages->find('all',array('conditions' =>array("category_id" =>99998), 'order'=>array('position'=>'ASC')));
		if(count($categoryImagesx)>0)
		{
			$categoryImages=$categoryImagesx;
			$this->set(compact('categoryImages'));
		}
		
		$this->loadModel('SiteSetting');
		$page_title=$this->SiteSetting->getValues();
		
		$page_title[0]="In the news";
		//$categoryImagesx = $this->CategoryImages->find('all',array('conditions' =>array("article_id" =>$pageContent[0]['Article']['id']), 'order'=>array('position'=>'ASC')));
		//print_r($categoryArticles);exit;
		$this->set(compact('news', 'press_release', 'news_count', 'press_release_count', 'static_article','page_title', 'param', 'pagec'));
	}
	function contactus() 
	{
		$categoryImages = $this->CategoryImages->find('all',array('conditions' =>array("category_id" =>99999), 'order'=>array('position'=>'ASC')));
		if(count($categoryImages)>0)
		{
			$this->set(compact('categoryImages'));
		}
		
		if(isset($_POST['submit']) && isset($_POST['disclaimer']))
		{
			$this->loadModel('SiteSetting');
			$SiteSettingVals = $this->SiteSetting->find('all',array('conditions' => array('id' => '1')));
			//echo "<pre>";print_r($SiteSettingVals[0]['SiteSetting']['contact_email']);exit;
			
			$First_Name=mysql_real_escape_string($_POST['First_Name']);
			$Last_Name=mysql_real_escape_string($_POST['Last_Name']);
			$Phone=mysql_real_escape_string($_POST['Phone']);
			$Email=mysql_real_escape_string($_POST['Email']);
			$Zip_Code=mysql_real_escape_string($_POST['Zip_Code']);
			$Case=mysql_real_escape_string($_POST['Case']);
			$Date_Incident_Occured=mysql_real_escape_string($_POST['Date_Incident_Occured']);
			
			
			$subject = 'CMS Customer Contact';
			$headers = "From:".$Email."
Return-path: ".$Email."
MIME-Version: 1.0
Content-type: text/html; charset=iso-8859-1
";
				
			$message="<div>
			<table>
			<tr><td>Name:</td><td>".$First_Name." ".$Last_Name."</td></tr>
			<tr><td>Phone:</td><td>".$Phone."</td></tr>
			<tr><td>Email:</td><td>".$Email."</td></tr>
			<tr><td>Zip Code:</td><td>".$Zip_Code."</td></tr>
			<tr><td>Case Details:</td><td>".$Case."</td></tr>
			<tr><td>Date Incident Occured:</td><td>".$Date_Incident_Occured."</td></tr>
			</table>
			</div>";
			mail("naresh031@gmail.com", $subject, $message, $headers);	
			mail(trim($SiteSettingVals[0]['SiteSetting']['contact_email']), $subject, $message, $headers);	
		}
		$this->layout = "default_front_end";
	}
	function disclaimer() 
	{
		$this->layout = "blank_layout";
	}
	function admin_index($article_type_id=2) 
	{
		//echo "<pre>";print_r($this->paginate());exit;
		
		$userAgent=$this->Session->read('Auth.User');
		if($userAgent['permission_pages']!=1 && $this->name=="Articles" && $article_type_id==1)
		{
			header("location:".HOST_ADDRESS."admin/article_comments");exit;
		}
		elseif($userAgent['permission_news']!=1 && $this->name=="Articles" && $article_type_id==2)
		{
			header("location:".HOST_ADDRESS."admin/article_comments");exit;
		}
		elseif($userAgent['permission_static_pages']!=1 & $this->name=="Articles" && $article_type_id>2)
		{
			header("location:".HOST_ADDRESS."admin/article_comments");exit;
		}
		
		
		$articleTypes = $this->Article->ArticleType->find('list',array('fields' => array('id','type')));
		$categories = $this->Article->Category->find('list',array('fields' => array('id','category_name'), 'conditions'=>array(array("NOT" => array("id" =>array("100001", "99997", "99998", "99999"))))));
		$articleTemplates = $this->Article->ArticleTemplate->find('list',array('fields' => array('id','template')));
		$users = $this->Article->User->find('list',array('fields' => array('id','first_name')));
		$newsTypes = $this->Article->NewsType->find('list',array('fields' => array('id','article')));
		$scategories = $this->Article->NewsType->find('list',array('fields' => array('id','article')));
		$tabValues=array("default-tab current", "", "tab-content default-tab", "tab-content", $article_type_id);
		
		if(isset($this->data['Article']['search']))
		{
			$keyword=$this->data['Article']['cname'];
			$conditions=array("article_type_id"=>$article_type_id ,"OR" => array("Article.article_name LIKE" => "%".$keyword."%","Article.content LIKE" => "%".$keyword."%","Article.keywords LIKE" => "%".$keyword."%","Article.description LIKE" => "%".$keyword."%"));
			$this->paginate = array('conditions' =>$conditions, 'order'=>'Article.position');
			$this->set('articles', $this->paginate());
		}
		elseif(isset($this->data['Article']['filterCategory']))
		{
			if(isset($this->data['Article']['filterCategory']) && $this->data['Article']['filterCategory']>0)
			{	
				$conditions=array("article_type_id"=>$article_type_id , "category_id"=>$this->data['Article']['filterCategory']);
			}
			else
			{
				$conditions=array("article_type_id"=>$article_type_id);
			}
			$this->paginate = array('conditions' =>$conditions);
			$this->set('articles', $this->paginate());
		}
		elseif(isset($this->data['Article']['filterCategory2']))
		{
			if($this->data['Article']['filterCategory2']>0)
			{	
				$conditions=array("article_type_id"=>$article_type_id , "news_type_id"=>$this->data['Article']['filterCategory2']);
			}
			else
			{
				$conditions=array("article_type_id"=>$article_type_id);
			}
			$this->paginate = array('conditions' =>$conditions);
			$this->set('articles', $this->paginate());
		}
		elseif(isset($this->data['Article']['Delete']))
		{
			foreach($this->data["Article"]["id"] as $articleId)
			{
				$queryx="DELETE FROM articles WHERE id='$articleId'";
				mysql_query($queryx) or die("$queryx ".mysql_error());
			}
		}
		elseif(isset($this->data['Article']['Update']))
		{
			foreach($this->data["Article"]["id"] as $articleId)
			{
				$position=$_POST["position_".$articleId];
				$queryx="UPDATE articles SET position='$position' WHERE id='$articleId'";
				mysql_query($queryx) or die("$queryx ".mysql_error());
			}
		}
		elseif(isset($this->data['Article']['submit']))
		{
			$article_type_id=$this->data['Article']['article_type_id'];
			$tabValues=array("", "default-tab current", "tab-content", "tab-content default-tab", $this->data['Article']['article_type_id']);
			//print_r($userAgent);exit;
			$this->data['Article']['user_id']=$this->data['Article']['modified_by']=$userAgent['id'];
			$this->data['Article']['url']=str_replace(array(" ", "/", "'",".",":","?"), "-", $this->data['Article']['article_name']);	
			$this->data['Article']['url']=str_replace("&", "and", $this->data['Article']['url']);	
				
			$this->Article->create();
			//echo "<pre>";print_r($this->data['Article']);exit;
			if ($this->Article->save($this->data)) {
				$articalId = $this->Article->getLastInsertID();
				
				
				if($article_type_id==1)
				{
						$queryx="INSERT INTO article_categories(article_id, category_id)VALUES('$articalId', '".$this->data['Article']['category_id']."')";
						mysql_query($queryx) or die("$queryx ".mysql_error());
				}
				elseif($article_type_id==2)
				{
					$dateCreated=explode("/", $this->data['Article']['created']);
					$dateCreated2=$dateCreated[2]."-".$dateCreated[0]."-".$dateCreated[1];
					$queryx="UPDATE articles SET created='$dateCreated2' WHERE id='$articalId'";
					mysql_query($queryx) or die("$queryx ".mysql_error());
					//echo $queryx;exit;
				}
				
				$this->Session->setFlash(__('The '.$articleTypes[$article_type_id].' has been saved', true));
				$this->redirect(array('action' => 'index', $this->data['Article']['article_type_id']));
			} else {
				$this->Session->setFlash(__('The '.$articleTypes[$article_type_id].' could not be saved. Please, try again.', true));
			}
		}
		$this->Article->recursive = 0;
		if($article_type_id==2)
		{
			$this->paginate = array('conditions' => array('article_type_id' => $article_type_id), 'order'=>array('Article.id'=>'DESC'), 'limit'=>'20');
		}
		else
		{
			$this->paginate = array('conditions' => array('article_type_id' => $article_type_id), 'order'=>'Article.position', 'limit'=>'20');
		}
		if(!isset($this->data['Article']['search']) && !isset($this->data['Article']['filterCategory']) && !isset($this->data['Article']['filterCategory2']))
		{
			$this->set('articles', $this->paginate());
		}
		$this->set('tabValues', $tabValues); 
		$this->set(compact('scategories', 'articleTypes', 'categories', 'articleTemplates', 'users', 'newsTypes'));
		//echo "chode";exit;
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid article', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('article', $this->Article->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Article->create();
			if ($this->Article->save($this->data)) {
				$this->Session->setFlash(__('The article has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The article could not be saved. Please, try again.', true));
			}
		}
		$articleTypes = $this->Article->ArticleType->find('list');
		$categories = $this->Article->Category->find('list');
		$articleTemplates = $this->Article->ArticleTemplate->find('list');
		$users = $this->Article->User->find('list');
		$newsTypes = $this->Article->NewsType->find('list');
		$this->set(compact('articleTypes', 'categories', 'articleTemplates', 'users', 'newsTypes'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid article', true));
			$this->redirect(array('action' => 'index'));
		}

		$this->loadModel('CategoryImage');
		$CategoryImage = $this->CategoryImage->find('all',array('fields' => array('id','article_id','image', 'position'), 'conditions' => array('article_id' => $id)));
		//print_r($CategoryImage);exit;
		
		$articleCategory = $this->Article->ArticleCategory->find('list',array('fields' => array('id','category_id'), 'conditions' => array('article_id' => $id)));
		$articleTypes = $this->Article->ArticleType->find('list',array('fields' => array('id','type')));
		$categories = $this->Article->Category->find('list',array('fields' => array('id','category_name'), 'conditions'=>array(array("NOT" => array("id" =>array("100001", "99997", "99998", "99999"))))));
		$articleTemplates = $this->Article->ArticleTemplate->find('list',array('fields' => array('id','template')));
		$users = $this->Article->User->find('list');
		$newsTypes = $this->Article->NewsType->find('list',array('fields' => array('id','article')));
		$scategories = $this->Article->NewsType->find('list',array('fields' => array('id','article')));
		
		if (!empty($this->data)) 
		{
			$userAgent=$this->Session->read('Auth.User');
			$this->data['Article']['modified_by']=$userAgent['id'];
			$this->data['Article']['url']=str_replace(array(" ", "/", "'", ".", ":", "?"), "-", $this->data['Article']['article_name']);
			$this->data['Article']['url']=str_replace("&", "and", $this->data['Article']['url']);
			if ($this->Article->save($this->data)) {
				if($this->data['Article']['article_type_id']==1)
				{
					$queryx="DELETE FROM article_categories WHERE article_id='$id'";
					mysql_query($queryx) or die("$queryx ".mysql_error());
					
					$queryx="INSERT INTO article_categories(article_id, category_id)VALUES('$id', '".$this->data['Article']['category_id']."')";
					mysql_query($queryx) or die("$queryx ".mysql_error());
				}
				elseif($this->data['Article']['article_type_id']==2)
				{
					$dateCreated=explode("/", $this->data['Article']['created']);
					$dateCreated2=$dateCreated[2]."-".$dateCreated[0]."-".$dateCreated[1];
					$queryx="UPDATE articles SET created='$dateCreated2' WHERE id='$id'";
					mysql_query($queryx) or die("$queryx ".mysql_error());
				}
			
				$this->Session->setFlash(__('The '.$articleTypes[$this->data['Article']['article_type_id']].' has been saved', true));
				$this->redirect(array('action' => 'index', $this->data['Article']['article_type_id']));
			} else {
				$this->Session->setFlash(__('The '.$articleTypes[$this->data['Article']['article_type_id']].' could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Article->read(null, $id);
			$created=explode("-",$this->data['Article']['created']);
			$created2=$created[1]."/".substr($created[2], 0, 2)."/".$created[0];
			$this->data['Article']['created']=$created2;
		}
		$this->set(compact('scategories', 'CategoryImage', 'articleCategory', 'articleTypes', 'categories', 'articleTemplates', 'users', 'newsTypes'));
		//echo "<pre>";print_r($this->data);exit;
	}

	function admin_delete($id = null, $type_id=2) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for article', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Article->delete($id)) {
			$this->Session->setFlash(__('Article deleted', true));
			$this->redirect(array('action'=>'index',$type_id));
		}
		$this->Session->setFlash(__('Article was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}