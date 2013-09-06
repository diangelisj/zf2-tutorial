<?php
namespace Agenda;

use Agenda\Model\Agenda;
use Agenda\Model\AgendaTable;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;

class Module
{
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }
    
    // getAutoloaderConfig() and getConfig() methods here
    
    // Add this method:
    public function getServiceConfig()
    {
    	return array(
    			'factories' => array(
    					'Agenda\Model\AgendaTable' =>  function($sm) {
    						$tableGateway = $sm->get('AgendaTableGateway');
    						$table = new AgendaTable($tableGateway);
    						return $table;
    					},
    					'AgendaTableGateway' => function ($sm) {
    						$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
    						$resultSetPrototype = new ResultSet();
    						$resultSetPrototype->setArrayObjectPrototype(new Agenda());
    						return new TableGateway('agenda', $dbAdapter, null, $resultSetPrototype);
    					},
    			),
    	);
    }
}

