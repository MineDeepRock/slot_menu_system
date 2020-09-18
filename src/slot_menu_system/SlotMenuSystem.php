<?php


namespace slot_menu_system;


use pocketmine\Player;
use slot_menu_system\models\SlotMenu;
use slot_menu_system\pmmp\items\SlotMenuElementItem;

class SlotMenuSystem
{
    static function send(Player $player, SlotMenu $slotMenu): void {
        $player->getInventory()->setContents([]);
        foreach ($slotMenu->getMenus() as $key => $menu) {
            $name = $menu->getName();
            $index = $slotMenu->isAutoIndex() ? $key : $menu->getIndex();

            $menuItem = new SlotMenuElementItem($menu, $menu->getItemId(), 0, $name);
            $menuItem->setCustomName($name);
            $player->getInventory()->setItem($index, $menuItem);
        }
    }

    static function close(Player $player): void {
        //TODO:アイテム復元
    }
}