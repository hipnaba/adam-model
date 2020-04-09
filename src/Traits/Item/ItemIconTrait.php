<?php
namespace Adam\Model\Traits\Item;

use Adam\Model\Entity\Item\ItemIcon;
use Doctrine\ORM\Mapping as ORM;

/**
 * Trait IconTrait
 *
 * @package Adam\Model\Traits\Item
 * @author Danijel Fabijan <hipnaba@gmail.com>
 * @link https://github.com/hipnaba/adam-model
 */
trait ItemIconTrait
{
    /**
     * @ORM\ManyToOne(targetEntity="\Adam\Model\Entity\Item\ItemIcon")
     * @ORM\JoinColumn(name="icon_id", referencedColumnName="id", nullable=true)
     */
    private ?ItemIcon $icon;

    /**
     * @return ItemIcon|null
     */
    public function getIcon(): ?ItemIcon
    {
        return $this->icon;
    }

    /**
     * @return bool
     */
    public function hasIcon(): bool
    {
        return ($this->icon instanceof ItemIcon);
    }
}
