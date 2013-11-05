<?php
App::uses('AppController', 'Controller');
/**
 * DataApps Controller
 *
 * @property DataApp $DataApp
 * @property PaginatorComponent $Paginator
 */
class DataAppsController extends AppController {
	
	
	public function index() {		
		$this->set('items', $this->DataApp->find('all'));		
	}
	
	
	public function form($id = null) {
			
		if ($this->request->is(array('post', 'put'))) {
			if($id)	$this->DataApp->create();
						
			if ($this->DataApp->save($this->request->data)) {
				$this->Session->setFlash(__('The source type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The source type could not be saved. Please, try again.'));
			}
		}else if($this->request->is('delete')){
			$this->DataApp->id = $id;
			if ($this->DataApp->delete()) {			
				
			}
		}
					
		if ($this->DataApp->exists($id)) {
			$options = array('conditions' => array('DataApp.' . $this->DataApp->primaryKey => $id));
			$this->request->data = $this->DataApp->find('first', $options);
			$this->set('id', $id);
		}else{
			$this->set('id', null);
		}	
					
	}
	
	
	

}