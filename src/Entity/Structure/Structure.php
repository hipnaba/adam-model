<?php
namespace Adam\Model\Entity\Structure;

use Adam\Model\Entity\Celestial\System;
use Adam\Model\Entity\Corporation\PlayerCorporation;
use Adam\Model\Entity\Item\Item;
use Adam\Model\Entity\Item\ItemPosition;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Structure
 *
 * @package Adam\Model\Entity\Structure
 * @author Danijel Fabijan <hipnaba@gmail.com>
 * @link https://github.com/hipnaba/adam-model
 *
 * @ORM\Entity()
 * @ORM\Table(name="structure")
 */
class Structure extends Item
{
    /**
     * @ORM\ManyToOne(targetEntity="\Adam\Model\Entity\Corporation\Corporation")
     * @ORM\JoinColumn(name="owner_id", referencedColumnName="id", nullable=false)
     */
    private PlayerCorporation $owner;

    /**
     * @ORM\ManyToOne(targetEntity="\Adam\Model\Entity\Celestial\System")
     * @ORM\JoinColumn(name="system_id", referencedColumnName="id", nullable=false)
     */
    private System $system;

    /**
     * @ORM\Column(type="object")
     */
    private ItemPosition $position;

    /**
     * Structure constructor.
     */
    public function __construct()
    {
        $this->position = new ItemPosition();
    }

    /**
     * @return PlayerCorporation
     */
    public function getOwner(): PlayerCorporation
    {
        return $this->owner;
    }

    /**
     * @return System
     */
    public function getSystem(): System
    {
        return $this->system;
    }

    /**
     * @return ItemPosition
     */
    public function getPosition(): ItemPosition
    {
        return $this->position;
    }
}
