<?php
namespace Adam\Model\Entity\Station;

use Adam\Model\Entity\Item\ItemPosition;
use Adam\Model\Traits\IdTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class StationType
 *
 * @package Adam\Model\Entity\Station
 * @author Danijel Fabijan <hipnaba@gmail.com>
 * @link https://github.com/hipnaba/adam-model
 *
 * @ORM\Entity()
 * @ORM\Table(name="station_type")
 */
class StationType
{
    use IdTrait;

    /**
     * @ORM\ManyToOne(targetEntity="StationOperation")
     * @ORM\JoinColumn(name="operation_id", referencedColumnName="id", nullable=true)
     */
    private ?StationOperation $operation;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private ?int $office_slots;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private ?float $reprocessing_efficiency;

    /**
     * @ORM\Column(type="boolean")
     */
    private bool $conquerable;

    /**
     * @ORM\Column(type="object")
     */
    private ItemPosition $dock_entry;

    /**
     * @ORM\Column(type="object")
     */
    private ItemPosition $dock_orientation;

    /**
     * StationType constructor.
     */
    public function __construct()
    {
        $this->dock_entry = new ItemPosition();
        $this->dock_orientation = new ItemPosition();
    }

    /**
     * @return StationOperation|null
     */
    public function getOperation(): ?StationOperation
    {
        return $this->operation;
    }

    /**
     * @return int|null
     */
    public function getOfficeSlots(): ?int
    {
        return $this->office_slots;
    }

    /**
     * @return float|null
     */
    public function getReprocessingEfficiency(): ?float
    {
        return $this->reprocessing_efficiency;
    }

    /**
     * @return bool
     */
    public function isConquerable(): bool
    {
        return $this->conquerable;
    }

    /**
     * @return ItemPosition
     */
    public function getDockEntry(): ItemPosition
    {
        return $this->dock_entry;
    }

    /**
     * @return ItemPosition
     */
    public function getDockOrientation(): ItemPosition
    {
        return $this->dock_orientation;
    }
}
