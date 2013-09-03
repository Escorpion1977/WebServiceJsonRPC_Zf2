<?php
namespace Tablas\Model;
/**
 * Componentes necesarios para el modelado
 */
use Zend\Db\Adapter\Adapter;
use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Db\Sql\Select as Select;

/**
 * @package FuerzaventamenTable
 */
class FuerzaventamenTable extends AbstractTableGateway{
    
    protected $serviceManager;


    /**
     * Nombre de la Tabla
     * @var type 
     */
    protected $table  = 'fuerzaventamen';
    
    /**
     * Configura Adaptador de Base de Datos
     * 
     * @param \Zend\Db\Adapter\Adapter $adapter
     */
    public function __construct(Adapter $adapter) {
        $this->adapter = $adapter;
    }
    
    /**
     * Realiza una consulta utilizandon left join
     * 
     * @param type $nombrePuesto
     * @return type
     */
    public function findByPosition($limite){
        $resultSet = $this->select(function (Select $select) use($limite){ 
                    $select->limit($limite);
                });
        $resultSet->buffer();
        $resultSet->next();       
        return $this->getEntitiesJoin($resultSet);
    }
    
   /**
    * Selecciona columnas para vista
    * 
    * @param type $resultSet
    * @return type
    */
    private function getEntitiesJoin($resultSet){
        $entities = array();
        foreach ($resultSet as $row){
            $map= array(
                'nomina' => $row->nomina,
                'division' => $row->division,
                'ap_paterno' => $row->ap_paterno,
                'ap_materno' => $row->ap_materno,
                'nombres' => $row->nombres,
                'fecha_nacim' => $row->fecha_nacim,
            ); 
            $entities[] = $map;  

        }
        return $entities;
    }
   
}

