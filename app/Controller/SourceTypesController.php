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
 * SourceTypes Controller
 *
 * @property SourceType $SourceType
 * @property PaginatorComponent $Paginator
 */
class SourceTypesController extends AppController {
	
	public function index() {		
		$this->set('items', $this->SourceType->find('all'));		
	}
	
	
	public function form($id = null) {
			
		if ($this->request->is(array('post', 'put'))) {
			if($id)	$this->SourceType->create();
						
			if ($this->SourceType->save($this->request->data)) {
				$this->Session->setFlash(__('The source type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The source type could not be saved. Please, try again.'));
			}
		}else if($this->request->is('delete')){
			$this->SourceType->id = $id;
			if ($this->SourceType->delete()) {			
				
			}
		}
					
		if ($this->SourceType->exists($id)) {
			$options = array('conditions' => array('SourceType.' . $this->SourceType->primaryKey => $id));
			$this->request->data = $this->SourceType->find('first', $options);
			$this->set('id', $id);
		}else{
			$this->set('id', null);
		}	
					
	}
	
	
	
}	