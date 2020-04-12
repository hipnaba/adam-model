<?php
namespace Adam\Model\Entity\Industry;

use Adam\Model\Traits\DescriptionTrait;
use Adam\Model\Traits\IdTrait;
use Adam\Model\Traits\NameTrait;
use Adam\Model\Traits\PublishedTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Activity
 *
 * @package Adam\Model\Entity\Industry
 * @author Danijel Fabijan <hipnaba@gmail.com>
 * @link https://github.com/hipnaba/adam-model
 *
 * @ORM\Entity()
 * @ORM\Table(name="industry_activity")
 */
class IndustryActivity
{
    use IdTrait;
    use NameTrait;
    use DescriptionTrait;
    use PublishedTrait;
}
