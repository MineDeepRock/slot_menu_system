<?php


namespace slot_menu_system;


use pocketmine\Player;
use slot_menu_system\pmmp\items\SlotMenuElementItem;

class SlotMenuSystem
{
    static function send(Player $player, SlotMenu $slotMenu): void {
        $usedIndexList = [];
        foreach ($slotMenu->getMenus() as $menu) {
            if ($menu->getIndex() !== null) $usedIndexList[] = $menu->getIndex();
        }

        $setMenuItem = function (SlotMenuElement $slotMenuElement) use ($player) {
            $menuItem = new SlotMenuElementItem($slotMenuElement, $slotMenuElement->getItemId(), 0, $slotMenuElement->getName());
            $menuItem->setCustomName($slotMenuElement->getName());
            $player->getInventory()->setItem($slotMenuElement->getIndex(), $menuItem);
        };

        $player->getInventory()->setContents([]);
        $index = 0;
        foreach ($slotMenu->getMenus() as $slotMenuElement) {
            if ($slotMenuElement->getIndex() !== null) {
                $setMenuItem($slotMenuElement);
            }

            while (in_array($index, $usedIndexList)) {
                $index++;
            }

            $usedIndexList[] = $index;
            $slotMenuElement->setIndex($index);
            $setMenuItem($slotMenuElement);
        }
    }

    static function close(Player $player): void {
        //TODO:アイテム復元
        $player->getInventory()->setContents([]);
    }
}