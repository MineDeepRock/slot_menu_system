<?php


namespace slot_menu_system;


use pocketmine\Player;
use slot_menu_system\models\Menu;
use slot_menu_system\models\SlotMenu;
use slot_menu_system\pmmp\items\MenuItem;

class SlotMenuSystem
{
    static function send(Player $player, SlotMenu $slotMenu): void {
        $contents = array_map(function (Menu $menu) {
            $menuItem = new MenuItem($menu, $menu->getItemId(), 0, $menu->getName());
            $menuItem->setCustomName($menu->getName());
            return $menuItem;
        }, $slotMenu->getMenus());

        $player->getInventory()->setContents($contents);
    }

    static function close(Player $player): void {
        //TODO:アイテム復元
    }
}