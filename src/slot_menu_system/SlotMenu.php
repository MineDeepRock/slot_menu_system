<?php

namespace slot_menu_system\models;


use Closure;

class SlotMenu
{
    /**
     * @var SlotMenuElement[]
     */
    protected $menus;
    private $autoIndex;

    public function __construct(array $menus, bool $autoIndex = true) {
        $this->menus = $menus;
        $this->autoIndex = $autoIndex;
    }

    /**
     * @return SlotMenuElement[]
     */
    public function getMenus(): array {
        return $this->menus;
    }

    /**
     * @return bool
     */
    public function isAutoIndex(): bool {
        return $this->autoIndex;
    }
}