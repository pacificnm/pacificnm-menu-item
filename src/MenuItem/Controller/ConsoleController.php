<?php
namespace MenuItem\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use MenuItem\Service\ServiceInterface;
use Zend\Console\Adapter\AdapterInterface;
use RuntimeException;
use Zend\Console\Request as ConsoleRequest;

class ConsoleController extends AbstractActionController
{
    /**
     *
     * @var ServiceInterface
     */
    protected $service;
    
    /**
     *
     * @var AdapterInterface
     */
    protected $console;
    
    /**
     *
     * @param ServiceInterface $service
     * @param AdapterInterface $console
     */
    public function __construct(ServiceInterface $service, AdapterInterface $console)
    {
        $this->service = $service;
    
        $this->console = $console;
    }
    
    /**
     *
     * {@inheritdoc}
     *
     * @see \Zend\Mvc\Controller\AbstractActionController::indexAction()
     */
    public function indexAction()
    {
        $request = $this->getRequest();
    
        // validate we are in a console
        if (! $request instanceof ConsoleRequest) {
            throw new RuntimeException('Cannot handle request of type ' . get_class($request));
        }
    
        $table = new \Zend\Text\Table\Table(array(
            'columnWidths' => array(
                10,
                20,
                20,
                20,
                10,
                20,
                10
            )
        ));
    
        $table->appendRow(array(
            'Menu Item Id',
            'Menu Id',
            'Route',
            'Name',
            'Icon',
            'Order',
            'Active'
        ));
    
        $entitys = $this->service->getAll(array(
            'pagination' => 'off'
        ));
    
        foreach($entitys as $entity) {
            $table->appendRow(array(
                $entity->getMenuItemId(),
                $entity->getMenuId(),
                $entity->getMenuItemRoute(),
                $entity->getMenuItemName(),
                $entity->getMenuItemIcon(),
                $entity->getMenuItemOrder(),
                $entity->getMenuItemActive()
            ));
        }
    
        echo $table;
    
        $end = date('m/d/Y h:i a', time());
    
        $this->console->write("Comleted acl list at {$end}\n");
    }
    
    public function viewAction()
    {
        $request = $this->getRequest();
    
        // validate we are in a console
        if (! $request instanceof ConsoleRequest) {
            throw new RuntimeException('Cannot handle request of type ' . get_class($request));
        }
    
        $id = $this->params()->fromRoute('id');
    
        $table = new \Zend\Text\Table\Table(array(
            'columnWidths' => array(
                10,
                20,
                20,
                20,
                10,
                20,
                10
            )
        ));
    
        $table->appendRow(array(
            'Menu Item Id',
            'Menu Id',
            'Route',
            'Name',
            'Icon',
            'Order',
            'Active'
        ));
    
        $entity = $this->service->get($id);
    
        $table->appendRow(array(
            $entity->getMenuItemId(),
            $entity->getMenuId(),
            $entity->getMenuItemRoute(),
            $entity->getMenuItemName(),
            $entity->getMenuItemIcon(),
            $entity->getMenuItemOrder(),
            $entity->getMenuItemActive()
        ));
    
        echo $table;
    
        $end = date('m/d/Y h:i a', time());
    
        $this->console->write("Comleted acl list at {$end}\n");
    }
}

