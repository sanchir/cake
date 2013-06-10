<?php
// App::uses('Component', 'Controller');
class MasterComponent extends Component{

    public $controller;
 
    public function initialize(Controller $controller) {
        $this->controller = $controller;
    }
	
	public function __construct() {
		$this->user = ClassRegistry::init('User');
	}
	
    public function userList(){
        $users = $this->user->find('list');
		$this->controller->set('users', $users);
    }
}