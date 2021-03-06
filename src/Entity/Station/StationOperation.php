<?php
namespace Adam\Model\Entity\Station;

use Adam\Model\Entity\Industry\IndustryActivity;
use Adam\Model\Entity\Item\ItemType;
use Adam\Model\Traits\DescriptionTrait;
use Adam\Model\Traits\IdTrait;
use Adam\Model\Traits\NameTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class StationOperation
 *
 * @package Adam\Model\Entity\Station
 * @author Danijel Fabijan <hipnaba@gmail.com>
 * @link https://github.com/hipnaba/adam-model
 *
 * @ORM\Entity()
 * @ORM\Table(name="station_operation")
 */
class StationOperation
{
    use IdTrait;
    use NameTrait;
    use DescriptionTrait;

    /**
     * @ORM\ManyToOne(targetEntity="\Adam\Model\Entity\Industry\IndustryActivity")
     * @ORM\JoinColumn(name="activity_id", referencedColumnName="id", nullable=false)
     */
    private IndustryActivity $activity;

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
     * @ORM\Column(type="integer", nullable=true)
     */
    private ?int $ratio;

    /**
     * @ORM\ManyToOne(targetEntity="\Adam\Model\Entity\Item\ItemType")
     * @ORM\JoinColumn(name="caldari_station_type_id", referencedColumnName="id", nullable=true)
     */
    private ?ItemType $caldari_station_type;

    /**
     * @ORM\ManyToOne(targetEntity="\Adam\Model\Entity\Item\ItemType")
     * @ORM\JoinColumn(name="minmatar_station_type_id", referencedColumnName="id", nullable=true)
     */
    private ?ItemType $minmatar_station_type;

    /**
     * @ORM\ManyToOne(targetEntity="\Adam\Model\Entity\Item\ItemType")
     * @ORM\JoinColumn(name="amarr_station_type_id", referencedColumnName="id", nullable=true)
     */
    private ?ItemType $amarr_station_type;

    /**
     * @ORM\ManyToOne(targetEntity="\Adam\Model\Entity\Item\ItemType")
     * @ORM\JoinColumn(name="gallente_station_type_id", referencedColumnName="id", nullable=true)
     */
    private ?ItemType $gallente_station_type;

    /**
     * @ORM\ManyToOne(targetEntity="\Adam\Model\Entity\Item\ItemType")
     * @ORM\JoinColumn(name="jove_station_type_id", referencedColumnName="id", nullable=true)
     */
    private ?ItemType $jove_station_type;

    /**
     * @ORM\ManyToMany(targetEntity="StationService")
     * @ORM\JoinTable(name="station_operation_service",
     *     joinColumns={@ORM\JoinColumn(name="operation_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="service_id", referencedColumnName="id")})
     * @var StationService[]|Collection
     */
    private Collection $services;

    /**
     * StationOperation constructor.
     */
    public function __construct()
    {
        $this->services = new ArrayCollection();
    }

    /**
     * @return IndustryActivity
     */
    public function getActivity(): IndustryActivity
    {
        return $this->activity;
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
    public function getRatio(): int
    {
        return $this->ratio;
    }

    /**
     * @return ItemType|null
     */
    public function getCaldariStationType(): ?ItemType
    {
        return $this->caldari_station_type;
    }

    /**
     * @return ItemType|null
     */
    public function getMinmatarStationType(): ?ItemType
    {
        return $this->minmatar_station_type;
    }

    /**
     * @return ItemType|null
     */
    public function getAmarrStationType(): ?ItemType
    {
        return $this->amarr_station_type;
    }

    /**
     * @return ItemType|null
     */
    public function getGallenteStationType(): ?ItemType
    {
        return $this->gallente_station_type;
    }

    /**
     * @return ItemType|null
     */
    public function getJoveStationType(): ?ItemType
    {
        return $this->jove_station_type;
    }

    /**
     * @return StationService[]|Collection
     */
    public function getServices(): Collection
    {
        return $this->services;
    }
}
