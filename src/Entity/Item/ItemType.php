<?php
namespace Adam\Model\Entity\Item;

use Adam\Model\Entity\Market\MarketGroup;
use Adam\Model\Traits\IdTrait;
use Adam\Model\Traits\Item\ItemIconTrait;
use Adam\Model\Traits\NameTrait;
use Adam\Model\Traits\PublishedTrait;
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
    use IdTrait;
    use NameTrait;
    use ItemIconTrait;
    use PublishedTrait;

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
    private ?MarketGroup $marketGroup;

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
     * ItemType constructor.
     */
    public function __construct()
    {
        $this->items = new ArrayCollection();
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
        return $this->marketGroup;
    }
}
