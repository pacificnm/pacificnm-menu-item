<?php
namespace Pacificnm\MenuItem\Mapper;

use Zend\Hydrator\HydratorInterface;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\Sql\Update;
use Zend\Db\Sql\Insert;
use Zend\Db\Sql\Delete;
use Application\Mapper\AbstractMysqlMapper;
use Pacificnm\MenuItem\Entity\Entity;

class MysqlMapper extends AbstractMysqlMapper implements MysqlMapperInterface
{

    /**
     *
     * @param AdapterInterface $readAdapter            
     * @param AdapterInterface $writeAdapter            
     * @param HydratorInterface $hydrator            
     * @param Entity $prototype            
     */
    public function __construct(AdapterInterface $readAdapter, AdapterInterface $writeAdapter, HydratorInterface $hydrator, Entity $prototype)
    {
        $this->hydrator = $hydrator;
        
        $this->prototype = $prototype;
        
        parent::__construct($readAdapter, $writeAdapter);
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \Pacificnm\MenuItem\Mapper\MysqlMapperInterface::getAll()
     */
    public function getAll($filter)
    {
        $this->select = $this->readSql->select('menu_item');
        
        $this->joinMenu();
        
        $this->filter($filter);
        
        $this->select->order('menu_item_order');
        
        // if pagination is disabled
        if (array_key_exists('pagination', $filter)) {
            if ($filter['pagination'] == 'off') {
                return $this->getRows();
            }
        }
        
        return $this->getPaginator();
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \Pacificnm\MenuItem\Mapper\MysqlMapperInterface::get()
     */
    public function get($id)
    {
        $this->select = $this->readSql->select('menu_item');
        
        $this->joinMenu();
        
        $this->select->where(array(
            'menu_item.menu_item_id = ?' => $id
        ));
        
        return $this->getRow();
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \Pacificnm\MenuItem\Mapper\MysqlMapperInterface::getMenuItems()
     */
    public function getMenuItems($menuId)
    {
        $this->select = $this->readSql->select('menu_item');
        
        $this->joinMenu();
        
        $this->select->where(array(
            'menu_item.menu_id = ?' => $menuId
        ));
        
        $this->select->order('menu_item_order');
        
        return $this->getRows();
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \Pacificnm\MenuItem\Mapper\MysqlMapperInterface::getMenuItemByRoute()
     */
    public function getMenuItemByRoute($menuItemRoute)
    {
        $this->select = $this->readSql->select('menu_item');
        
        $this->joinMenu();
        
        $this->select->where(array(
            'menu_item.menu_item_route = ?' => $menuItemRoute
        ));
        
        return $this->getRow();
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \Pacificnm\MenuItem\Mapper\MysqlMapperInterface::save()
     */
    public function save(Entity $entity)
    {
        $postData = $this->hydrator->extract($entity);
        
        // if we have id then its an update
        if ($entity->getMenuItemId()) {
            $this->update = new Update('menu_item');
            
            $this->update->set($postData);
            
            $this->update->where(array(
                'menu_item.menu_item_id = ?' => $entity->getMenuItemId()
            ));
            
            $this->updateRow();
        } else {
            $this->insert = new Insert('menu_item');
            
            $this->insert->values($postData);
            
            $id = $this->createRow();
            
            $entity->setMenuItemId($id);
        }
        
        return $this->get($entity->getMenuItemId());
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \Pacificnm\MenuItem\Mapper\MysqlMapperInterface::delete()
     */
    public function delete(Entity $entity)
    {
        $this->delete = new Delete('menu_item');
        
        $this->delete->where(array(
            'menu_item.menu_item_id = ?' => $entity->getMenuItemId()
        ));
        
        return $this->deleteRow();
    }

    /**
     *
     * @param unknown $filter            
     * @return \Pacificnm\MenuItem\Mapper\MysqlMapper
     */
    protected function filter($filter)
    {
        if (array_key_exists('menuId', $filter) && $filter['menuId'] > 0) {
            $this->select->where(array(
                'menu_item.menu_id = ?' => $filter['menuId']
            ));
        }
        
        return $this;
    }

    /**
     * 
     * @return \Pacificnm\MenuItem\Mapper\MysqlMapper
     */
    protected function joinMenu()
    {
        $this->select->join('menu', 'menu_item.menu_id = menu.menu_id', array(
            'menu_route',
            'menu_name',
            'menu_icon',
            'menu_order',
            'menu_location',
            'menu_active'
        ), 'inner');
        
        return $this;
    }
}

