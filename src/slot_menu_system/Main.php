<?php

namespace slot_menu_system;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\event\server\DataPacketReceiveEvent;
use pocketmine\network\mcpe\protocol\LevelSoundEventPacket;
use pocketmine\plugin\PluginBase;
use slot_menu_system\pmmp\commands\SlotMenuCommand;
use slot_menu_system\pmmp\items\MenuItem;

class Main extends PluginBase implements Listener
{
    public function onEnable() {
        $this->getServer()->getCommandMap()->register("slotMenu", new SlotMenuCommand());
        $this->getServer()->getPluginManager()->registerEvents($this,$this);
    }

    public function onTapBlock(PlayerInteractEvent $event) {
        if ($event->getAction() !== PlayerInteractEvent::RIGHT_CLICK_BLOCK) {
            $player = $event->getPlayer();
            $item = $player->getInventory()->getItemInHand();
            if ($item instanceof MenuItem) {
                $item->select($player);
            }
        }
    }

    public function onTapAir(DataPacketReceiveEvent $event) {
        $packet = $event->getPacket();
        if ($packet instanceof LevelSoundEventPacket) {
            if ($packet->sound === LevelSoundEventPacket::SOUND_ATTACK_NODAMAGE) {
                $player = $event->getPlayer();
                $item = $player->getInventory()->getItemInHand();
                if ($item instanceof MenuItem) {
                    $item->select($player);
                }
            }
        }
    }

}