<?php
namespace Adam\Model\Entity\Celestial;

use Adam\Model\Entity\Core\Position;
use Adam\Model\Traits\IdTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class CelestialObject
 *
 * @package Adam\Model\Entity\Celestial
 * @author Danijel Fabijan <hipnaba@gmail.com>
 * @link https://github.com/hipnaba/adam-model
 *
 * @ORM\Entity()
 * @ORM\Table(name="celestial_object")
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="class", type="string")
 */
class CelestialObject
{
    use IdTrait;

    /**
     * @ORM\Column(type="object")
     */
    private Position $position;

    /**
     * CelestialObject constructor.
     */
    public function __construct()
    {
        $this->position = new Position();
    }

    /**
     * @return Position
     */
    public function getPosition(): Position
    {
        return $this->position;
    }
}
