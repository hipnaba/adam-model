<?php
namespace Adam\Model\Entity\Dogma;

use Adam\Model\Traits\DescriptionTrait;
use Adam\Model\Traits\IdTrait;
use Adam\Model\Traits\NameTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class AttributeCategory
 *
 * @package Adam\Model\Entity\Dogma
 * @author Danijel Fabijan <hipnaba@gmail.com>
 * @link https://github.com/hipnaba/adam-model
 *
 * @ORM\Entity()
 * @ORM\Table(name="dogma_category")
 */
class AttributeCategory
{
    use IdTrait;
    use NameTrait;
    use DescriptionTrait;
}
