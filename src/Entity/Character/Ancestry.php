<?php
namespace Adam\Model\Entity\Character;

use Adam\Model\Traits\IdTrait;
use Adam\Model\Traits\Item\ItemIconTrait;
use Adam\Model\Traits\NameTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Ancestry
 *
 * @package Adam\Model\Entity\Character
 * @author Danijel Fabijan <hipnaba@gmail.com>
 * @link https://github.com/hipnaba/adam-model
 *
 * @ORM\Table(name="character_ancestry")
 */
class Ancestry
{
    use IdTrait;
    use NameTrait;
    use ItemIconTrait;

    /**
     * @ORM\ManyToOne(targetEntity="CharacterBloodline", inversedBy="ancestries")
     * @ORM\JoinColumn(name="bloodline_id", referencedColumnName="id")
     */
    private CharacterBloodline $bloodline;

    /**
     * @ORM\Column(type="text")
     */
    private ?string $short_description;

    /**
     * @return CharacterBloodline
     */
    public function getBloodline(): CharacterBloodline
    {
        return $this->bloodline;
    }

    /**
     * @return string|null
     */
    public function getShortDescription(): ?string
    {
        return $this->short_description;
    }
}
