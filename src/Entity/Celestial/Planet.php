<?php
namespace Adam\Model\Entity\Celestial;

use Adam\Model\Entity\Item\Item;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Planet
 *
 * @package Adam\Model\Entity\Celestial
 * @author Danijel Fabijan <hipnaba@gmail.com>
 * @link https://github.com/hipnaba/adam-model
 *
 * @ORM\Table(name="celestial_planet")
 */
class Planet extends Item
{
    /**
     * @ORM\ManyToOne(targetEntity="\Adam\Model\Entity\Celestial\System", inversedBy="planets")
     * @ORM\JoinColumn(name="system_id", referencedColumnName="id")
     */
    private System $system;

    /**
     * @ORM\Column(type="integer")
     */
    private int $celestial_index;

    /**
     * @return System
     */
    public function getSystem(): System
    {
        return $this->system;
    }

    /**
     * @return int
     */
    public function getCelestialIndex(): int
    {
        return $this->celestial_index;
    }
}
