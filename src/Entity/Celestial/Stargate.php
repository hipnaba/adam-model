<?php
namespace Adam\Model\Entity\Celestial;

use Adam\Model\Entity\Item\Item;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Stargate
 *
 * @package Adam\Model\Entity\Celestial
 * @author Danijel Fabijan <hipnaba@gmail.com>
 * @link https://github.com/hipnaba/adam-model
 *
 * @ORM\Entity()
 * @ORM\Table(name="celestial_stargate")
 */
class Stargate extends Item
{
    /**
     * @ORM\OneToOne(targetEntity="\Adam\Model\Entity\Celestial\Stargate", mappedBy="destination", inversedBy="destination")
     * @ORM\JoinColumn(name="destination_id", referencedColumnName="id", nullable=true)
     */
    private ?Stargate $destination;

    /**
     * @ORM\ManyToOne(targetEntity="\Adam\Model\Entity\Celestial\System", inversedBy="stargates")
     * @ORM\JoinColumn(name="system_id", referencedColumnName="id")
     */
    private System $system;

    /**
     * @return Stargate
     */
    public function getDestination(): Stargate
    {
        return $this->destination;
    }

    /**
     * @param Stargate $destination
     */
    public function setDestination(Stargate $destination): void
    {
        $this->destination = $destination;
    }

    /**
     * @return System
     */
    public function getSystem(): System
    {
        return $this->system;
    }
}
