<?php
App::uses('AppController', 'Controller');
/**
 * MethodParams Controller
 *
 * @property MethodParam $MethodParam
 * @property PaginatorComponent $Paginator
 */
class MethodParamsController extends AppController {

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
		$this->MethodParam->recursive = 0;
		$this->set('methodParams', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->MethodParam->exists($id)) {
			throw new NotFoundException(__('Invalid method param'));
		}
		$options = array('conditions' => array('MethodParam.' . $this->MethodParam->primaryKey => $id));
		$this->set('methodParam', $this->MethodParam->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->MethodParam->create();
			if ($this->MethodParam->save($this->request->data)) {
				$this->Session->setFlash(__('The method param has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The method param could not be saved. Please, try again.'));
			}
		}
		$methods = $this->MethodParam->Method->find('list');
		$this->set(compact('methods'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->MethodParam->exists($id)) {
			throw new NotFoundException(__('Invalid method param'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->MethodParam->save($this->request->data)) {
				$this->Session->setFlash(__('The method param has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The method param could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('MethodParam.' . $this->MethodParam->primaryKey => $id));
			$this->request->data = $this->MethodParam->find('first', $options);
		}
		$methods = $this->MethodParam->Method->find('list');
		$this->set(compact('methods'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->MethodParam->id = $id;
		if (!$this->MethodParam->exists()) {
			throw new NotFoundException(__('Invalid method param'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->MethodParam->delete()) {
			$this->Session->setFlash(__('The method param has been deleted.'));
		} else {
			$this->Session->setFlash(__('The method param could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
