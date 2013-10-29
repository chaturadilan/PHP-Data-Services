<?php
App::uses('AppController', 'Controller');
/**
 * MethodTypes Controller
 *
 * @property MethodType $MethodType
 * @property PaginatorComponent $Paginator
 */
class MethodTypesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->MethodType->recursive = 0;
		$this->set('methodTypes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->MethodType->exists($id)) {
			throw new NotFoundException(__('Invalid method type'));
		}
		$options = array('conditions' => array('MethodType.' . $this->MethodType->primaryKey => $id));
		$this->set('methodType', $this->MethodType->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->MethodType->create();
			if ($this->MethodType->save($this->request->data)) {
				$this->Session->setFlash(__('The method type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The method type could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->MethodType->exists($id)) {
			throw new NotFoundException(__('Invalid method type'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->MethodType->save($this->request->data)) {
				$this->Session->setFlash(__('The method type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The method type could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('MethodType.' . $this->MethodType->primaryKey => $id));
			$this->request->data = $this->MethodType->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->MethodType->id = $id;
		if (!$this->MethodType->exists()) {
			throw new NotFoundException(__('Invalid method type'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->MethodType->delete()) {
			$this->Session->setFlash(__('The method type has been deleted.'));
		} else {
			$this->Session->setFlash(__('The method type could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
