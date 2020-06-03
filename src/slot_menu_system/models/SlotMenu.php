<?php

namespace slot_menu_system\models;


use Closure;

class SlotMenu
{
    /**
     * @var Menu[]
     */
    private $menus;


    public function __construct(array $menus) {
        $this->menus = $menus;
    }

    /**
     * @return Menu[]
     */
    public function getMenus(): array {
        return $this->menus;
    }
}