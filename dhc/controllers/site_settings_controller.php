<?php
class SiteSettingsController extends AppController {

	var $name = 'SiteSettings';
	var $helpers = array('Paginator', 'Javascript', 'Ajax');
	var $components = array('Auth', 'Session', 'RequestHandler' );

	function admin_index() {
		$this->SiteSetting->recursive = 0;
		$this->set('siteSettings', $this->paginate());
	}
	function admin_home_rotator() {
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid site setting', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('siteSetting', $this->SiteSetting->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->SiteSetting->create();
			if ($this->SiteSetting->save($this->data)) {
				$this->Session->setFlash(__('The site setting has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The site setting could not be saved. Please, try again.', true));
			}
		}
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid site setting', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			//print_r($this->data);exit;
			if ($this->SiteSetting->save($this->data)) {
				$this->Session->setFlash(__('The site setting has been saved', true));
				//$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The site setting could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->SiteSetting->read(null, $id);
		}
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for site setting', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->SiteSetting->delete($id)) {
			$this->Session->setFlash(__('Site setting deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Site setting was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
