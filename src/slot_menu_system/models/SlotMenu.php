<?php

namespace slot_menu_system\models;


use Closure;

class SlotMenu
{
    /**
     * @var SlotMenuElement[]
     */
    protected $menus;


    public function __construct(array $menus) {
        $this->menus = $menus;
    }

    /**
     * @return SlotMenuElement[]
     */
    public function getMenus(): array {
        return $this->menus;
    }
}