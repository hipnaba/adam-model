<?php
namespace Adam\Model\Entity\Character;

use Adam\Model\Entity\Item\Item;
use Adam\Model\Traits\IdTrait;
use Adam\Model\Traits\NameTrait;
use DateTimeImmutable;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Character
 *
 * @package Adam\Model\Entity\Character
 * @author Danijel Fabijan <hipnaba@gmail.com>
 * @link https://github.com/hipnaba/adam-model
 *
 * @ORM\Table(name="character_character", )
 */
class Character
{
    use IdTrait;
    use NameTrait;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private string $ownerHash;

    /**
     * @ORM\Column(type="datetime_immutable", nullable=true)
     */
    private ?DateTimeImmutable $lastSync;

    /**
     * @ORM\ManyToOne(targetEntity="\Adam\Model\Entity\Item\Item")
     * @ORM\JoinColumn(name="location_id", referencedColumnName="id")
     */
    private ?Item $location;

    /**
     * @return string
     */
    public function getOwnerHash(): string
    {
        return $this->ownerHash;
    }

    /**
     * @return DateTimeImmutable|null
     */
    public function getLastSync(): ?DateTimeImmutable
    {
        return $this->lastSync;
    }

    /**
     * @param DateTimeImmutable $lastSync
     */
    public function setLastSync(DateTimeImmutable $lastSync): void
    {
        $this->lastSync = $lastSync;
    }

    /**
     * @return Item|null
     */
    public function getLocation(): ?Item
    {
        return $this->location;
    }

    /**
     * @param Item $location
     */
    public function setLocation(Item $location): void
    {
        $this->location = $location;
    }
}
