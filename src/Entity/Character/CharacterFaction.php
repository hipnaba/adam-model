<?php
namespace Adam\Model\Entity\Character;

use Adam\Model\Entity\Celestial\Celestial;
use Adam\Model\Entity\Item\Item;
use Adam\Model\Traits\CorporationTrait;
use Adam\Model\Traits\Item\ItemIconTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Faction
 *
 * @package Adam\Model\Entity\Character
 * @author Danijel Fabijan <hipnaba@gmail.com>
 * @link https://github.com/hipnaba/adam-model
 *
 * @ORM\Table(name="character_faction")
 */
final class CharacterFaction extends Item
{
    use CorporationTrait;
    use ItemIconTrait;

    /**
     * @ORM\ManyToOne(targetEntity="CharacterRace")
     * @ORM\JoinColumn(name="race_id", referencedColumnName="id")
     */
    private CharacterRace $race;

    /**
     * @ORM\ManyToOne(targetEntity="\Adam\Model\Entity\Celestial\Celestial")
     * @ORM\JoinColumn(name="system_id", referencedColumnName="id", nullable=false)
     */
    private Celestial $system;

    /**
     * @ORM\ManyToOne(targetEntity="\Adam\Model\Entity\Item\Item")
     * @ORM\JoinColumn(name="militia_corporation_id", referencedColumnName="id")
     */
    private Item $militia_corporation;

    /**
     * @ORM\Column(type="integer")
     */
    private int $size_factor;

    /**
     * @ORM\Column(type="integer")
     */
    private int $station_count;

    /**
     * @ORM\Column(type="integer")
     */
    private int $station_system_count;

    /**
     * @return CharacterRace
     */
    public function getRace(): CharacterRace
    {
        return $this->race;
    }

    /**
     * @return Celestial
     */
    public function getSystem(): Celestial
    {
        return $this->system;
    }

    /**
     * @return Item
     */
    public function getMilitiaCorporation(): Item
    {
        return $this->militia_corporation;
    }

    /**
     * @return int
     */
    public function getSizeFactor(): int
    {
        return $this->size_factor;
    }

    /**
     * @return int
     */
    public function getStationCount(): int
    {
        return $this->station_count;
    }

    /**
     * @return int
     */
    public function getStationSystemCount(): int
    {
        return $this->station_system_count;
    }
}
