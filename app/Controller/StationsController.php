<?php
App::uses('AppController', 'Controller');
/**
 * Stations Controller
 *
 */
class StationsController extends AppController {

/**
 * Scaffold
 *
 * @var mixed
 */
	public $scaffold;
	public $components = array('Master');
	
	public function index() {
		$this->paginate = array(
			// 'conditions' => array('Station.name LIKE' => 'a%'),
			'limit' => 10
		);
		
		$this->Master->userList();
		
		$stations = $this->paginate('Station');
		$this->set('stations', $stations);
	}

}
