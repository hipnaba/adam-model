<?php
namespace Adam\Model\Entity\Item;

use Adam\Model\Entity\Traits\IdTrait;
use Adam\Model\Entity\Traits\ItemIconTrait;
use Adam\Model\Entity\Traits\NameTrait;
use Adam\Model\Entity\Traits\PublishedTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Type
 *
 * @package Adam\Model\Entity\Item
 * @author Danijel Fabijan <hipnaba@gmail.com>
 * @link https://bitbucket.org/hipnaba/adam
 *
 * @ORM\Entity(repositoryClass="\Adam\Model\Repository\Item\ItemTypeRepository")
 * @ORM\Table(name="item_type")
 */
class ItemType
{
    use IdTrait;
    use NameTrait;
    use ItemIconTrait;
    use PublishedTrait;

    /**
     * @ORM\ManyToOne(targetEntity="\Adam\Model\Entity\Item\ItemGroup", inversedBy="types")
     * @ORM\JoinColumn(name="group_id", referencedColumnName="id", nullable=true)
     */
    private ?ItemGroup $group;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private ?float $capacity;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private ?float $mass;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private ?float $packaged_volume;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private ?int $portion_size;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private ?float $radius;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private ?float $volume;

    /**
     * @return ItemGroup|null
     */
    public function getGroup(): ?ItemGroup
    {
        return $this->group;
    }

    /**
     * @return float|null
     */
    public function getCapacity(): ?float
    {
        return $this->capacity;
    }

    /**
     * @return float|null
     */
    public function getMass(): ?float
    {
        return $this->mass;
    }

    /**
     * @return float|null
     */
    public function getPackagedVolume(): ?float
    {
        return $this->packaged_volume;
    }

    /**
     * @return int|null
     */
    public function getPortionSize(): ?int
    {
        return $this->portion_size;
    }

    /**
     * @return float|null
     */
    public function getRadius(): ?float
    {
        return $this->radius;
    }

    /**
     * @return float|null
     */
    public function getVolume(): ?float
    {
        return $this->volume;
    }
}
