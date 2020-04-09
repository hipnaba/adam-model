<?php
namespace Adam\Model\Entity\Item;

use Adam\Model\Traits\IdTrait;
use Adam\Model\Traits\NameTrait;
use Adam\Model\Traits\PublishedTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Category
 *
 * @package Adam\Model\Entity\Item
 * @author Danijel Fabijan <hipnaba@gmail.com>
 * @link https://bitbucket.org/hipnaba/adam
 *
 * @ORM\Entity(repositoryClass="\Adam\Model\Repository\Item\ItemCategoryRepository")
 * @ORM\Table(name="item_category")
 */
class ItemCategory
{
    use IdTrait;
    use NameTrait;
    use PublishedTrait;

    /**
     * @ORM\OneToMany(targetEntity="\Adam\Model\Entity\Item\ItemGroup", mappedBy="category")
     * @ORM\OrderBy({"name" = "ASC"})
     */
    private Collection $groups;

    /**
     * Category constructor.
     */
    public function __construct()
    {
        $this->groups = new ArrayCollection();
    }

    /**
     * @return ItemGroup[]|Collection
     */
    public function getGroups(): Collection
    {
        return $this->groups;
    }
}
