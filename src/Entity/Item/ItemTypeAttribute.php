<?php
namespace Adam\Model\Entity\Item;

use Adam\Model\Entity\Dogma\Attribute;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class ItemTypeAttribute
 *
 * @package Adam\Model\Entity\Item
 * @author Danijel Fabijan <hipnaba@gmail.com>
 * @link https://github.com/hipnaba/adam-model
 *
 * @ORM\Entity()
 * @ORM\Table(name="item_type_attribute")
 */
class ItemTypeAttribute
{
    /**
     * @ORM\Id()
     * @ORM\ManyToOne(targetEntity="ItemType", inversedBy="attributes")
     * @ORM\JoinColumn(name="type_id", referencedColumnName="id", nullable=false)
     */
    private ItemType $type;

    /**
     * @ORM\Id()
     * @ORM\ManyToOne(targetEntity="\Adam\Model\Entity\Dogma\Attribute")
     * @ORM\JoinColumn(name="attribute_id", referencedColumnName="id", nullable=false)
     */
    private Attribute $attribute;

    /**
     * @ORM\Column(type="float")
     */
    private float $value;

    /**
     * @return ItemType
     */
    public function getType(): ItemType
    {
        return $this->type;
    }

    /**
     * @return Attribute
     */
    public function getAttribute(): Attribute
    {
        return $this->attribute;
    }

    /**
     * @return float
     */
    public function getValue(): float
    {
        return $this->value;
    }
}
