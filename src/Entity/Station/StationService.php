<?php
namespace Adam\Model\Entity\Station;

use Adam\Model\Traits\DescriptionTrait;
use Adam\Model\Traits\IdTrait;
use Adam\Model\Traits\NameTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class StationService
 *
 * @package Adam\Model\Entity\Station
 * @author Danijel Fabijan <hipnaba@gmail.com>
 * @link https://github.com/hipnaba/adam-model
 *
 * @ORM\Entity()
 * @ORM\Table(name="station_service")
 */
class StationService
{
    use IdTrait;
    use NameTrait;
    use DescriptionTrait;
}
