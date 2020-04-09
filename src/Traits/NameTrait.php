<?php
namespace Adam\Model\Traits;

use Doctrine\ORM\Mapping as ORM;

/**
 * Trait NameTrait
 *
 * @package Adam\Model\Traits
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
