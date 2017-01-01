<?php
namespace Pacificnm\MenuItem\Entity;

use Pacificnm\Menu\Entity\Entity as MenuEntity;

class Entity
{

    /**
     *
     * @var number
     */
    protected $menuItemId;

    /**
     *
     * @var number
     */
    protected $menuId;

    /**
     *
     * @var string
     */
    protected $menuItemName;

    /**
     *
     * @var string
     */
    protected $menuItemIcon;

    /**
     *
     * @var string
     */
    protected $menuItemRoute;

    /**
     *
     * @var number
     */
    protected $menuItemOrder;

    /**
     *
     * @var boolean
     */
    protected $menuItemActive;

    /**
     *
     * @var MenuEntity
     */
    protected $menuEntity;

    /**
     *
     * @return the $menuItemId
     */
    public function getMenuItemId()
    {
        return $this->menuItemId;
    }

    /**
     *
     * @return the $menuId
     */
    public function getMenuId()
    {
        return $this->menuId;
    }

    /**
     *
     * @return the $menuItemName
     */
    public function getMenuItemName()
    {
        return $this->menuItemName;
    }

    /**
     *
     * @return the $menuItemIcon
     */
    public function getMenuItemIcon()
    {
        return $this->menuItemIcon;
    }

    /**
     *
     * @return the $menuItemRoute
     */
    public function getMenuItemRoute()
    {
        return $this->menuItemRoute;
    }

    /**
     *
     * @return the $menuItemOrder
     */
    public function getMenuItemOrder()
    {
        return $this->menuItemOrder;
    }

    /**
     *
     * @return the $menuItemActive
     */
    public function getMenuItemActive()
    {
        return $this->menuItemActive;
    }

    /**
     *
     * @return the $menuEntity
     */
    public function getMenuEntity()
    {
        return $this->menuEntity;
    }

    /**
     *
     * @param number $menuItemId            
     */
    public function setMenuItemId($menuItemId)
    {
        $this->menuItemId = $menuItemId;
    }

    /**
     *
     * @param number $menuId            
     */
    public function setMenuId($menuId)
    {
        $this->menuId = $menuId;
    }

    /**
     *
     * @param string $menuItemName            
     */
    public function setMenuItemName($menuItemName)
    {
        $this->menuItemName = $menuItemName;
    }

    /**
     *
     * @param string $menuItemIcon            
     */
    public function setMenuItemIcon($menuItemIcon)
    {
        $this->menuItemIcon = $menuItemIcon;
    }

    /**
     *
     * @param string $menuItemRoute            
     */
    public function setMenuItemRoute($menuItemRoute)
    {
        $this->menuItemRoute = $menuItemRoute;
    }

    /**
     *
     * @param number $menuItemOrder            
     */
    public function setMenuItemOrder($menuItemOrder)
    {
        $this->menuItemOrder = $menuItemOrder;
    }

    /**
     *
     * @param boolean $menuItemActive            
     */
    public function setMenuItemActive($menuItemActive)
    {
        $this->menuItemActive = $menuItemActive;
    }

    /**
     *
     * @param \Menu\Entity\Entity $menuEntity            
     */
    public function setMenuEntity($menuEntity)
    {
        $this->menuEntity = $menuEntity;
    }
}

