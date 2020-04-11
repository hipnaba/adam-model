<?php
namespace Adam\Model\Entity\Character;

use Adam\Model\Traits\DescriptionTrait;
use Adam\Model\Traits\IdTrait;
use Adam\Model\Traits\NameTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Bloodline
 *
 * @package Adam\Model\Entity\Character
 * @author Danijel Fabijan <hipnaba@gmail.com>
 * @link https://github.com/hipnaba/adam-model
 *
 * @ORM\Table(name="character_bloodline")
 */
class Bloodline
{
    use IdTrait;
    use NameTrait;
    use DescriptionTrait;

    /**
     * @ORM\Column(type="integer")
     */
    private int $race_id;

    /**
     * @ORM\OneToMany(targetEntity="\Adam\Model\Entity\Character\Ancestry", mappedBy="bloodline")
     */
    private Collection $ancestries;

    /**
     * @ORM\Column(type="integer")
     */
    private int $corporation_id;

    /**
     * @ORM\Column(type="integer")
     */
    private int $ship_type_id;

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
     * Bloodline constructor.
     */
    public function __construct()
    {
        $this->ancestries = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getRaceId(): int
    {
        return $this->race_id;
    }

    /**
     * @return int
     */
    public function getCorporationId(): int
    {
        return $this->corporation_id;
    }

    /**
     * @return int
     */
    public function getShipTypeId(): int
    {
        return $this->ship_type_id;
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
