<?php
App::uses('AppController', 'Controller');



/**
 * Methods Controller
 *
 * @property Method $Method
 * @property PaginatorComponent $Paginator
 */
class MethodsController extends AppController {
	
	
	public function index($id = null) {				
		
		
		if($id){
			$this->Session->write('DataCollection_id', $id);
		}else{
			$id = $this->Session->read('DataCollection_id');
		}
		
		
		$dataCollection = $this->Method->DataCollection->find('first', array('conditions' => array('DataCollection.id' => $id), 'recursive' => 2));		
		$this->Session->write('DataCollection', $dataCollection);	
		
		
		
		App::import('Vendor', 'Sources/'. $dataCollection['DataProvider']['SourceType']['name'] .'DataSource');		
		$tableList = dataSource_loadTables($dataCollection['DataProvider']["params"],$dataCollection['DataCollection']['dbname'] );
		$this->set('tableList', $tableList);
		
								
		$this->set('items', $this->Method->find('all', array('conditions' => array('DataCollection.id' => $id))));			
		
	}
	
	
	public function form($id = null) {
			
		if ($this->request->is(array('post', 'put'))) {
			if($id)	$this->Method->create();
						
			if ($this->Method->save($this->request->data)) {
				$this->Session->setFlash(__('The source type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The source type could not be saved. Please, try again.'));
			}
		}else if($this->request->is('delete')){
			$this->Method->id = $id;
			if ($this->Method->delete()) {			
				
			}
		}
					
		if ($this->Method->exists($id)) {
			$options = array('conditions' => array('Method.' . $this->Method->primaryKey => $id));
			$this->request->data = $this->Method->find('first', $options);
			$this->set('id', $id);
		}else{
			$this->set('id', null);
		}	
		
					
	}
	

}