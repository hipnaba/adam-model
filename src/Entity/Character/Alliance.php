<?php
namespace Adam\Model\Entity\Character;

use Adam\Model\Entity\Traits\IdTrait;
use Adam\Model\Entity\Traits\NameTrait;
use DateTimeImmutable;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Alliance
 *
 * @package Adam\Model\Entity\Character
 * @author Danijel Fabijan <hipnaba@gmail.com>
 * @link https://github.com/hipnaba/adam-model
 *
 * @ORM\Entity()
 * @ORM\Table(name="character_alliance")
 */
class Alliance
{
    use IdTrait;
    use NameTrait;

    /**
     * @ORM\Column(type="string", unique=true)
     */
    private string $ticker;

    /**
     * @ORM\Column(type="integer")
     */
    private int $creator_id;

    /**
     * @ORM\Column(type="integer")
     */
    private int $creator_corporation_id;

    /**
     * @ORM\Column(type="integer")
     */
    private ?int $executor_corporation_id;

    /**
     * @ORM\Column(type="datetimetz_immutable")
     */
    private DateTimeImmutable $date_founded;

    /**
     * @ORM\Column(type="integer")
     */
    private ?int $faction_id;

    /**
     * @return string
     */
    public function getTicker(): string
    {
        return $this->ticker;
    }

    /**
     * @return int
     */
    public function getCreatorId(): int
    {
        return $this->creator_id;
    }

    /**
     * @return int
     */
    public function getCreatorCorporationId(): int
    {
        return $this->creator_corporation_id;
    }

    /**
     * @return int|null
     */
    public function getExecutorCorporationId(): ?int
    {
        return $this->executor_corporation_id;
    }

    /**
     * @return DateTimeImmutable
     */
    public function getDateFounded(): DateTimeImmutable
    {
        return $this->date_founded;
    }

    /**
     * @return int|null
     */
    public function getFactionId(): ?int
    {
        return $this->faction_id;
    }
}
