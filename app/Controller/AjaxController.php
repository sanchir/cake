<?php
App::uses('AppController', 'Controller');
/**
 * Ajax AjaxController
 *
 */
class AjaxController extends AppController {

/**
 * Scaffold
 *
 * @var mixed
 */
	// public $scaffold;
	public $uses = array('ConditionMasterWages');
	public $helpers = array('Js');
	public $components = array('RequestHandler');
	
	public function option() {
		// $period = $this->params['url']['data']['period'];
		$period = $_POST['period'];
		
		$options = $this->ConditionMasterWages->find('list', array(
			'conditions' => array(
				'ConditionMasterWages.condition_master_wage_types_id' => $period),
				// 'recursive' => -1));
			'fields' => array(
				'ConditionMasterWages.price_num',
				'ConditionMasterWages.name')));
 
		$this->set('options', $options);
		$this->render('/Elements/Ajax/option', 'ajax');
	}
	
	public function latlon(){
		$this->autoRender = false;
		$lat = $_POST['lat'];
		$lng = $_POST['lng'];
		// echo $lat." ".$lng;
		$this->redirect(array('controller' => 'stations', 'action' => 'index', $lat, $lng));
	}

}
