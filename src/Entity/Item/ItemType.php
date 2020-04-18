<?php
namespace Adam\Model\Entity\Item;

use Adam\Model\Entity\Market\MarketGroup;
use Adam\Model\Entity\Market\MarketOrder;
use Adam\Model\Traits\DescriptionTrait;
use Adam\Model\Traits\IdTrait;
use Adam\Model\Traits\Item\ItemIconTrait;
use Adam\Model\Traits\NameTrait;
use Adam\Model\Traits\PublishedTrait;
use Adam\Model\Traits\SyncableTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Type
 *
 * @package Adam\Model\Entity\Item
 * @author Danijel Fabijan <hipnaba@gmail.com>
 * @link https://bitbucket.org/hipnaba/adam
 *
 * @ORM\Entity(repositoryClass="\Adam\Model\Repository\Item\ItemTypeRepository")
 * @ORM\Table(name="item_type")
 */
class ItemType
{
    private const ATTRIBUTE_COMPRESS_TO = 1940;
    private const ATTRIBUTE_COMPRESS_PORTION = 1941;
    private const ATTRIBUTE_ORE_TYPE = 2699;

    private const ORE_TYPE_MISSION = 0;
    private const ORE_TYPE_STANDARD = 1;
    private const ORE_TYPE_PLUS_5 = 2;
    private const ORE_TYPE_PLUS_10 = 3;
    private const ORE_TYPE_HIGH_QUALITY = 4;
    private const ORE_TYPE_JACKPOT_MOON = 5;

    use IdTrait;
    use NameTrait;
    use ItemIconTrait;
    use PublishedTrait;
    use DescriptionTrait;
    use SyncableTrait;

    /**
     * @ORM\OneToMany(targetEntity="\Adam\Model\Entity\Item\Item", mappedBy="type")
     * @ORM\OrderBy({"name" = "ASC"})
     */
    private Collection $items;

    /**
     * @ORM\ManyToOne(targetEntity="\Adam\Model\Entity\Item\ItemGroup", inversedBy="types")
     * @ORM\JoinColumn(name="group_id", referencedColumnName="id", nullable=true)
     */
    private ?ItemGroup $group;

    /**
     * @ORM\ManyToOne(targetEntity="\Adam\Model\Entity\Market\MarketGroup", inversedBy="types")
     * @ORM\JoinColumn(name="market_group_id", referencedColumnName="id", nullable=true)
     */
    private ?MarketGroup $market_group;

    /**
     * @ORM\OneToMany(targetEntity="\Adam\Model\Entity\Market\MarketOrder", mappedBy="type")
     * @var MarketOrder[]|Collection
     */
    private Collection $market_orders;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private ?float $base_price;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private ?float $capacity;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private ?float $mass;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private ?int $portion_size;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private ?float $volume;

    /**
     * @ORM\OneToMany(targetEntity="ItemTypeAttribute", mappedBy="type")
     * @var ItemTypeAttribute[]|Collection
     */
    private Collection $attributes;

    /**
     * ItemType constructor.
     */
    public function __construct()
    {
        $this->items = new ArrayCollection();
        $this->market_orders = new ArrayCollection();
        $this->attributes = new ArrayCollection();
    }

    /**
     * @return Item[]|Collection
     */
    public function getItems(): Collection
    {
        return $this->items;
    }

    /**
     * @return ItemGroup|null
     */
    public function getGroup(): ?ItemGroup
    {
        return $this->group;
    }

    /**
     * @return float|null
     */
    public function getCapacity(): ?float
    {
        return $this->capacity;
    }

    /**
     * @return float|null
     */
    public function getMass(): ?float
    {
        return $this->mass;
    }

    /**
     * @return int|null
     */
    public function getPortionSize(): ?int
    {
        return $this->portion_size;
    }

    /**
     * @return float|null
     */
    public function getVolume(): ?float
    {
        return $this->volume;
    }

    /**
     * @return MarketGroup|null
     */
    public function getMarketGroup(): ?MarketGroup
    {
        return $this->market_group;
    }

    /**
     * @return Collection
     */
    public function getMarketOrders(): Collection
    {
        return $this->market_orders;
    }

    /**
     * @return float|null
     */
    public function getLowestSellPrice(): ?float
    {
        /** @var float|null $lowest */
        $lowest = null;

        foreach ($this->market_orders as $market_order) {
            if ($market_order->isSellOrder()) {
                $lowest = min($lowest ?? PHP_INT_MAX, $market_order->getPrice());
            }
        }

        return $lowest ?: null;
    }

    /**
     * @return float|null
     */
    public function getLowestSellPricePerM3(): ?float
    {
        $price = $this->getLowestSellPrice();
        return $price ? $price * (1 / $this->volume) : null;
    }

    /**
     * @return float|null
     */
    public function getHighestBuyPrice(): ?float
    {
        /** @var float|null $highest */
        $highest = null;

        foreach ($this->market_orders as $market_order) {
            if ($market_order->isBuyOrder()) {
                $highest = max($highest, $market_order->getPrice());
            }
        }

        return $highest ?: null;
    }

    /**
     * @return float|null
     */
    public function getHighestBuyPricePerM3(): ?float
    {
        $price = $this->getHighestBuyPrice();
        return $price ? $price * (1 / $this->volume) : null;
    }

    /**
     * @return ItemTypeAttribute[]|Collection
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * @return bool
     */
    public function isCompressible(): bool
    {
        foreach ($this->attributes as $attribute) {
            if ($attribute->getAttribute()->getId() === self::ATTRIBUTE_COMPRESS_TO) {
                return true;
            }
        }

        return false;
    }

    /**
     * @return int|null
     */
    public function getCompressedTypeId(): ?int
    {
        foreach ($this->attributes as $attribute) {
            if ($attribute->getAttribute()->getId() === self::ATTRIBUTE_COMPRESS_TO) {
                return intval($attribute->getValue());
            }
        }

        return null;
    }

    /**
     * @return int|null
     */
    public function getCompressedPortionSize(): ?int
    {
        foreach ($this->attributes as $attribute) {
            if ($attribute->getAttribute()->getId() === self::ATTRIBUTE_COMPRESS_PORTION) {
                return intval($attribute->getValue());
            }
        }

        return null;
    }

    /**
     * @return bool
     */
    public function isMissionOre(): bool
    {
        foreach ($this->attributes as $attribute) {
            if ($attribute->getAttribute()->getId() === self::ATTRIBUTE_ORE_TYPE) {
                return $attribute->getValue() === self::ORE_TYPE_MISSION;
            }
        }

        return false;
    }
}
