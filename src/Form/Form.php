<?php
namespace Pacificnm\MenuItem\Form;

use Zend\Form\Form as ZendForm;
use Zend\InputFilter\InputFilterProviderInterface;
use Pacificnm\MenuItem\Hydrator\Hydrator;
use Pacificnm\MenuItem\Entity\Entity;
use Pacificnm\Menu\Service\ServiceInterface;

class Form extends ZendForm implements InputFilterProviderInterface
{

    /**
     * 
     * @var ServiceInterface
     */
    protected $service;

    /**
     * 
     * @param ServiceInterface $service
     * @param string $name
     * @param array $options
     */
    public function __construct(ServiceInterface $service, $name = 'menu-item-form', $options = array())
    {
        parent::__construct($name, $options);
        
        $this->setHydrator(new Hydrator(false));
        
        $this->setObject(new Entity());
        
        $this->service = $service;
        
        // menuItemId
        $this->add(array(
            'name' => 'menuItemId',
            'type' => 'hidden',
            'attributes' => array(
                'id' => 'menuItemId'
            )
        ));
        
        // menuId
        $this->add(array(
            'type' => 'Select',
            'name' => 'menuId',
            'options' => array(
                'label' => 'Menu:',
                'value_options' => $this->getMenuOptions()
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'menuId'
            )
        ));
        
        // menuItemRoute
        $this->add(array(
            'name' => 'menuItemRoute',
            'type' => 'Text',
            'options' => array(
                'label' => 'Route:'
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'menuItemRoute'
            )
        ));
        
        // menuItemName
        $this->add(array(
            'name' => 'menuItemName',
            'type' => 'Text',
            'options' => array(
                'label' => 'Name:'
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'menuItemName'
            )
        ));
        
        // menuItemIcon
        $this->add(array(
            'name' => 'menuItemIcon',
            'type' => 'Text',
            'options' => array(
                'label' => 'Icon:'
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'menuItemIcon'
            )
        ));
        
        // menuItemOrder
        $this->add(array(
            'name' => 'menuItemOrder',
            'type' => 'Text',
            'options' => array(
                'label' => 'Order:'
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'menuItemOrder'
            )
        ));
        
        // menuItemActive
        $this->add(array(
            'type' => 'Checkbox',
            'name' => 'menuItemActive',
            'options' => array(
                'label' => 'Active',
                'use_hidden_element' => true,
                'checked_value' => '1',
                'unchecked_value' => '0'
            ),
            'attributes' => array(
                'id' => 'menuItemActive'
            )
        ));
        
        // submit
        $this->add(array(
            'name' => 'submit',
            'type' => 'button',
            'attributes' => array(
                'value' => 'Submit',
                'id' => 'submit',
                'class' => 'btn btn-primary btn-flat'
            )
        ));
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \Zend\InputFilter\InputFilterProviderInterface::getInputFilterSpecification()
     */
    public function getInputFilterSpecification()
    {
        return array();
    }

    
    /**
     * 
     * @return NULL[]
     */
    protected function getMenuOptions()
    {
        $options = array();
        
        $entitys = $this->service->getAll(array(
            'pagination' => 'off'
        ));
        
        foreach($entitys as $entity) {
            $options[$entity->getMenuId()] = $entity->getMenuName();
        }
        
        return $options;
    }
}

