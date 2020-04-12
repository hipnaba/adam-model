<?php
namespace Adam\Model\Entity\Celestial;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Moon
 *
 * @package Adam\Model\Entity\Celestial
 * @author Danijel Fabijan <hipnaba@gmail.com>
 * @link https://github.com/hipnaba/adam-model
 *
 * @ORM\Entity()
 * @ORM\Table(name="celestial_moon")
 */
class Moon extends Celestial
{
    /**
     * @ORM\ManyToOne(targetEntity="\Adam\Model\Entity\Celestial\Planet", inversedBy="moons")
     * @ORM\JoinColumn(name="planet_id", referencedColumnName="id", nullable=false)
     */
    private Planet $planet;

    /**
     * @return Planet
     */
    public function getPlanet(): Planet
    {
        return $this->planet;
    }
}
