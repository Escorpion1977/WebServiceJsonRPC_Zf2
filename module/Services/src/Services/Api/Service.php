<?php
namespace Services\Api;
use Zend\Db\Adapter\Adapter;
class Service{
    
    private static $adapter;
    
    public function __construct(Adapter $adapter) {
        self::$adapter = $adapter;
    }
    
    /**
     * Retorna hola mundo
     * 
     * @return array
     */
    public static function getRegistros($limit){
        $plugin = new \Tablas\Controller\Plugin\FuerzaventamenPlugin(self::$adapter);
        $registros = $plugin->getTablas($limit);
        return $registros;
    }
}