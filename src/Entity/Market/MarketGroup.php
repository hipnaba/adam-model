<?php
namespace Adam\Model\Entity\Market;

use Adam\Model\Entity\Item\ItemType;
use Adam\Model\Traits\DescriptionTrait;
use Adam\Model\Traits\IdTrait;
use Adam\Model\Traits\Item\ItemIconTrait;
use Adam\Model\Traits\NameTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class MarketGroup
 *
 * @package Adam\Model\Entity\Market
 * @author Danijel Fabijan <hipnaba@gmail.com>
 * @link https://github.com/hipnaba/adam-model
 *
 * @ORM\Entity()
 * @ORM\Table(name="market_group")
 */
class MarketGroup
{
    use IdTrait;
    use NameTrait;
    use DescriptionTrait;
    use ItemIconTrait;

    /**
     * @ORM\ManyToOne(targetEntity="\Adam\Model\Entity\Market\MarketGroup", inversedBy="children")
     * @ORM\JoinColumn(name="parent_id", referencedColumnName="id", nullable=true)
     */
    private ?MarketGroup $parent;

    /**
     * @ORM\OneToMany(targetEntity="\Adam\Model\Entity\Market\MarketGroup", mappedBy="parent")
     */
    private Collection $children;

    /**
     * @ORM\Column(type="boolean")
     */
    private bool $has_types;

    /**
     * @ORM\OneToMany(targetEntity="\Adam\Model\Entity\Item\ItemType", mappedBy="marketGroup")
     */
    private Collection $types;

    /**
     * MarketGroup constructor.
     */
    public function __construct()
    {
        $this->children = new ArrayCollection();
        $this->types = new ArrayCollection();
    }

    /**
     * @return MarketGroup|null
     */
    public function getParent(): ?MarketGroup
    {
        return $this->parent;
    }

    /**
     * @return MarketGroup[]|Collection
     */
    public function getChildren(): Collection
    {
        return $this->children;
    }

    /**
     * @return bool
     */
    public function isHasTypes(): bool
    {
        return $this->has_types;
    }

    /**
     * @return ItemType[]|Collection
     */
    public function getTypes(): Collection
    {
        return $this->types;
    }
}
