<?php
namespace Services\Api;

use \Zend\Json\Json;

class Service{
    
    /**
     * 
     * @return array
     */
    public static function getRegistros(){
        return Json::encode(array('1'=>'Flavio', '2'=>'Sergio', '3'=>'Luis'));
    }
}