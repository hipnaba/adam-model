<?php
namespace Adam\Model\Entity\Celestial;


use Adam\Model\Entity\Traits\IdTrait;
use Adam\Model\Entity\Traits\NameTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Constellation
 *
 * @package Adam\Model\Entity\Celestial
 * @author Danijel Fabijan <hipnaba@gmail.com>
 * @link https://github.com/hipnaba/adam-model
 *
 * @ORM\Entity()
 * @ORM\Table(name="celestial_constellation")
 */
class Constellation extends CelestialObject
{
    use IdTrait;
    use NameTrait;
}
