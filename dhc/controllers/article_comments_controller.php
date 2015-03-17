<?php
class ArticleCommentsController extends AppController {

	var $name = 'ArticleComments';
	var $helpers = array('Paginator', 'Javascript', 'Ajax');
	var $components = array('Auth', 'Session', 'RequestHandler' );

	function admin_index() 
	{
		$this->ArticleComment->recursive = 0;
		$conditions = array("status > " => "-1");
		
		if(isset($this->data['ArticleComment']['Approve']))
		{
			foreach($this->data["ArticleComment"]["id"] as $articleId)
			{
				$queryx="UPDATE article_comments SET status='1' WHERE id='$articleId'";
				mysql_query($queryx) or die("$queryx ".mysql_error());
				$this->Session->setFlash(__('Selected Comments Approved Sucessfully', true));
			}
		}
		elseif(isset($this->data['ArticleComment']['Decline']))
		{
			foreach($this->data["ArticleComment"]["id"] as $articleId)
			{
				$queryx="UPDATE article_comments SET status='2' WHERE id='$articleId'";
				mysql_query($queryx) or die("$queryx ".mysql_error());
				$this->Session->setFlash(__('Selected Comments Declined', true));
			}
		}
		$this->paginate = array('conditions' =>$conditions, 'order'=>'status');
		$this->set('articleComments', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid article comment', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('articleComment', $this->ArticleComment->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->ArticleComment->create();
			if ($this->ArticleComment->save($this->data)) {
				$this->Session->setFlash(__('The article comment has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The article comment could not be saved. Please, try again.', true));
			}
		}
		$articles = $this->ArticleComment->Article->find('list');
		$this->set(compact('articles'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid article comment', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->ArticleComment->save($this->data)) {
				$this->Session->setFlash(__('The article comment has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The article comment could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ArticleComment->read(null, $id);
		}
		$articles = $this->ArticleComment->Article->find('list');
		$this->set(compact('articles'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for article comment', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ArticleComment->delete($id)) {
			$this->Session->setFlash(__('Article comment deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Article comment was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
