<?php

namespace slot_menu_system;

use pocketmine\event\block\BlockBreakEvent;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\event\server\DataPacketReceiveEvent;
use pocketmine\network\mcpe\protocol\LevelSoundEventPacket;
use pocketmine\plugin\PluginBase;
use slot_menu_system\pmmp\items\SlotMenuElementItem;

class Main extends PluginBase implements Listener
{
    public function onEnable() {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }

    public function onBeakBlock(BlockBreakEvent $event) {
        $player = $event->getPlayer();
        $item = $player->getInventory()->getItemInHand();
        if ($item instanceof SlotMenuElementItem) {
            $item->callOnClockedBlock($player, $event->getBlock());
            $event->setCancelled();
        }
    }

    public function onTapBlock(PlayerInteractEvent $event) {
        $player = $event->getPlayer();
        $item = $player->getInventory()->getItemInHand();
        if ($item instanceof SlotMenuElementItem) {
            if ($event->getAction() === PlayerInteractEvent::RIGHT_CLICK_BLOCK) {
                $item->callOnClockedBlock($player, $event->getBlock());
            } else {
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
                if ($item instanceof SlotMenuElementItem) {
                    $item->select($player);
                }
            }
        }
    }
}