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
     * @ORM\OneToMany(targetEntity="\Adam\Model\Entity\Celestial\Stargate", mappedBy="system")
     */
    private Collection $stargates;

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
     * @var System[]|Collection
     */
    private Collection $adjacentSystems;

    /**
     * SolarSystem constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->stargates = new ArrayCollection();
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
     * @return System[]|Collection
     */
    public function getAdjacentSystems(): Collection
    {
        if (!isset($this->adjacentSystems)) {
            $systems = [];

            foreach ($this->getStargates() as $stargate) {
                $destinationSystem = $stargate->getDestination()->getSystem();

                if (!in_array($destinationSystem, $systems, true)) {
                    $systems[] = $destinationSystem;
                }
            }

            usort($systems, fn (System $a, System $b) => $a->getName() < $b->getName() ? -1 : 1);
            $this->adjacentSystems = new ArrayCollection($systems);
        }

        return $this->adjacentSystems;
    }

    /**
     * @return Stargate[]|Collection
     */
    public function getStargates(): Collection
    {
        return $this->stargates;
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
