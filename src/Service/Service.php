<?php
namespace Pacificnm\MenuItem\Service;

use Pacificnm\MenuItem\Entity\Entity;
use Pacificnm\MenuItem\Mapper\MysqlMapperInterface;

class Service implements ServiceInterface
{

    /**
     *
     * @var MysqlMapperInterface
     */
    protected $mapper;

    /**
     *
     * @param MysqlMapperInterface $mapper            
     */
    public function __construct(MysqlMapperInterface $mapper)
    {
        $this->mapper = $mapper;
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \Pacificnm\MenuItem\Service\ServiceInterface::getAll()
     */
    public function getAll($filter)
    {
        return $this->mapper->getAll($filter);
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \Pacificnm\MenuItem\Service\ServiceInterface::get()
     */
    public function get($id)
    {
        return $this->mapper->get($id);
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \Pacificnm\MenuItem\Service\ServiceInterface::getMenuItemByRoute()
     */
    public function getMenuItemByRoute($menuItemRoute)
    {
        return $this->mapper->getMenuItemByRoute($menuItemRoute);
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \Pacificnm\MenuItem\Service\ServiceInterface::save()
     */
    public function save(Entity $entity)
    {
        return $this->mapper->save($entity);
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \Pacificnm\MenuItem\Service\ServiceInterface::delete()
     */
    public function delete(Entity $entity)
    {
        return $this->mapper->delete($entity);
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \Pacificnm\MenuItem\Service\ServiceInterface::getMenuItems()
     */
    public function getMenuItems($menuId)
    {
        return $this->mapper->getMenuItems($menuId);
    }
}

