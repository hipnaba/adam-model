<?php
namespace Adam\Model\Entity\Item;

use Adam\Model\Traits\DescriptionTrait;
use Adam\Model\Traits\IdTrait;
use Adam\Model\Traits\NameTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Unit
 *
 * @package Adam\Model\Entity\Item
 * @author Danijel Fabijan <hipnaba@gmail.com>
 * @link https://github.com/hipnaba/adam-model
 *
 * @ORM\Entity()
 * @ORM\Table(name="item_unit")
 */
class Unit
{
    use IdTrait;
    use NameTrait;
    use DescriptionTrait;

    /**
     * @ORM\Column(type="string")
     */
    private string $displayName;

    /**
     * @return string
     */
    public function getDisplayName(): string
    {
        return $this->displayName;
    }
}
