<?php
namespace Adam\Model\Entity\Character;

use Adam\Model\Entity\Item\Item;
use DateTimeImmutable;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Character
 *
 * @package Adam\Model\Entity\Character
 * @author Danijel Fabijan <hipnaba@gmail.com>
 * @link https://github.com/hipnaba/adam-model
 *
 * @ORM\Entity()
 * @ORM\Table(name="`character`")
 */
class Character extends Item
{
    /**
     * @ORM\ManyToOne(targetEntity="\Adam\Model\Entity\Character\CharacterAncestry")
     * @ORM\JoinColumn(name="ancestry_id", referencedColumnName="id", nullable=true)
     */
    private ?CharacterAncestry $ancestry;

    /**
     * @ORM\ManyToOne(targetEntity="\Adam\Model\Entity\Character\CharacterBloodline")
     * @ORM\JoinColumn(name="bloodline_id", referencedColumnName="id", nullable=false)
     */
    private CharacterBloodline $bloodline;

    /**
     * @ORM\Column(type="datetimetz_immutable")
     */
    private DateTimeImmutable $birthday;

    /**
     * @ORM\Column(type="string")
     */
    private string $gender;

    /**
     * @ORM\Column(type="float")
     */
    private float $security_status;

    /**
     * @ORM\ManyToOne(targetEntity="\Adam\Model\Entity\Item\Item")
     * @ORM\JoinColumn(name="corporation_id", referencedColumnName="id", nullable=false)
     */
    private Item $corporation;

    /**
     * @return CharacterAncestry
     */
    public function getAncestry(): CharacterAncestry
    {
        return $this->ancestry;
    }

    /**
     * @return DateTimeImmutable
     */
    public function getBirthday(): DateTimeImmutable
    {
        return $this->birthday;
    }

    /**
     * @return string
     */
    public function getGender(): string
    {
        return $this->gender;
    }

    /**
     * @return float
     */
    public function getSecurityStatus(): float
    {
        return $this->security_status;
    }

    /**
     * @return Item
     */
    public function getCorporation(): Item
    {
        return $this->corporation;
    }

    /**
     * @return CharacterBloodline
     */
    public function getBloodline(): CharacterBloodline
    {
        return $this->bloodline;
    }
}
