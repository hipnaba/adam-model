<?php
namespace Adam\Model\Entity\Celestial;

use Adam\Model\Entity\Character\Faction;
use Adam\Model\Entity\Item\Item;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Region
 *
 * @package Adam\Model\Entity\Celestial
 * @author Danijel Fabijan <hipnaba@gmail.com>
 * @link https://github.com/hipnaba/adam-model
 *
 * @ORM\Entity()
 * @ORM\Table(name="celestial_region")
 */
class Region extends Item
{
    /**
     * @ORM\ManyToOne(targetEntity="\Adam\Model\Entity\Character\Faction")
     * @ORM\JoinColumn(name="faction_id", referencedColumnName="id", nullable=true)
     */
    private ?Faction $faction;

    /**
     * @ORM\OneToMany(targetEntity="\Adam\Model\Entity\Celestial\Constellation", mappedBy="region")
     * @ORM\OrderBy({"name" = "ASC"})
     */
    private Collection $constellations;

    /**
     * Region constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->constellations = new ArrayCollection();
    }

    /**
     * @return Faction|null
     */
    public function getFaction(): ?Faction
    {
        return $this->faction;
    }

    /**
     * @return Constellation[]|Collection
     */
    public function getConstellations(): Collection
    {
        return $this->constellations;
    }
}
