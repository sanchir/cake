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
    public $uses = array('ConditionMasterWages', 'Stations');
    public $helpers = array('Paginator', 'Js');
    public $components = array('RequestHandler');
    public $paginate = array(
            'limit' => 3,
            'fields' => array(
                'Station.id',
                'Station.name',
                'Station.lat',
                'Station.lng'
                )
            );
    // public $virtualFields = array(
            // 'name' => 'CONCAT(User.first_name, " ", User.last_name)'
        // );
    
    public function index() {}
    
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
        
        // $lat = $_POST['lat'];
        // $lng = $_POST['lng'];
        // echo $lat." ".$lng;
        // $this->redirect(array('controller' => 'stations', 'action' => 'latlon', $lat, $lng));
        // $this->paginate = array(
            // 'conditions' => array('Station.name LIKE' => 'a%'),
            // 'fields' => array(
                // 'Station.id',
                // 'Station.name',
                // 'Station.lat',
                // 'Station.lng'
                // ),
            // 'limit' => 5
        // );
        
        $options = array(
            'fields' => array(
                'id',
                'name',
                'lat',
                'lng',
                ),
            'limit' => 5
            );
        $stations = $this->Stations->find('all', $options);
        
        // $stations = $this->paginate('Station');
        $this->set('stations', $stations);
        $this->autoRender = false;
        $this->render('/Stations/latlon');
    }
    
    public function dialog(){
        $this->layout = 'blank';
        if (isset($_POST['lat'])) {
            $lat = $_POST['lat'];
            $this->set('lat', $lat);
        }
        $test = "abcdef";
        $this->set('test', $test);
        $this->autoRender = false;
        $this->render('/Elements/Ajax/dialog');
    }
    
    /**
DELIMITER $$

DROP FUNCTION IF EXISTS `GetDistance`$$

CREATE FUNCTION GetDistance(lat1 DECIMAL(10,8), lng1 DECIMAL(10,8), lat2 DECIMAL(10,8), lng2 DECIMAL(10,8))
RETURNS DECIMAL(10,1)
DETERMINISTIC
BEGIN
    RETURN ((ACOS(SIN(lat1 * PI() / 180) * SIN(lat2 * PI() / 180) + COS(lat1 * PI() / 180) * COS(lat2 * PI() / 180) * COS((lng1 - lng2) * PI() / 180)) * 180 / PI()) * 60 * 1.1515 * 1.609344);
END$$

DELIMITER ;

SELECT id,
    points,
    35.6940154 as lat1, 
    139.7764629 as lng1,
    X(points) as lat2,
    Y(points) as lng2,
    GetDistance(35.6940154, 139.7764629, X(points), Y(points)) AS dist
FROM `jobs`
WHERE 1=1
HAVING dist < 100
ORDER BY dist;

SELECT 
  id, 
   ( 3959 * acos( cos( radians(35.6940154) ) * cos( radians( X(points) ) ) 
   * cos( radians(Y(points)) - radians(139.7764629)) + sin(radians(35.6940154)) 
   * sin( radians(X(points))))) AS distance 
FROM jobs 
WHERE 1 = 1 
HAVING distance < 100 
ORDER BY distance;


SELECT id,
    name, 
    ((ACOS(SIN(35.6940154 * PI() / 180) * SIN(lat * PI() / 180) + COS(35.6940154 * PI() / 180) * COS(lat * PI() / 180) * COS((139.7764629 - lng) * PI() / 180)) * 180 / PI()) * 60 * 1.1515 * 1.609344) as distance
FROM stations 
WHERE 1 = 1 
HAVING distance < 100 
ORDER BY distance
LIMIT 10


SELECT id,
    name,
    ((ACOS(SIN(35.6940154 * PI() / 180) * SIN(lat * PI() / 180) + COS(35.6940154 * PI() / 180) * COS(lat * PI() / 180) * COS((139.7764629 - lng) * PI() / 180)) * 180 / PI()) * 60 * 1.1515 * 1.609344) as distance
FROM stations 
WHERE 1 = 1 
HAVING distance < 100 
ORDER BY distance
LIMIT 10
    */

}
