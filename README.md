# SlotMenuSystem

```php
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

SlotMenuSystem::send($sender, $slotMenu);
```