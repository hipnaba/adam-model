<?php
namespace Adam\Model\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;

/**
 * Trait PublishedTrait
 *
 * @package Adam\Model\Entity\Traits
 * @author Danijel Fabijan <hipnaba@gmail.com>
 * @link https://github.com/hipnaba/adam-model
 */
trait PublishedTrait
{
    /**
     * @ORM\Column(type="boolean")
     */
    private bool $published;

    /**
     * @return bool
     */
    public function isPublished(): bool
    {
        return $this->published;
    }
}
