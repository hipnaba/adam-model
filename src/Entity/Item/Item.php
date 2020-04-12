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
 *     "player" = "\Adam\Model\Entity\Character\PlayerCharacter",
 *     "celestial" = "\Adam\Model\Entity\Celestial\Celestial",
 *     "region" = "\Adam\Model\Entity\Celestial\Region",
 *     "constellation" = "\Adam\Model\Entity\Celestial\Constellation",
 *     "system" = "\Adam\Model\Entity\Celestial\System",
 *     "star" = "\Adam\Model\Entity\Celestial\Star",
 *     "planet" = "\Adam\Model\Entity\Celestial\Planet",
 *     "moon" = "\Adam\Model\Entity\Celestial\Moon",
 *     "asteroid_belt" = "\Adam\Model\Entity\Celestial\AsteroidBelt"
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

    /**
     * @param Item|null $location
     */
    public function setLocation(?Item $location): void
    {
        $this->location = $location;
    }
}
