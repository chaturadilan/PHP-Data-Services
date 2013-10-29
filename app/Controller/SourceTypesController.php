<?php
App::uses('AppController', 'Controller');
/**
 * SourceTypes Controller
 *
 * @property SourceType $SourceType
 * @property PaginatorComponent $Paginator
 */
class SourceTypesController extends AppController {

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
		$this->SourceType->recursive = 0;
		$this->set('sourceTypes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->SourceType->exists($id)) {
			throw new NotFoundException(__('Invalid source type'));
		}
		$options = array('conditions' => array('SourceType.' . $this->SourceType->primaryKey => $id));
		$this->set('sourceType', $this->SourceType->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->SourceType->create();
			if ($this->SourceType->save($this->request->data)) {
				$this->Session->setFlash(__('The source type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The source type could not be saved. Please, try again.'));
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
		if (!$this->SourceType->exists($id)) {
			throw new NotFoundException(__('Invalid source type'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->SourceType->save($this->request->data)) {
				$this->Session->setFlash(__('The source type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The source type could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('SourceType.' . $this->SourceType->primaryKey => $id));
			$this->request->data = $this->SourceType->find('first', $options);
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
		$this->SourceType->id = $id;
		if (!$this->SourceType->exists()) {
			throw new NotFoundException(__('Invalid source type'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->SourceType->delete()) {
			$this->Session->setFlash(__('The source type has been deleted.'));
		} else {
			$this->Session->setFlash(__('The source type could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
