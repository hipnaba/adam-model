<?php
namespace Adam\Model\Entity\Item;

use Adam\Model\Traits\IdTrait;
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

    /**
     * @ORM\ManyToOne(targetEntity="\Adam\Model\Entity\Item\ItemType")
     * @ORM\JoinColumn(name="type_id", referencedColumnName="id")
     */
    private ItemType $type;

    /**
     * @return ItemType
     */
    public function getType(): ItemType
    {
        return $this->type;
    }
}
