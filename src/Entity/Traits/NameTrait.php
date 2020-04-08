<?php
namespace Adam\Model\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;

/**
 * Trait NameTrait
 *
 * @package Adam\Model\Entity\Traits
 * @author Danijel Fabijan <hipnaba@gmail.com>
 * @link https://github.com/hipnaba/adam-model
 */
trait NameTrait
{
    /**
     * @ORM\Column(type="string")
     */
    private string $name;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}
