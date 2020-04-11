<?php
namespace Adam\Model\Entity\Celestial;

use Adam\Model\Entity\Item\Item;
use Adam\Model\Entity\Station\Station;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class SolarSystem
 *
 * @package Adam\Model\Entity\Celestial
 * @author Danijel Fabijan <hipnaba@gmail.com>
 * @link https://github.com/hipnaba/adam-model
 *
 * @ORM\Entity(repositoryClass="\Adam\Model\Repository\Celestial\SolarSystemRepository")
 * @ORM\Table(name="celestial_system")
 */
class System extends Item
{
    // TODO: planets
    // TODO: star
    // TODO: stargates

    /**
     * @ORM\ManyToOne(targetEntity="\Adam\Model\Entity\Celestial\Constellation", inversedBy="systems")
     * @ORM\JoinColumn(name="constellation_id", referencedColumnName="id")
     */
    private Constellation $constellation;

    /**
     * @ORM\OneToMany(targetEntity="\Adam\Model\Entity\Station\Station", mappedBy="system")
     */
    private Collection $stations;

    /**
     * @ORM\Column(type="float")
     */
    private float $security_status;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private ?string $security_class;

    /**
     * SolarSystem constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->stations = new ArrayCollection();
    }

    /**
     * @return Region
     */
    public function getRegion(): Region
    {
        return $this->getConstellation()->getRegion();
    }

    /**
     * @return Constellation
     */
    public function getConstellation(): Constellation
    {
        return $this->constellation;
    }

    /**
     * @return Station[]|Collection
     */
    public function getStations()
    {
        return $this->stations;
    }

    /**
     * @return float
     */
    public function getSecurityStatus(): float
    {
        return $this->security_status;
    }

    /**
     * @return string|null
     */
    public function getSecurityClass(): ?string
    {
        return $this->security_class;
    }
}
