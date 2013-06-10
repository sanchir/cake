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
		
		if (isset($this->params['pass'][0]) && isset($this->params['pass'][1])) {
			$lat = $this->params['pass'][0];
			$lng = $this->params['pass'][1];

			$this->paginate = array(
				// 'conditions' => array('Station.name LIKE' => 'a%'),
				'limit' => 20
			);
		}
		
		/**
			SELECT id,
				points,
				35.6940154 as lat1, 
				139.7764629 as lng1,
				X(points) as lat2,
				Y(points) as lng2,
				GetDistance(35.6940154, 139.7764629, X(points), Y(points)) AS dist
			FROM `jobs`
			WHERE 1=1
			HAVING dist < 1.5
			ORDER BY dist;
		*/
		
		// $this->Master->userList();
		// $date = date_create("2013-5-2 11:15:42");
	 	// echo date_format($date, "Y-m-d")." 00:00:00";
		$stations = $this->paginate('Station');
		$this->set('stations', $stations);
	}
	
	public function latlon() {
		// echo $this->params['pass'][0];
	}

}
