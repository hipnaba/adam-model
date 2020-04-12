<?php
namespace Adam\Model\Entity\Station;

use Adam\Model\Entity\Celestial\System;
use Adam\Model\Entity\Corporation\Corporation;
use Adam\Model\Entity\Item\Item;
use Adam\Model\Entity\Item\ItemPosition;
use Doctrine\ORM\Mapping as ORM;
use phpDocumentor\Reflection\Types\Collection;

/**
 * Class Station
 *
 * @package Adam\Model\Entity\Station
 * @author Danijel Fabijan <hipnaba@gmail.com>
 * @link https://github.com/hipnaba/adam-model
 *
 * @ORM\Entity()
 * @ORM\Table(name="station")
 */
class Station extends Item
{
    /**
     * @ORM\ManyToOne(targetEntity="\Adam\Model\Entity\Celestial\System", inversedBy="stations")
     * @ORM\JoinColumn(name="solar_system_id", referencedColumnName="id")
     */
    private System $system;

    /**
     * @ORM\ManyToOne(targetEntity="StationOperation")
     * @ORM\JoinColumn(name="operation_id", referencedColumnName="id", nullable=false)
     */
    private StationOperation $operation;

    /**
     * @ORM\ManyToOne(targetEntity="StationType")
     * @ORM\JoinColumn(name="station_type_id", referencedColumnName="id", nullable=false)
     */
    private StationType $station_type;

    /**
     * @ORM\ManyToOne(targetEntity="\Adam\Model\Entity\Corporation\Corporation")
     * @ORM\JoinColumn(name="owner_id", referencedColumnName="id", nullable=false)
     */
    private Corporation $owner;

    /**
     * @ORM\Column(type="object")
     */
    private ItemPosition $position;

    /**
     * @ORM\Column(type="float")
     */
    private float $security;

    /**
     * @ORM\Column(type="boolean")
     */
    private bool $docking_cost_per_volume;

    /**
     * @ORM\Column(type="float")
     */
    private float $max_dockable_ship_volume;

    /**
     * @ORM\Column(type="float")
     */
    private float $office_rental_cost;

    /**
     * @ORM\Column(type="float")
     */
    private float $reprocessing_efficiency;

    /**
     * @ORM\Column(type="float")
     */
    private float $reprocessing_stations_take;

    /**
     * @ORM\Column(type="integer")
     */
    private int $reprocessing_hangar_flag;

    /**
     * Station constructor.
     */
    public function __construct()
    {
        $this->position = new ItemPosition();
    }

    /**
     * @return System
     */
    public function getSystem(): System
    {
        return $this->system;
    }

    /**
     * @return float
     */
    public function getMaxDockableShipVolume(): float
    {
        return $this->max_dockable_ship_volume;
    }

    /**
     * @return float
     */
    public function getOfficeRentalCost(): float
    {
        return $this->office_rental_cost;
    }

    /**
     * @return float
     */
    public function getReprocessingEfficiency(): float
    {
        return $this->reprocessing_efficiency;
    }

    /**
     * @return float
     */
    public function getReprocessingStationsTake(): float
    {
        return $this->reprocessing_stations_take;
    }

    /**
     * @return StationOperation
     */
    public function getOperation(): StationOperation
    {
        return $this->operation;
    }

    /**
     * @return StationType
     */
    public function getStationType(): StationType
    {
        return $this->station_type;
    }

    /**
     * @return Corporation
     */
    public function getOwner(): Corporation
    {
        return $this->owner;
    }

    /**
     * @return ItemPosition
     */
    public function getPosition(): ItemPosition
    {
        return $this->position;
    }

    /**
     * @return float
     */
    public function getSecurity(): float
    {
        return $this->security;
    }

    /**
     * @return bool
     */
    public function isDockingCostPerVolume(): bool
    {
        return $this->docking_cost_per_volume;
    }

    /**
     * @return int
     */
    public function getReprocessingHangarFlag(): int
    {
        return $this->reprocessing_hangar_flag;
    }

    /**
     * @return StationService[]|Collection
     */
    public function getServices(): Collection
    {
        return $this->operation->getServices();
    }
}
