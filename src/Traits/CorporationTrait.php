<?php
namespace Adam\Model\Traits;

use Adam\Model\Entity\Item\Item;
use Doctrine\ORM\Mapping as ORM;

/**
 * Trait CorporationTrait
 *
 * @package Adam\Model\Traits
 * @author Danijel Fabijan <hipnaba@gmail.com>
 * @link https://github.com/hipnaba/adam-model
 */
trait CorporationTrait
{
    /**
     * @ORM\ManyToOne(targetEntity="\Adam\Model\Entity\Item\Item")
     * @ORM\JoinColumn(name="corporation_id", referencedColumnName="id", nullable=true)
     */
    private ?Item $corporation;

    /**
     * @return Item|null
     */
    public function getCorporation(): ?Item
    {
        return $this->corporation;
    }

    /**
     * @param Item $corporation
     */
    public function setCorporation(Item $corporation): void
    {
        $this->corporation = $corporation;
    }
}
