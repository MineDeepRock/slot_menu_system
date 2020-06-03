<?php


namespace slot_menu_system\pmmp\items;


use pocketmine\item\Item;
use pocketmine\Player;
use slot_menu_system\models\Menu;

class MenuItem extends Item
{
    /**
     * @var Menu
     */
    private $menu;

    public function __construct(Menu $menu, int $id, int $meta = 0, string $name = "Unknown") {
        $this->menu = $menu;
        parent::__construct($id, $meta, $name);
    }

    public function select(Player $player) {
        $this->menu->select($player);
    }
}