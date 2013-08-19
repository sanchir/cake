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
    // public $scaffold;
    public $components = array('Master');
    
    public $helpers = array('Js');
    
    public function index() {
        // echo date('Y-m-d');
        echo date('Y-m-d 00:00:00', strtotime('2013/07/16 15:03:32'));
        $this->paginate = array(
            // 'conditions' => array('Station.name LIKE' => 'a%'),
            'limit' => 10
        );
        
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
    
        $lat = $_POST['lat'];
        $lon = $_POST['lng'];
        echo $lat;
        $this->paginate = array(
            // 'conditions' => array('Station.name LIKE' => 'a%'),
            // 'fields' => array('id', 'name', 'lat', 'lng'),
            'limit' => 5
        );
        
        $stations = $this->paginate('Station');
        $this->set('stations', $stations);
    }

}
