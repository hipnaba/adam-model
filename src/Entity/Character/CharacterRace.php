<?php
namespace Adam\Model\Entity\Character;

use Adam\Model\Traits\DescriptionTrait;
use Adam\Model\Traits\IdTrait;
use Adam\Model\Traits\Item\ItemIconTrait;
use Adam\Model\Traits\NameTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class CharacterRace
 *
 * @package Adam\Model\Entity\Character
 * @author Danijel Fabijan <hipnaba@gmail.com>
 * @link https://github.com/hipnaba/adam-model
 *
 * @ORM\Entity()
 * @ORM\Table(name="character_race")
 */
class CharacterRace
{
    use IdTrait;
    use NameTrait;
    use ItemIconTrait;
    use DescriptionTrait;

    /**
     * @ORM\Column(type="text")
     */
    private string $short_description;

    /**
     * @return string
     */
    public function getShortDescription(): string
    {
        return $this->short_description;
    }
}
