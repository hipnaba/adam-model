<?php
namespace Adam\Model\Entity\Character;

use Adam\Model\Entity\Item\Item;
use Adam\Model\Entity\Item\ItemType;
use Adam\Model\Traits\DescriptionTrait;
use Adam\Model\Traits\IdTrait;
use Adam\Model\Traits\Item\ItemIconTrait;
use Adam\Model\Traits\NameTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Bloodline
 *
 * @package Adam\Model\Entity\Character
 * @author Danijel Fabijan <hipnaba@gmail.com>
 * @link https://github.com/hipnaba/adam-model
 *
 * @ORM\Entity()
 * @ORM\Table(name="character_bloodline")
 */
class CharacterBloodline
{
    use IdTrait;
    use NameTrait;
    use ItemIconTrait;
    use DescriptionTrait;

    /**
     * @ORM\ManyToOne(targetEntity="\Adam\Model\Entity\Character\CharacterRace", inversedBy="bloodlines")
     * @ORM\JoinColumn(name="race_id", referencedColumnName="id", nullable=false)
     */
    private CharacterRace $race;

    /**
     * @ORM\ManyToOne(targetEntity="\Adam\Model\Entity\Item\Item")
     * @ORM\JoinColumn(name="corporation_id", referencedColumnName="id", nullable=false)
     */
    private Item $corporation;

    /**
     * @ORM\Column(type="text")
     */
    private string $male_description;

    /**
     * @ORM\Column(type="text")
     */
    private string $female_description;

    /**
     * @ORM\Column(type="text")
     */
    private string $short_description;

    /**
     * @ORM\Column(type="text")
     */
    private string $short_male_description;

    /**
     * @ORM\Column(type="text")
     */
    private string $short_female_description;

    /**
     * @ORM\ManyToOne(targetEntity="\Adam\Model\Entity\Item\ItemType")
     * @ORM\JoinColumn(name="ship_type_id", referencedColumnName="id", nullable=false)
     */
    private ItemType $ship_type;

    /**
     * @ORM\Column(type="integer")
     */
    private int $charisma;

    /**
     * @ORM\Column(type="integer")
     */
    private int $intelligence;

    /**
     * @ORM\Column(type="integer")
     */
    private int $memory;

    /**
     * @ORM\Column(type="integer")
     */
    private int $perception;

    /**
     * @ORM\Column(type="integer")
     */
    private int $willpower;

    /**
     * @return CharacterRace
     */
    public function getRace(): CharacterRace
    {
        return $this->race;
    }

    /**
     * @return Item
     */
    public function getCorporation(): Item
    {
        return $this->corporation;
    }

    /**
     * @return string
     */
    public function getMaleDescription(): string
    {
        return $this->male_description;
    }

    /**
     * @return string
     */
    public function getFemaleDescription(): string
    {
        return $this->female_description;
    }

    /**
     * @return string
     */
    public function getShortDescription(): string
    {
        return $this->short_description;
    }

    /**
     * @return string
     */
    public function getShortMaleDescription(): string
    {
        return $this->short_male_description;
    }

    /**
     * @return string
     */
    public function getShortFemaleDescription(): string
    {
        return $this->short_female_description;
    }

    /**
     * @return ItemType
     */
    public function getShipType(): ItemType
    {
        return $this->ship_type;
    }

    /**
     * @return int
     */
    public function getCharisma(): int
    {
        return $this->charisma;
    }

    /**
     * @return int
     */
    public function getIntelligence(): int
    {
        return $this->intelligence;
    }

    /**
     * @return int
     */
    public function getMemory(): int
    {
        return $this->memory;
    }

    /**
     * @return int
     */
    public function getPerception(): int
    {
        return $this->perception;
    }

    /**
     * @return int
     */
    public function getWillpower(): int
    {
        return $this->willpower;
    }
}
