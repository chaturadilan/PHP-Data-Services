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
		$sendTableList = array();
		
		
		$items  = $this->Method->find('all', array('conditions' => array('DataCollection.id' => $id)));
		
		
		foreach($tableList as $key=>$table){
				foreach($items as $item){
					if($item['Method']['description'] == $table['name']){
						if($item['Method']["method_type_id"] <= 4){						
							$table[$item['Method']["command"]] = true;						
						}
					}
									
				}
				
				$tableList[$key] = $table;
		}
								
		$this->set('items', $items);		
		$this->set('tableList', $tableList);		
		
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


	public function updateCrud($id = null) {
		
		$params = $this->request->data;		
		
		if($params['value'] == 'true'){
			$this->Method->create();
			$values = array("name" => $params['table'] . "_" . $params['operation'], "description" => $params['table'], "command" => $params['operation'], "data_collection_id" => $params['collection']);
			switch($params['operation']){
				case "create":					
					$values["method_type_id"] = "1";
					$values["http_methods"] = "POST";
					break;
				case "retrieve":					
					$values["method_type_id"] = "2";
					$values["http_methods"] = "GET";
					break;
				case "update":					
					$values["method_type_id"] = "3";
					$values["http_methods"] = "PUT";
					break;
				case "delete":					
					$values["method_type_id"] = "4";
					$values["http_methods"] = "DELETE";
					break;			
			}			
			$this->Method->save($values);
		}else{
			$method = $this->Method->find('first', array('conditions' => array('Method.method_type_id' => $params['opid'], 'Method.description' => $params['table'])));
			$this->Method->delete($method['Method']['id']);
		}
		
		
		$this->autoRender = false;
   		header('Content-Type: application/json');
	}
	

}