<?php
namespace Adam\Model\Entity\Celestial;

use Adam\Model\Entity\Character\Faction;
use Adam\Model\Entity\Item\Item;
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
     * @ORM\ManyToOne(targetEntity="\Adam\Model\Entity\Character\Faction")
     * @ORM\JoinColumn(name="faction_id", referencedColumnName="id", nullable=true)
     */
    private ?Faction $faction;

    /**
     * @ORM\ManyToOne(targetEntity="\Adam\Model\Entity\Celestial\Region", inversedBy="constellations")
     * @ORM\JoinColumn(name="region_id", referencedColumnName="id")
     */
    private Region $region;

    /**
     * @ORM\OneToMany(targetEntity="\Adam\Model\Entity\Celestial\System", mappedBy="constellation")
     * @ORM\OrderBy({"name" = "ASC"})
     */
    private Collection $systems;

    /**
     * @return Faction|null
     */
    public function getFaction(): ?Faction
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
}
