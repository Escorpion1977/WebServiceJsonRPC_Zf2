<?php

/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      https://github.com/CookieShop for the canonical source repository
 * @copyright Copyright (c) 2005-2013 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://www.gnu.org/licenses/gpl.html GNU GENERAL PUBLIC LICENSE
 */
namespace Tablas\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\Json\Json as Json;
use Zend\View\Model\JsonModel;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController{
    
    /**
     * 
     * @return \Zend\View\Model\ViewModel
     */
    public function indexAction(){     
        if($this->getRequest()->isXmlHttpRequest()){
            $json = Json::decode($this->getRequest()->getContent());
            $FuerzaventamenTable = $this->getServiceLocator()
                    ->get('Tablas\Model\FuerzaventamenTable');
            $items= $FuerzaventamenTable->findByPosition((int)$json->limite);      
            return new JsonModel(array('data'=>$items));            
        }else{
            return $this->response;
        }
    }
    
    
    public function showtablesAction(){
        return new ViewModel();
    }
}