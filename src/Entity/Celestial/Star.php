<?php
namespace Adam\Model\Entity\Celestial;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Star
 *
 * @package Adam\Model\Entity\Celestial
 * @author Danijel Fabijan <hipnaba@gmail.com>
 * @link https://github.com/hipnaba/adam-model
 *
 * @ORM\Entity()
 * @ORM\Table(name="celestial_star")
 */
class Star extends Celestial
{
    /**
     * @ORM\OneToOne(targetEntity="\Adam\Model\Entity\Celestial\System", mappedBy="star")
     */
    private System $system;

    /**
     * @return System
     */
    public function getSystem(): System
    {
        return $this->system;
    }
}
