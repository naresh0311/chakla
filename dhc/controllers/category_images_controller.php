<?php
class CategoryImagesController extends AppController {

	var $name = 'CategoryImages';
	var $helpers = array('Paginator', 'Javascript', 'Ajax');
	var $components = array('Auth', 'Session', 'RequestHandler' ,'Upload');

	function admin_index() {
		$this->CategoryImage->recursive = 0;
		$this->set('categoryImages', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid category image', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('categoryImage', $this->CategoryImage->read(null, $id));
	}

	function admin_add($id="", $image_type="") {
		if (!empty($this->data)) {
			
			//print_r($this->data);exit;
				
			if($this->data['CategoryImage']['image']['name']!='')
			{
				$uploaddir = APP."webroot/img/products_images/";
				$filename = trim(rand(100, 999)."-".$this->data['CategoryImage']['image']['name']);
				//print_r($this->data['CategoryImage']['image']);exit;
				
				list($width, $height)=getImageSize($this->data['CategoryImage']['image']['tmp_name']);
				if(($width=="961"|| $width=="1400")  && ($height=="300" || $height=="450"))
				{
					$this->Upload->upload($this->data['CategoryImage']['image'], $uploaddir, $filename);
					$errors = $this->Upload->errors;
				}
				else
				{
					$errors = $this->Upload->errors[0] ="Upload file with dimension 1400x450";
				}
			}
			else
			{
				$errors = '';
				$filename = '';
			}
			if($errors!='')
			{
				//print_r($this->Upload->errors);exit;
				$this->Session->setFlash(__('Problem in uploading image '.implode('<br/>',$this->Upload->errors), true),'');
			}
			else
			{
				$this->CategoryImage->create();
				$this->data['CategoryImage']['image'] = $filename;
				//print_r($this->data['CategoryImage']);exit;
				if($image_type=="page")
				{
					$redirectVal=array('controller' => 'articles', 'action' => 'edit', $this->data['CategoryImage']['article_id']);
				}
				else
				{
					$redirectVal=array('controller' => 'categories', 'action' => 'edit', $this->data['CategoryImage']['category_id']);
				}
				//print_r($this->data);exit;
				if ($this->CategoryImage->save($this->data)) {
					$this->Session->setFlash(__('The image has been saved', true));
					$this->redirect($redirectVal);
				} else {
					$this->Session->setFlash(__('The image could not be saved. Please, try again.', true));
					//$this->redirect(array('controller' => 'category_images', 'action' => 'add', $this->data['CategoryImage']['category_id']));
				}
			}
		}
		$categories = $this->CategoryImage->Category->find('list');
		$this->set(compact('categories'));
		$this->set("id", $id);
		if(isset($image_type))
		{
			$this->set("page", $image_type);
		}
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid category image', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->CategoryImage->save($this->data)) {
				$this->Session->setFlash(__('The image has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The image could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->CategoryImage->read(null, $id);
		}
		$categories = $this->CategoryImage->Category->find('list');
		$this->set(compact('categories'));
	}

	function admin_delete($id = null, $id2=null, $image_type="") {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for category image', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->CategoryImage->delete($id)) {
			$this->Session->setFlash(__('Image deleted', true));
			if($image_type=="page")
			{
				$this->redirect(array('controller'=>'articles', 'action'=>'edit', $id2));
			}
			else
			{
				$this->redirect(array('controller'=>'categories', 'action'=>'edit', $id2));
			}
		}
		$this->Session->setFlash(__('Category image was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
