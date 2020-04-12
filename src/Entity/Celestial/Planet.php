<?php
namespace Adam\Model\Entity\Celestial;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Planet
 *
 * @package Adam\Model\Entity\Celestial
 * @author Danijel Fabijan <hipnaba@gmail.com>
 * @link https://github.com/hipnaba/adam-model
 *
 * @ORM\Entity()
 * @ORM\Table(name="celestial_planet")
 */
class Planet extends Celestial
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
     * @ORM\OneToMany(targetEntity="\Adam\Model\Entity\Celestial\Moon", mappedBy="planet")
     * @ORM\OrderBy({"celestial_index" = "ASC"})
     */
    private Collection $moons;

    /**
     * Planet constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->moons = new ArrayCollection();
    }

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

    /**
     * @return Moon[]|Collection
     */
    public function getMoons(): Collection
    {
        return $this->moons;
    }
}
