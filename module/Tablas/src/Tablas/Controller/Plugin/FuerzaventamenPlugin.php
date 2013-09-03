<?php

namespace Tablas\Controller\Plugin;

use Zend\Mvc\Controller\Plugin\AbstractPlugin;
use Zend\Db\Adapter\Adapter;

class FuerzaventamenPlugin extends AbstractPlugin{
   
    protected $adapter;
   
    public function __construct(Adapter $adapter){
        $this->adapter = $adapter;
    }
    
    public function getTablas($limit){ 
        $FuerzaventamenTable = new \Tablas\Model\FuerzaventamenTable($this->adapter);
        $tablas = $FuerzaventamenTable->findByPosition($limit);
        return $tablas;
    }
}