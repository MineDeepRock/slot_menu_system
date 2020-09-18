<?php


namespace slot_menu_system\pmmp\items;


use pocketmine\block\Block;
use pocketmine\item\Item;
use pocketmine\Player;
use slot_menu_system\models\SlotMenuElement;

class SlotMenuElementItem extends Item
{
    /**
     * @var SlotMenuElement
     */
    private $menu;

    public function __construct(SlotMenuElement $menu, int $id, int $meta = 0, string $name = "Unknown") {
        $this->menu = $menu;
        parent::__construct($id, $meta, $name);
    }

    public function select(Player $player) {
        $this->menu->select($player);
    }

    public function callOnClockedBlock(Player $Player, Block $block): void {
        $this->menu->callOnClockedBlock($Player, $block);
    }
}