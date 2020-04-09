<?php
namespace Adam\Model\Entity\Item;

use Adam\Model\Traits\DescriptionTrait;
use Adam\Model\Traits\IdTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Icon
 *
 * @package Adam\Model\Entity\Item
 * @author Danijel Fabijan <hipnaba@gmail.com>
 * @link https://github.com/hipnaba/adam-model
 *
 * @ORM\Entity(repositoryClass="\Adam\Model\Repository\Item\ItemIconRepository")
 * @ORM\Table(name="item_icon")
 */
class ItemIcon
{
    use IdTrait;
    use DescriptionTrait;

    /**
     * @ORM\Column(type="string")
     */
    private string $path;

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }
}
