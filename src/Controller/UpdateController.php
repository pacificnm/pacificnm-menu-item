<?php
namespace Pacificnm\MenuItem\Controller;

use Zend\View\Model\ViewModel;
use Pacificnm\Controller\AbstractApplicationController;
use Pacificnm\MenuItem\Service\ServiceInterface;
use Pacificnm\MenuItem\Form\Form;


class UpdateController extends AbstractApplicationController
{
    /**
     * 
     * @var ServiceInterface
     */
    protected $service;
    
    /**
     * 
     * @var Form
     */
    protected $form;
    
    /**
     * 
     * @param ServiceInterface $service
     * @param Form $form
     */
    public function __construct(ServiceInterface $service, Form $form)
    {
        $this->service = $service;
        
        $this->form = $form;
    }
    
    /**
     * 
     * {@inheritDoc}
     * @see \Application\Controller\AbstractApplicationController::indexAction()
     */
    public function indexAction()
    {
        parent::indexAction();
        
        $request = $this->getRequest();
        
        $id = $this->params()->fromRoute('id');
        
        $entity = $this->service->get($id);
        
        if (! $entity) {
            $this->flashMessenger()->addErrorMessage('Menu Item was not found');
            return $this->redirect()->toRoute('menu-item-index');
        }
        
        if ($request->isPost()) {
            $postData = $request->getPost();
        
            $this->form->setData($postData);
        
            if ($this->form->isValid()) {
                $entity = $this->form->getData();
        
                $menuItemEntity = $this->service->save($entity);
        
                $this->getEventManager()->trigger('menuItemUpdate', $this, array(
                    'authId' => $this->identity()->getAuthId(),
                    'requestUrl' => $this->getRequest()->getUri(),
                    'menuItemEntity' => $menuItemEntity
                ));
        
                $this->flashMessenger()->addSuccessMessage('Menu Item was saved');
        
                return $this->redirect()->toRoute('menu-item-view', array(
                    'id' => $menuItemEntity->getMenuItemId()
                ));
            }
        }
        
        $this->form->bind($entity);
        
        return new ViewModel(array(
            'form' => $this->form
        ));
    }
}

