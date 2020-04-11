<?php
namespace Adam\Model\Entity\Character;

use Adam\Model\Traits\DescriptionTrait;
use Adam\Model\Traits\IdTrait;
use Adam\Model\Traits\NameTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Ancestry
 *
 * @package Adam\Model\Entity\Character
 * @author Danijel Fabijan <hipnaba@gmail.com>
 * @link https://github.com/hipnaba/adam-model
 *
 * @ORM\Entity()
 * @ORM\Table(name="character_ancestry")
 */
class CharacterAncestry
{
    use IdTrait;
    use NameTrait;
    use DescriptionTrait;

    /**
     * @ORM\ManyToOne(targetEntity="\Adam\Model\Entity\Character\CharacterBloodline", inversedBy="ancestries")
     * @ORM\JoinColumn(name="bloodline_id", referencedColumnName="id")
     */
    private CharacterBloodline $bloodline;

    /**
     * @ORM\Column(type="text")
     */
    private ?string $short_description;

    /**
     * @ORM\Column(type="integer")
     */
    private int $perception;

    /**
     * @ORM\Column(type="integer")
     */
    private int $willpower;

    /**
     * @ORM\Column(type="integer")
     */
    private int $charisma;

    /**
     * @ORM\Column(type="integer")
     */
    private int $memory;

    /**
     * @ORM\Column(type="integer")
     */
    private int $intelligence;

    /**
     * @return CharacterBloodline
     */
    public function getBloodline(): CharacterBloodline
    {
        return $this->bloodline;
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
    public function getMemory(): int
    {
        return $this->memory;
    }

    /**
     * @return int
     */
    public function getIntelligence(): int
    {
        return $this->intelligence;
    }

    /**
     * @return string|null
     */
    public function getShortDescription(): ?string
    {
        return $this->short_description;
    }
}
