<?php
namespace Adam\Model\Entity\Character;

use Adam\Model\Entity\Item\Item;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Faction
 *
 * @package Adam\Model\Entity\Character
 * @author Danijel Fabijan <hipnaba@gmail.com>
 * @link https://github.com/hipnaba/adam-model
 *
 * @ORM\Table(name="character_faction")
 */
final class Faction extends Item
{
    /**
     * @ORM\ManyToOne(targetEntity="CharacterRace")
     * @ORM\JoinColumn(name="race_id", referencedColumnName="id")
     */
    private CharacterRace $race;

    /**
     * @return CharacterRace
     */
    public function getRace(): CharacterRace
    {
        return $this->race;
    }
}
