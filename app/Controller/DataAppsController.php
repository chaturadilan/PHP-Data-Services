<?php
App::uses('AppController', 'Controller');
/**
 * DataApps Controller
 *
 * @property DataApp $DataApp
 * @property PaginatorComponent $Paginator
 */
class DataAppsController extends AppController {

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
		$this->DataApp->recursive = 0;
		$this->set('dataApps', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->DataApp->exists($id)) {
			throw new NotFoundException(__('Invalid data app'));
		}
		$options = array('conditions' => array('DataApp.' . $this->DataApp->primaryKey => $id));
		$this->set('dataApp', $this->DataApp->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->DataApp->create();
			if ($this->DataApp->save($this->request->data)) {
				$this->Session->setFlash(__('The data app has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The data app could not be saved. Please, try again.'));
			}
		}
		$sources = $this->DataApp->Source->find('list');
		$this->set(compact('sources'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->DataApp->exists($id)) {
			throw new NotFoundException(__('Invalid data app'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->DataApp->save($this->request->data)) {
				$this->Session->setFlash(__('The data app has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The data app could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('DataApp.' . $this->DataApp->primaryKey => $id));
			$this->request->data = $this->DataApp->find('first', $options);
		}
		$sources = $this->DataApp->Source->find('list');
		$this->set(compact('sources'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->DataApp->id = $id;
		if (!$this->DataApp->exists()) {
			throw new NotFoundException(__('Invalid data app'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->DataApp->delete()) {
			$this->Session->setFlash(__('The data app has been deleted.'));
		} else {
			$this->Session->setFlash(__('The data app could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
