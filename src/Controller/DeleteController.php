<?php
namespace Pacificnm\MenuItem\Controller;

use Zend\View\Model\ViewModel;
use Pacificnm\Controller\AbstractApplicationController;
use Pacificnm\MenuItem\Service\ServiceInterface;


class DeleteController extends AbstractApplicationController
{
    /**
     * 
     * @var ServiceInterface
     */
    protected $service;
    
    /**
     * 
     * @param ServiceInterface $service
     */
    public function __construct(ServiceInterface $service)
    {
        $this->service = $service;
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
            $this->flashmessenger()->addErrorMessage('Menu Item was not found.');
            return $this->redirect()->toRoute('menu-index');
        }
        
        $request = $this->getRequest();
        
        if ($request->isPost()) {
            $del = $request->getPost('delete_confirmation', 'no');
            if ($del === 'yes') {
                
                $this->service->delete($entity);
        
                $this->getEventManager()->trigger('menuItemDelete', $this, array(
                    'authId' => $this->identity()->getAuthId(),
                    'requestUrl' => $this->getRequest()->getUri(),
                    'menuItemEntity' => $entity
                ));
        
                $this->flashmessenger()->addSuccessMessage('Object was deleted');
        
                return $this->redirect()->toRoute('menu-view', array('id' => $entity->getMenuId()));
            }
        
            return $this->redirect()->toRoute('menu-item-view', array('id' => $id));
        }
        
        return new ViewModel(array(
            'entity' => $entity
        ));
    }
}

