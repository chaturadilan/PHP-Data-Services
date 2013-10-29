<?php
App::uses('AppController', 'Controller');
/**
 * DataCollections Controller
 *
 * @property DataCollection $DataCollection
 * @property PaginatorComponent $Paginator
 */
class DataCollectionsController extends AppController {

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
		$this->DataCollection->recursive = 0;
		$this->set('dataCollections', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->DataCollection->exists($id)) {
			throw new NotFoundException(__('Invalid data collection'));
		}
		$options = array('conditions' => array('DataCollection.' . $this->DataCollection->primaryKey => $id));
		$this->set('dataCollection', $this->DataCollection->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->DataCollection->create();
			if ($this->DataCollection->save($this->request->data)) {
				$this->Session->setFlash(__('The data collection has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The data collection could not be saved. Please, try again.'));
			}
		}
		$dataApps = $this->DataCollection->DataApp->find('list');
		$this->set(compact('dataApps'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->DataCollection->exists($id)) {
			throw new NotFoundException(__('Invalid data collection'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->DataCollection->save($this->request->data)) {
				$this->Session->setFlash(__('The data collection has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The data collection could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('DataCollection.' . $this->DataCollection->primaryKey => $id));
			$this->request->data = $this->DataCollection->find('first', $options);
		}
		$dataApps = $this->DataCollection->DataApp->find('list');
		$this->set(compact('dataApps'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->DataCollection->id = $id;
		if (!$this->DataCollection->exists()) {
			throw new NotFoundException(__('Invalid data collection'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->DataCollection->delete()) {
			$this->Session->setFlash(__('The data collection has been deleted.'));
		} else {
			$this->Session->setFlash(__('The data collection could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
