<?php
App::uses('AppController', 'Controller');
/**
 * DataApis Controller
 *
 * @property DataApi $DataApi
 * @property PaginatorComponent $Paginator
 */
class DataApisController extends AppController {
	
	public function index($id = null) {
		if($id){
			$this->Session->write('DataApp_id', $id);
		}else{
			$id = $this->Session->read('DataApp_id');
		}
		
		
		$dataApp = $this->DataApi->DataApp->findById($id);		
		$this->Session->write('DataApp', $dataApp);	
		
				
		$this->set('items', $this->DataApi->find('all', array('conditions' => array('DataApp.id' => $id))));		
		
	}
	
	
	public function form($id = null) {
			
		if ($this->request->is(array('post', 'put'))) {
			if(!$id)	$this->DataApi->create();		
						
			if ($this->DataApi->save($this->request->data)) {
				$this->Session->setFlash(__('The source type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The source type could not be saved. Please, try again.'));
			}
		}else if($this->request->is('delete')){
			$this->DataApi->id = $id;
			if ($this->DataApi->delete()) {			
				
			}
		}
					
		if ($this->DataApi->exists($id)) {
			$options = array('conditions' => array('DataApi.' . $this->DataApi->primaryKey => $id));
			$this->request->data = $this->DataApi->find('first', $options);
			$this->set('id', $id);
		}else{
			$this->set('id', null);
		}	
		
					
	}

}