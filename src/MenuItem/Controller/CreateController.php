<?php
namespace MenuItem\Controller;

use Application\Controller\AbstractApplicationController;
use MenuItem\Service\ServiceInterface;
use MenuItem\Form\Form;
use Zend\View\Model\ViewModel;

class CreateController extends AbstractApplicationController
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
     * {@inheritdoc}
     *
     * @see \Application\Controller\AbstractApplicationController::indexAction()
     */
    public function indexAction()
    {
        parent::indexAction();
        
        $menuId = $this->params()->fromQuery('menuId');
        
        $request = $this->getRequest();
        
        if ($request->isPost()) {
            $postData = $request->getPost();
        
            $this->form->setData($postData);
        
            if ($this->form->isValid()) {
                $entity = $this->form->getData();
        
                $menuItemEntity = $this->service->save($entity);
        
                $this->getEventManager()->trigger('menuItemCreate', $this, array(
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
        
        return new ViewModel(array(
            'form' => $this->form
        ));
    }
}


