<?php
namespace Adam\Model\Entity\Celestial;

use Adam\Model\Entity\Character\CharacterFaction;
use Adam\Model\Entity\Item\Item;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Constellation
 *
 * @package Adam\Model\Entity\Celestial
 * @author Danijel Fabijan <hipnaba@gmail.com>
 * @link https://github.com/hipnaba/adam-model
 *
 * @ORM\Entity()
 * @ORM\Table(name="celestial_constellation")
 */
class Constellation extends Item
{
    /**
     * @ORM\ManyToOne(targetEntity="\Adam\Model\Entity\Character\CharacterFaction")
     * @ORM\JoinColumn(name="faction_id", referencedColumnName="id", nullable=true)
     */
    private ?CharacterFaction $faction;

    /**
     * @ORM\ManyToOne(targetEntity="\Adam\Model\Entity\Celestial\Region", inversedBy="constellations")
     * @ORM\JoinColumn(name="region_id", referencedColumnName="id")
     */
    private Region $region;

    /**
     * @ORM\OneToMany(targetEntity="\Adam\Model\Entity\Celestial\System", mappedBy="constellation")
     * @ORM\OrderBy({"name" = "ASC"})
     * @var System[]|Collection
     */
    private Collection $systems;

    /**
     * @var Constellation[]|Collection
     */
    private Collection $adjacentConstellations;

    /**
     * Constellation constructor.
     */
    public function __construct()
    {
        $this->systems = new ArrayCollection();
    }

    /**
     * @return CharacterFaction|null
     */
    public function getFaction(): ?CharacterFaction
    {
        return $this->faction;
    }

    /**
     * @return Region
     */
    public function getRegion(): Region
    {
        return $this->region;
    }

    /**
     * @return System[]|Collection
     */
    public function getSystems(): Collection
    {
        return $this->systems;
    }

    /**
     * @return Constellation[]|Collection
     */
    public function getAdjacentConstellations(): Collection
    {
        if (!isset($this->adjacentConstellations)) {
            $constellations = [];

            foreach ($this->systems as $system) {
                foreach ($system->getAdjacentSystems() as $adjacentSystem) {
                    $adjacentConstellation = $adjacentSystem->getConstellation();

                    if ($adjacentConstellation !== $this && !in_array($adjacentConstellation, $constellations, true)) {
                        $constellations[] = $adjacentConstellation;
                    }
                }
            }

            usort($constellations, fn (Constellation $a, Constellation $b) => $a->getName() < $b->getName() ? -1 : 1);
            $this->adjacentConstellations = new ArrayCollection($constellations);
        }

        return $this->adjacentConstellations;
    }
}
