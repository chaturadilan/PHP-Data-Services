<?php
App::uses('AppController', 'Controller');
/**
 * DataProviders Controller
 *
 * @property DataProvider $DataProvider
 * @property PaginatorComponent $Paginator
 */
class DataProvidersController extends AppController {

public function index() {		
		$this->set('items', $this->DataProvider->find('all'));		
	}
	
	
	public function form($id = null) {
			
		if ($this->request->is(array('post', 'put'))) {
			if($id)	$this->DataProvider->create();
						
			if ($this->DataProvider->save($this->request->data)) {
				$this->Session->setFlash(__('The source type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The source type could not be saved. Please, try again.'));
			}
		}else if($this->request->is('delete')){
			$this->DataProvider->id = $id;
			if ($this->DataProvider->delete()) {			
				
			}
		}
					
		if ($this->DataProvider->exists($id)) {
			$options = array('conditions' => array('DataProvider.' . $this->DataProvider->primaryKey => $id));
			$this->request->data = $this->DataProvider->find('first', $options);
			$this->set('id', $id);
		}else{
			$this->set('id', null);
		}
		
		$sourceTypes = $this->DataProvider->SourceType->find('list');		
		$this->set(compact('sourceTypes'));
					
	}
	
	
	public function find_source_by_id($id) {		
		$items =  $this->DataProvider->SourceType->findById($id);
		$this->autoRender = false;
   		header('Content-Type: application/json');
		echo json_encode($items);		
	}
	
}
