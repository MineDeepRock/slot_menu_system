# SlotMenuSystem
# 使い方

```php
use pocketmine\item\ItemIds;
use pocketmine\Player;
use slot_menu_system\models\SlotMenu;
use slot_menu_system\models\SlotMenuElement;
use slot_menu_system\SlotMenuSystem;

$slotMenu = new SlotMenu([
    new SlotMenuElement(ItemIds::EMERALD, "Title", function (Player $player) {
        $player->addTitle("Title");
    }),
    new SlotMenuElement(ItemIds::DIAMOND, "Message", function (Player $player) {
        $player->sendMessage("Title");
    }),
    new SlotMenuElement(ItemIds::IRON_INGOT, "Popup", function (Player $player) {
        $player->sendPopup("Popup");
    }),
    new SlotMenuElement(ItemIds::GOLD_INGOT, "Whisper", function (Player $player) {
        $player->sendWhisper("System", "Title");
    })
]);

SlotMenuSystem::send($target, $slotMenu);
```

### 継承して使う
```php
use pocketmine\item\ItemIds;
use pocketmine\Player;
use slot_menu_system\models\SlotMenu;
use slot_menu_system\models\SlotMenuElement;
use slot_menu_system\SlotMenuSystem;

class LobbySlotMenu extends SlotMenu
{
    public function __construct() {
        $menus = [
            new SlotMenuElement(ItemIds::STONE, "フレンド", 0, function (Player $player) {
                SlotMenuSystem::send($player, new FriendsSlotMenu());
            }),
            new SlotMenuElement(ItemIds::IRON_INGOT, "ガチャ", 1, function (Player $player) {
                SlotMenuSystem::send($player, new FriendsSlotMenu());
            }),
        ];
        parent::__construct($menus);
    }
}

class FriendsSlotMenu extends SlotMenu
{
    public function __construct() {
        $menus = [
            new SlotMenuElement(ItemIds::SUGAR, "フレンド名", 0, function (Player $player) {
                //フレンドにテレポート
            }),
            new SlotMenuElement(ItemIds::SUGAR, "フレンド名", 1, function (Player $player) {
                //フレンドにテレポート
            }),
            //...

            //戻る
            new SlotMenuElement(ItemIds::HOPPER, "戻る", 8, function (Player $player) {
                SlotMenuSystem::send($player, new LobbySlotMenu());
            }),
        ];
        parent::__construct($menus);
    }
}

class ClatterSlotMenu extends SlotMenu
{
    public function __construct() {
        $menus = [
            new SlotMenuElement(ItemIds::SUGAR, "引く", 0, function (Player $player) {
                //ガチャを引く
            }),
            //戻る
            new SlotMenuElement(ItemIds::HOPPER, "戻る", 8, function (Player $player) {
                SlotMenuSystem::send($player, new LobbySlotMenu());
            }),
        ];
        parent::__construct($menus);
    }
}
```