<?php
/**
 * PHP REST Data Services
 * Copyright (c) Chatura Dilan Perera,(http://www.dilan.me)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Chatura Dilan Perera,(http://www.dilan.me)
 * @link          http://www.dilan.me 
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
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
   		header('Content-Type: text/html');
		echo json_encode($items);		
	}
	
}
