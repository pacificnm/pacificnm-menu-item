<?php
namespace Pacificnm\MenuItem\Controller;

use Zend\View\Model\ViewModel;
use Pacificnm\Controller\AbstractApplicationController;
use Pacificnm\MenuItem\Service\ServiceInterface;
use Pacificnm\Menu\Service\ServiceInterface as MenuServiceInterface;


class ViewController extends AbstractApplicationController
{
    /**
     * 
     * @var ServiceInterface
     */
    protected $service;
    
    /**
     * 
     * @var MenuServiceInterface
     */
    protected $menuService;
    
    /**
     * 
     * @param ServiceInterface $service
     * @param MenuServiceInterface $menuService
     */
    public function __construct(ServiceInterface $service,  MenuServiceInterface $menuService)
    {
        $this->service = $service;
        
        $this->menuService = $menuService;
        
    }
    
    /**
     * 
     * {@inheritDoc}
     * @see \Application\Controller\AbstractApplicationController::indexAction()
     */
    public function indexAction()
    {
        parent::indexAction();
        
        $id = $this->params()->fromRoute('id');
        
        $entity = $this->service->get($id);
        
        if (! $entity) {
            $this->flashMessenger()->addErrorMessage('Menu Item was not found');
            return $this->redirect()->toRoute('menu-item-index');
        }
        
        $menuEntity = $this->menuService->get($entity->getMenuId());
        
        $this->getEventManager()->trigger('menuItemView', $this, array(
            'authId' => $this->identity()->getAuthId(),
            'requestUrl' => $this->getRequest()->getUri(),
            'menuItemEntity' => $entity
        ));
        
        
        return new ViewModel(array(
            'entity' => $entity,
            'menuEntity' => $menuEntity
        ));
    }
    
}

