<?php
namespace Adam\Model\Entity\Character;

use Adam\Model\Traits\IdTrait;
use Adam\Model\Traits\NameTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Character
 *
 * @package Adam\Model\Entity\Character
 * @author Danijel Fabijan <hipnaba@gmail.com>
 * @link https://github.com/hipnaba/adam-model
 *
 * @ORM\Entity()
 * @ORM\Table(name="character_character")
 */
class Character
{
    use IdTrait;
    use NameTrait;

    /**
     * @ORM\Column(type="string")
     */
    private string $ownerHash;

    /**
     * @return string
     */
    public function getOwnerHash(): string
    {
        return $this->ownerHash;
    }
}
