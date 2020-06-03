<?php

namespace slot_menu_system\models;


use Closure;
use pocketmine\Player;

class SlotMenuElement
{
    /**
     * @var int
     */
    private $itemId;
    /**
     * @var string
     */
    private $name;
    /**
     * @var Closure
     */
    private $onSelected;

    public function __construct(int $itemId, string $name, Closure $onSelected) {
        $this->itemId = $itemId;
        $this->name = $name;
        $this->onSelected = $onSelected;
    }

    public function select(Player $Player): void {
        ($this->onSelected)($Player);
    }

    /**
     * @return int
     */
    public function getItemId(): int {
        return $this->itemId;
    }

    /**
     * @return string
     */
    public function getName(): string {
        return $this->name;
    }
}