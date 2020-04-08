<?php
namespace Adam\Model\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;

/**
 * Trait DescriptionTrait
 *
 * @package Adam\Model\Entity\Traits
 * @author Danijel Fabijan <hipnaba@gmail.com>
 * @link https://github.com/hipnaba/adam-model
 */
trait DescriptionTrait
{
    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private ?string $description;

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description ?? '';
    }
}
