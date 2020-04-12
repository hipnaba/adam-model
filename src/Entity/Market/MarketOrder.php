<?php
namespace Adam\Model\Entity\Market;

use Adam\Model\Entity\Item\Item;
use Adam\Model\Entity\Item\ItemType;
use Adam\Model\Traits\IdTrait;
use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class MarketOrder
 *
 * @package Adam\Model\Entity\Market
 * @author Danijel Fabijan <hipnaba@gmail.com>
 * @link https://github.com/hipnaba/adam-model
 *
 * @ORM\Entity()
 * @ORM\Table(name="market_order")
 */
abstract class MarketOrder
{
    use IdTrait;

    /**
     * @ORM\ManyToOne(targetEntity="\Adam\Model\Entity\Item\ItemType", inversedBy="market_orders")
     * @ORM\JoinColumn(name="type_id", referencedColumnName="id", nullable=false)
     */
    private ItemType $type;

    /**
     * @ORM\Column(type="boolean")
     */
    private bool $buy_order;

    /**
     * @ORM\Column(type="datetime")
     */
    private DateTime $issuedAt;

    /**
     * @ORM\Column(type="integer")
     */
    private int $duration;

    /**
     * @ORM\ManyToOne(targetEntity="\Adam\Model\Entity\Item\Item")
     * @ORM\JoinColumn(name="location_id", referencedColumnName="id", nullable=false)
     */
    private Item $location;

    /**
     * @ORM\Column(type="integer")
     */
    private int $min_volume;

    /**
     * @ORM\Column(type="integer")
     */
    private int $volume_remaining;

    /**
     * @ORM\Column(type="integer")
     */
    private int $volume_total;

    /**
     * @ORM\Column(type="float")
     */
    private float $price;

    /**
     * @ORM\Column(type="string")
     */
    private string $range;

    /**
     * @return ItemType
     */
    public function getType(): ItemType
    {
        return $this->type;
    }

    /**
     * @return bool
     */
    public function isBuyOrder(): bool
    {
        return $this->buy_order;
    }

    /**
     * @return DateTime
     */
    public function getIssuedAt(): DateTime
    {
        return $this->issuedAt;
    }

    /**
     * @return int
     */
    public function getDuration(): int
    {
        return $this->duration;
    }

    /**
     * @return Item
     */
    public function getLocation(): Item
    {
        return $this->location;
    }

    /**
     * @return int
     */
    public function getMinVolume(): int
    {
        return $this->min_volume;
    }

    /**
     * @return int
     */
    public function getVolumeRemaining(): int
    {
        return $this->volume_remaining;
    }

    /**
     * @return int
     */
    public function getVolumeTotal(): int
    {
        return $this->volume_total;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @return string
     */
    public function getRange(): string
    {
        return $this->range;
    }
}
