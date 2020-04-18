<?php
namespace Adam\Model\Entity\Dogma;

use Adam\Model\Entity\Item\Unit;
use Adam\Model\Traits\DescriptionTrait;
use Adam\Model\Traits\IdTrait;
use Adam\Model\Traits\Item\ItemIconTrait;
use Adam\Model\Traits\NameTrait;
use Adam\Model\Traits\PublishedTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Attribute
 *
 * @package Adam\Model\Entity\Dogma
 * @author Danijel Fabijan <hipnaba@gmail.com>
 * @link https://github.com/hipnaba/adam-model
 *
 * @ORM\Entity()
 * @ORM\Table(name="dogma_attribute")
 */
class Attribute
{
    use IdTrait;
    use NameTrait;
    use DescriptionTrait;
    use ItemIconTrait;
    use PublishedTrait;

    /**
     * @ORM\Column(type="float")
     */
    private float $default_value;

    /**
     * @ORM\Column(type="string")
     */
    private string $display_name;

    /**
     * @ORM\ManyToOne(targetEntity="\Adam\Model\Entity\Item\Unit")
     * @ORM\JoinColumn(name="unit_id", referencedColumnName="id", nullable=true)
     */
    private ?Unit $unit;

    /**
     * @ORM\Column(type="boolean")
     */
    private bool $stackable;

    /**
     * @ORM\Column(type="boolean")
     */
    private bool $high_is_good;

    /**
     * @ORM\ManyToOne(targetEntity="AttributeCategory", inversedBy="attributes")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id", nullable=false)
     */
    private AttributeCategory $category;

    /**
     * @return float
     */
    public function getDefaultValue(): float
    {
        return $this->default_value;
    }

    /**
     * @return string
     */
    public function getDisplayName(): string
    {
        return $this->display_name;
    }

    /**
     * @return Unit|null
     */
    public function getUnit(): ?Unit
    {
        return $this->unit;
    }

    /**
     * @return bool
     */
    public function isStackable(): bool
    {
        return $this->stackable;
    }

    /**
     * @return bool
     */
    public function isHighGood(): bool
    {
        return $this->high_is_good;
    }

    /**
     * @return AttributeCategory
     */
    public function getCategory(): AttributeCategory
    {
        return $this->category;
    }
}
