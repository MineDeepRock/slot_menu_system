<?php


namespace slot_menu_system;


use pocketmine\Player;
use slot_menu_system\models\SlotMenuElement;
use slot_menu_system\models\SlotMenu;
use slot_menu_system\pmmp\items\SlotMenuElementItem;

class SlotMenuSystem
{
    static function send(Player $player, SlotMenu $slotMenu): void {
        $contents = array_map(function (SlotMenuElement $menu) {
            $menuItem = new SlotMenuElementItem($menu, $menu->getItemId(), 0, $menu->getName());
            $menuItem->setCustomName($menu->getName());
            return $menuItem;
        }, $slotMenu->getMenus());

        $player->getInventory()->setContents($contents);
    }

    static function close(Player $player): void {
        //TODO:アイテム復元
    }
}