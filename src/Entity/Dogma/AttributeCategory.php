<?php
namespace Adam\Model\Entity\Dogma;

use Adam\Model\Traits\DescriptionTrait;
use Adam\Model\Traits\IdTrait;
use Adam\Model\Traits\NameTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class AttributeCategory
 *
 * @package Adam\Model\Entity\Dogma
 * @author Danijel Fabijan <hipnaba@gmail.com>
 * @link https://github.com/hipnaba/adam-model
 *
 * @ORM\Entity()
 * @ORM\Table(name="dogma_category")
 */
class AttributeCategory
{
    use IdTrait;
    use NameTrait;
    use DescriptionTrait;

    /**
     * @ORM\OneToMany(targetEntity="Attribute", mappedBy="category")
     */
    private Collection $attributes;

    /**
     * AttributeCategory constructor.
     */
    public function __construct()
    {
        $this->attributes = new ArrayCollection();
    }

    /**
     * @return ArrayCollection|Collection
     */
    public function getAttributes()
    {
        return $this->attributes;
    }
}
