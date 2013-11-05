<?php
App::uses('AppController', 'Controller');
/**
 * DataCollections Controller
 *
 * @property DataCollection $DataCollection
 * @property PaginatorComponent $Paginator
 */
class DataCollectionsController extends AppController {



	public function index($id = null) {
		if($id){
			$this->Session->write('DataApp_id', $id);
		}else{
			$id = $this->Session->read('DataApp_id');
		}
		
		
		$dataApp = $this->DataCollection->DataApp->findById($id);		
		$this->Session->write('DataApp', $dataApp);	
		
				
		$this->set('items', $this->DataCollection->find('all', array('conditions' => array('DataApp.id' => $id))));		
		
	}
	
	
	public function form($id = null) {
			
		if ($this->request->is(array('post', 'put'))) {
			if($id)	$this->DataCollection->create();
						
			if ($this->DataCollection->save($this->request->data)) {
				$this->Session->setFlash(__('The source type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The source type could not be saved. Please, try again.'));
			}
		}else if($this->request->is('delete')){
			$this->DataCollection->id = $id;
			if ($this->DataCollection->delete()) {			
				
			}
		}
					
		if ($this->DataCollection->exists($id)) {
			$options = array('conditions' => array('DataCollection.' . $this->DataCollection->primaryKey => $id));
			$this->request->data = $this->DataCollection->find('first', $options);
			$this->set('id', $id);
		}else{
			$this->set('id', null);
		}
		
		$this->set('dataProviders', $this->DataCollection->DataProvider->find('list'));	
					
	}

}