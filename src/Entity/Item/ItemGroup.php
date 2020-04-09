<?php
namespace Adam\Model\Entity\Item;

use Adam\Model\Traits\IdTrait;
use Adam\Model\Traits\NameTrait;
use Adam\Model\Traits\PublishedTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Group
 *
 * @package Adam\Model\Entity\Item
 * @author Danijel Fabijan <hipnaba@gmail.com>
 * @link https://bitbucket.org/hipnaba/adam
 *
 * @ORM\Entity(repositoryClass="\Adam\Model\Repository\Item\ItemGroupRepository")
 * @ORM\Table(name="item_group")
 */
class ItemGroup
{
    use IdTrait;
    use NameTrait;
    use PublishedTrait;

    /**
     * @ORM\ManyToOne(targetEntity="\Adam\Model\Entity\Item\ItemCategory", inversedBy="groups")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     */
    private ItemCategory $category;

    /**
     * @ORM\OneToMany(targetEntity="\Adam\Model\Entity\Item\ItemType", mappedBy="group")
     * @ORM\OrderBy({"name" = "ASC"})
     */
    private Collection $types;

    /**
     * ItemGroup constructor.
     */
    public function __construct()
    {
        $this->types = new ArrayCollection();
    }

    /**
     * @return ItemCategory
     */
    public function getCategory(): ItemCategory
    {
        return $this->category;
    }

    /**
     * @return ItemType[]|Collection
     */
    public function getTypes(): Collection
    {
        return $this->types;
    }
}
