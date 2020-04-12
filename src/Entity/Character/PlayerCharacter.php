<?php
namespace Adam\Model\Entity\Character;

use DateTimeImmutable;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Character
 *
 * @package Adam\Model\Entity\Character
 * @author Danijel Fabijan <hipnaba@gmail.com>
 * @link https://github.com/hipnaba/adam-model
 *
 * @ORM\Entity(repositoryClass="\Adam\Model\Repository\Character\CharacterRepository")
 * @ORM\Table(name="character_player")
 */
class PlayerCharacter extends Character
{
    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private string $ownerHash;

    /**
     * @ORM\Column(type="datetime_immutable", nullable=true)
     */
    private ?DateTimeImmutable $lastSync;

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
}
