<?php
App::uses('AppController', 'Controller');
/**
 * Apps Controller
 *
 * @property App $App
 * @property PaginatorComponent $Paginator
 */
class AppsController extends AppController {

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
		$this->App->recursive = 0;
		$this->set('apps', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->App->exists($id)) {
			throw new NotFoundException(__('Invalid app'));
		}
		$options = array('conditions' => array('App.' . $this->App->primaryKey => $id));
		$this->set('app', $this->App->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->App->create();
			if ($this->App->save($this->request->data)) {
				$this->Session->setFlash(__('The app has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The app could not be saved. Please, try again.'));
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
		if (!$this->App->exists($id)) {
			throw new NotFoundException(__('Invalid app'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->App->save($this->request->data)) {
				$this->Session->setFlash(__('The app has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The app could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('App.' . $this->App->primaryKey => $id));
			$this->request->data = $this->App->find('first', $options);
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
		$this->App->id = $id;
		if (!$this->App->exists()) {
			throw new NotFoundException(__('Invalid app'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->App->delete()) {
			$this->Session->setFlash(__('The app has been deleted.'));
		} else {
			$this->Session->setFlash(__('The app could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
