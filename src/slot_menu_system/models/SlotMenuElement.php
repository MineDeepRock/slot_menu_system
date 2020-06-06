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
     * @var int
     */
    private $index;
    /**
     * @var Closure
     */
    private $onSelected;

    public function __construct(int $itemId, string $name, int $index, Closure $onSelected) {
        $this->itemId = $itemId;
        $this->name = $name;
        $this->index = $index;
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
    /**
     * @return int
     */
    public function getIndex(): int {
        return $this->index;
    }
}