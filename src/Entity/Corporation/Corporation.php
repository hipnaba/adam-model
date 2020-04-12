<?php
namespace Adam\Model\Entity\Corporation;

use Adam\Model\Entity\Celestial\System;
use Adam\Model\Entity\Character\CharacterFaction;
use Adam\Model\Entity\Item\Item;
use Adam\Model\Traits\Item\ItemIconTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Corporation
 *
 * @package Adam\Model\Entity\Corporation
 * @author Danijel Fabijan <hipnaba@gmail.com>
 * @link https://github.com/hipnaba/adam-model
 *
 * @ORM\Entity()
 * @ORM\Table(name="corporation")
 */
class Corporation extends Item
{
    use ItemIconTrait;

    /**
     * @ORM\ManyToOne(targetEntity="\Adam\Model\Entity\Celestial\System")
     * @ORM\JoinColumn(name="system_id", referencedColumnName="id", nullable=true)
     */
    private ?System $system;

    /**
     * @ORM\ManyToOne(targetEntity="Corporation")
     * @ORM\JoinColumn(name="friend_id", referencedColumnName="id", nullable=true)
     */
    private ?Corporation $friend;

    /**
     * @ORM\ManyToOne(targetEntity="Corporation")
     * @ORM\JoinColumn(name="enemy_id", referencedColumnName="id", nullable=true)
     */
    private ?Corporation $enemy;

    /**
     * @ORM\ManyToOne(targetEntity="\Adam\Model\Entity\Character\CharacterFaction")
     * @ORM\JoinColumn(name="faction_id", referencedColumnName="id", nullable=true)
     */
    private ?CharacterFaction $faction;

    /**
     * @ORM\Column(type="string")
     */
    private string $size;

    /**
     * @ORM\Column(type="string")
     */
    private string $extent;

    /**
     * @ORM\OneToMany(targetEntity="CorporationInvestor", mappedBy="corporation")
     * @var CorporationInvestor[]|Collection
     */
    private Collection $investors;

    /**
     * @ORM\OneToMany(targetEntity="CorporationInvestor", mappedBy="investor")
     * @var CorporationInvestor[]|Collection
     */
    private Collection $investments;

    /**
     * @ORM\Column(type="integer")
     */
    private int $public_shares;

    /**
     * @ORM\Column(type="float")
     */
    private float $initial_price;

    /**
     * @ORM\Column(type="float")
     */
    private float $min_security;

    /**
     * @ORM\Column(type="boolean")
     */
    private bool $scattered;

    /**
     * @ORM\Column(type="integer")
     */
    private int $fringe;

    /**
     * @ORM\Column(type="integer")
     */
    private int $corridor;

    /**
     * @ORM\Column(type="integer")
     */
    private int $hub;

    /**
     * @ORM\Column(type="integer")
     */
    private int $border;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private ?float $size_factor;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private ?int $station_count;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private ?int $station_system_count;

    /**
     * Corporation constructor.
     */
    public function __construct()
    {
        $this->investors = new ArrayCollection();
        $this->investments = new ArrayCollection();
    }

    /**
     * @return System|null
     */
    public function getSystem(): ?System
    {
        return $this->system;
    }

    /**
     * @return Corporation|null
     */
    public function getFriend(): ?Corporation
    {
        return $this->friend;
    }

    /**
     * @return Corporation|null
     */
    public function getEnemy(): ?Corporation
    {
        return $this->enemy;
    }

    /**
     * @return CharacterFaction|null
     */
    public function getFaction(): ?CharacterFaction
    {
        return $this->faction;
    }

    /**
     * @return string
     */
    public function getSize(): string
    {
        return $this->size;
    }

    /**
     * @return string
     */
    public function getExtent(): string
    {
        return $this->extent;
    }

    /**
     * @return CorporationInvestor[]|Collection
     */
    public function getInvestors()
    {
        return $this->investors;
    }

    /**
     * @return CorporationInvestor[]|Collection
     */
    public function getInvestments()
    {
        return $this->investments;
    }

    /**
     * @return int
     */
    public function getPublicShares(): int
    {
        return $this->public_shares;
    }

    /**
     * @return float
     */
    public function getInitialPrice(): float
    {
        return $this->initial_price;
    }

    /**
     * @return float
     */
    public function getMinSecurity(): float
    {
        return $this->min_security;
    }

    /**
     * @return bool
     */
    public function isScattered(): bool
    {
        return $this->scattered;
    }

    /**
     * @return int
     */
    public function getFringe(): int
    {
        return $this->fringe;
    }

    /**
     * @return int
     */
    public function getCorridor(): int
    {
        return $this->corridor;
    }

    /**
     * @return int
     */
    public function getHub(): int
    {
        return $this->hub;
    }

    /**
     * @return int
     */
    public function getBorder(): int
    {
        return $this->border;
    }

    /**
     * @return float|null
     */
    public function getSizeFactor(): ?float
    {
        return $this->size_factor;
    }

    /**
     * @return int|null
     */
    public function getStationCount(): ?int
    {
        return $this->station_count;
    }

    /**
     * @return int|null
     */
    public function getStationSystemCount(): ?int
    {
        return $this->station_system_count;
    }
}
