<?php
namespace Adam\Model\Entity\Corporation;

use Adam\Model\Traits\DescriptionTrait;
use Adam\Model\Traits\IdTrait;
use Adam\Model\Traits\NameTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class CorporationDivision
 *
 * @package Adam\Model\Entity\Corporation
 * @author Danijel Fabijan <hipnaba@gmail.com>
 * @link https://github.com/hipnaba/adam-model
 *
 * @ORM\Entity()
 * @ORM\Table(name="corporation_division")
 */
class CorporationDivision
{
    use IdTrait;
    use NameTrait;
    use DescriptionTrait;

    /**
     * @ORM\Column(type="string")
     */
    private string $leaderType;

    /**
     * @return string
     */
    public function getLeaderType(): string
    {
        return $this->leaderType;
    }
}
