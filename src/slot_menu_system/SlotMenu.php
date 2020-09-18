<?php

namespace slot_menu_system;


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