<?php

namespace slot_menu_system\pmmp\commands;


use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\item\ItemIds;
use pocketmine\Player;
use slot_menu_system\models\Menu;
use slot_menu_system\models\SlotMenu;
use slot_menu_system\SlotMenuSystem;

class SlotMenuCommand extends Command
{
    public function __construct() {
        parent::__construct("slotMenu", "", "");
        $this->setPermission("SlotMenu.Command");
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args): bool {
        if ($sender instanceof Player) {
            if (!$sender->isOp()) {
                $sender->sendMessage("権限がありません");
                return false;
            }

            $slotMenu = new SlotMenu([
                new Menu(ItemIds::EMERALD, "Title", function (Player $player) {
                    $player->addTitle("Title");
                }),
                new Menu(ItemIds::DIAMOND, "Message", function (Player $player) {
                    $player->sendMessage("Title");
                }),
                new Menu(ItemIds::IRON_INGOT, "Popup", function (Player $player) {
                    $player->sendPopup("Popup");
                }),
                new Menu(ItemIds::GOLD_INGOT, "Whisper", function (Player $player) {
                    $player->sendWhisper("System", "Title");
                })
            ]);

            SlotMenuSystem::send($sender, $slotMenu);
        }
        return false;
    }
}