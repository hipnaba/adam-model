<?php
namespace Adam\Model\Entity\Item;

use Adam\Model\Traits\DescriptionTrait;
use Adam\Model\Traits\IdTrait;
use Adam\Model\Traits\NameTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Item
 *
 * @package Adam\Model\Entity\Item
 * @author Danijel Fabijan <hipnaba@gmail.com>
 * @link https://github.com/hipnaba/adam-model
 *
 * @ORM\Entity()
 * @ORM\Table(name="item")
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="type", type="string")
 * @ORM\DiscriminatorMap({
 *     "item" = "\Adam\Model\Entity\Item\Item",
 *     "character" = "\Adam\Model\Entity\Character\Character",
 *     "faction" = "\Adam\Model\Entity\Character\CharacterFaction",
 *     "agent" = "\Adam\Model\Entity\Agent\Agent",
 *     "celestial" = "\Adam\Model\Entity\Celestial\Celestial"
 * })
 */
class Item
{
    use IdTrait;
    use NameTrait;
    use DescriptionTrait;

    /**
     * @ORM\ManyToOne(targetEntity="\Adam\Model\Entity\Item\ItemType", inversedBy="items")
     * @ORM\JoinColumn(name="type_id", referencedColumnName="id", nullable=true)
     */
    protected ?ItemType $type;

    /**
     * @ORM\ManyToOne(targetEntity="\Adam\Model\Entity\Item\Item")
     * @ORM\JoinColumn(name="location_id", referencedColumnName="id", nullable=true)
     */
    private ?Item $location;

    /**
     * @return ItemType|null
     */
    public function getType(): ?ItemType
    {
        return $this->type;
    }

    /**
     * @return Item|null
     */
    public function getLocation(): ?Item
    {
        return $this->location;
    }
}
