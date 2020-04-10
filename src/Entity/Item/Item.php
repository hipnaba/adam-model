<?php
namespace Adam\Model\Entity\Item;

use Adam\Model\Traits\DescriptionTrait;
use Adam\Model\Traits\IdTrait;
use Adam\Model\Traits\NameTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Item
 *
 * @package Adam\Model\Entity\Item
 * @author Danijel Fabijan <hipnaba@gmail.com>
 * @link https://github.com/hipnaba/adam-model
 *
 * @ORM\Entity()
 * @ORM\Table(name="item")
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="class", type="string")
 */
abstract class Item
{
    use IdTrait;
    use NameTrait;
    use DescriptionTrait;

    /**
     * @ORM\ManyToOne(targetEntity="\Adam\Model\Entity\Item\ItemType", inversedBy="items")
     * @ORM\JoinColumn(name="type_id", referencedColumnName="id")
     */
    protected ItemType $type;

    /**
     * @ORM\Column(type="object", nullable=true)
     */
    protected ?ItemPosition $position;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    protected ?float $radius;

    /**
     * Item constructor.
     */
    public function __construct()
    {
        $this->position = new ItemPosition();
    }

    /**
     * @return ItemType
     */
    public function getType(): ItemType
    {
        return $this->type;
    }

    /**
     * @return float|null
     */
    public function getRadius(): ?float
    {
        return $this->radius;
    }
}
