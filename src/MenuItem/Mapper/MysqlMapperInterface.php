<?php
namespace MenuItem\Mapper;

use MenuItem\Entity\Entity;

interface MysqlMapperInterface
{

    /**
     *
     * @param array $filter            
     * @return Entity
     */
    public function getAll($filter);

    /**
     *
     * @param number $id            
     * @return Entity
     */
    public function get($id);

    /**
     *
     * @param number $menuId            
     * @return Entity
     */
    public function getMenuItems($menuId);

    /**
     * 
     * @param string $menuItemRoute
     * @return Entity
     */
    public function getMenuItemByRoute($menuItemRoute);
    /**
     *
     * @param Entity $entity            
     * @return Entity
     */
    public function save(Entity $entity);

    /**
     *
     * @param Entity $entity            
     * @return boolean
     */
    public function delete(Entity $entity);
}

