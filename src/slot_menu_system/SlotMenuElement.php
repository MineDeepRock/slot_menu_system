<?php

namespace slot_menu_system\models;


use Closure;
use pocketmine\block\Block;
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
     * @var null|int
     */
    private $index;
    /**
     * @var Closure
     */
    private $onSelected;
    /**
     * @var Closure
     */
    private $onClickedBlock;

    public function __construct(int $itemId, string $name, Closure $onSelected, Closure $onClickedBlock, ?int $index = null) {
        $this->itemId = $itemId;
        $this->name = $name;
        $this->index = $index;
        $this->onSelected = $onSelected;
        $this->onClickedBlock = $onClickedBlock;
    }

    public function select(Player $Player): void {
        ($this->onSelected)($Player);
    }

    public function callOnClockedBlock(Player $Player, Block $block): void {
        ($this->onClickedBlock)($Player, $block);
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
     * @return null|int
     */
    public function getIndex(): ?int {
        return $this->index;
    }
}