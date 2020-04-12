<?php
namespace Adam\Model\Entity\Station;

use Adam\Model\Entity\Celestial\System;
use Adam\Model\Entity\Item\Item;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Station
 *
 * @package Adam\Model\Entity\Station
 * @author Danijel Fabijan <hipnaba@gmail.com>
 * @link https://github.com/hipnaba/adam-model
 *
 * @ORM\Table(name="station_station")
 */
class Station extends Item
{
    /**
     * @ORM\ManyToOne(targetEntity="\Adam\Model\Entity\Celestial\System", inversedBy="stations")
     * @ORM\JoinColumn(name="solar_system_id", referencedColumnName="id")
     */
    private System $system;

    // TODO: owner
    // TODO: race

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
     * @ORM\Column(type="array")
     */
    private array $services;

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
     * @return array
     */
    public function getServices(): array
    {
        return $this->services;
    }
}
