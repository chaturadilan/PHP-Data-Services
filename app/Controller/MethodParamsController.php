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
 * MethodParams Controller
 *
 * @property MethodParam $MethodParam
 * @property PaginatorComponent $Paginator
 */
class MethodParamsController extends AppController {
	
	public function index($id = null) {		
		if($id){
			$this->Session->write('Method_id', $id);
		}else{
			$id = $this->Session->read('Method_id');
		}
		
		
		$method = $this->MethodParam->Method->findById($id);		
		$this->Session->write('Method', $method);	
		
				
		$this->set('items', $this->MethodParam->find('all', array('conditions' => array('Method.id' => $id))));			
	}
	
	
	public function form($id = null) {
			
		if ($this->request->is(array('post', 'put'))) {			
						
			if ($this->MethodParam->save($this->request->data)) {
				$this->Session->setFlash(__('The source type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The source type could not be saved. Please, try again.'));
			}
		}
					
		if ($this->MethodParam->exists($id)) {
			$options = array('conditions' => array('MethodParam.' . $this->MethodParam->primaryKey => $id));
			$this->request->data = $this->MethodParam->find('first', $options);
			$this->set('id', $id);
		}else{
			$this->set('id', null);
		}	
					
	}

}