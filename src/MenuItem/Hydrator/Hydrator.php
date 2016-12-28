<?php
namespace MenuItem\Hydrator;

use MenuItem\Entity\Entity;
use Zend\Hydrator\ClassMethods;

class Hydrator extends ClassMethods
{
    /**
     *
     * @param string $underscoreSeparatedKeys
     */
    public function __construct($underscoreSeparatedKeys = true)
    {
        parent::__construct($underscoreSeparatedKeys);
    }
    
    /**
     *
     * {@inheritdoc}
     *
     * @see \Zend\Stdlib\Hydrator\ClassMethods::hydrate()
     */
    public function hydrate(array $data, $object)
    {
        if (! $object instanceof Entity) {
            return $object;
        }
        
        parent::hydrate($data, $object);
        
        $menuEntity = parent::hydrate($data, new \Menu\Entity\Entity());
    
        $object->setMenuEntity($menuEntity);

        return $object;
    }
    
    /**
     *
     * {@inheritdoc}
     *
     * @see \Zend\Stdlib\Hydrator\ClassMethods::extract()
     */
    public function extract($object)
    {
        if (! $object instanceof Entity) {
            return $object;
        }
    
        $data = parent::extract($object);
    
        unset($data['menu_entity']);
    
        return $data;
    }
}

