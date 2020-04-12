<?php
namespace Adam\Model\Entity\Celestial;

use Adam\Model\Entity\Item\Item;
use Adam\Model\Entity\Item\ItemPosition;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class CelestialObject
 *
 * @package Adam\Model\Entity\Celestial
 * @author Danijel Fabijan <hipnaba@gmail.com>
 * @link https://github.com/hipnaba/adam-model
 *
 * @ORM\Entity()
 * @ORM\Table(name="celestial")
 */
class Celestial extends Item
{
    /**
     * @ORM\Column(type="object")
     */
    private ItemPosition $position;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private ?float $radius;

    /**
     * Celestial constructor.
     */
    public function __construct()
    {
        $this->position = new ItemPosition(0, 0, 0);
    }

    /**
     * @return float|null
     */
    public function getRadius(): ?float
    {
        return $this->radius;
    }
}
