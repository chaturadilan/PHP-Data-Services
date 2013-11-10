<?php
App::uses('AppController', 'Controller');
/**
 * DataAuths Controller
 *
 * @property DataAuth $DataAuth
 * @property PaginatorComponent $Paginator
 */
class DataAuthsController extends AppController {
	
	public function index($id = null) {				
		
		
		if($id){
			$this->Session->write('DataApi_id', $id);
		}else{
			$id = $this->Session->read('DataApi_id');
		}
		
		
		
		$dataApi = $this->DataAuth->DataApi->find('first', array('conditions' => array('DataApi.id' => $id), 'recursive' => 2));		
		$this->Session->write('DataApi', $dataApi);	
		
		foreach($dataApi['DataApp']['DataCollection'] as $dataCollection){
			$dataAuth = $this->DataAuth->find('first', array('conditions' => array('DataAuth.data_collection_id' => $dataCollection['id'], 'DataAuth.data_api_id' => $id), 'recursive' => 2));	
			if(!$dataAuth){
				$this->DataAuth->create();
				$this->DataAuth->save(array('data_api_id' => $id, 'data_collection_id' => $dataCollection['id'], 'auth_type' => 'private'));
			}
		}		
		
		$items  = $this->DataAuth->find('all', array('conditions' => array('DataApi.id' => $id)));
		foreach($items as $item){
			$this->loadModel('DataCollection');	
			$dataCollection = $this->DataCollection->findById($item['DataAuth']['data_collection_id']);
			if(!$dataCollection){
				$this->DataAuth->delete($item['DataAuth']['id']);
			}
		}
		
			
				
						
		$items  = $this->DataAuth->find('all', array('conditions' => array('DataApi.id' => $id)));	
		
		
										
		$this->set('items', $items);		
		
		
	}
	
	
	public function form($id = null) {
		
				
		$aApps = scandir(WWW_ROOT . "auth");
		$aApps = array_diff($aApps, array('.', '..'));
		$authApps = array();
		foreach($aApps as $aApp){
			$authApps[] = array($aApp => $aApp);
		}
		
		$this->set('authApps', $authApps);	
		
			
		if ($this->request->is(array('post', 'put'))) {
						
			
			if(!$id) $this->DataAuth->create();
			
			
			//print_r($this->request->data);
						
			if ($this->DataAuth->save($this->request->data)) {
				$this->Session->setFlash(__('The source type has been saved.'));
				
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The source type could not be saved. Please, try again.'));
			}
		}else if($this->request->is('delete')){
			$this->DataAuth->id = $id;
			if ($this->DataAuth->delete()) {			
				
			}
		}
					
		if ($this->DataAuth->exists($id)) {
			$options = array('conditions' => array('DataAuth.' . $this->DataAuth->primaryKey => $id));			
			$this->request->data = $this->DataAuth->find('first', $options);			
			$this->set('id', $id);
		}else{
			$this->set('id', null);
		}	
		
					
	}
	
	

}