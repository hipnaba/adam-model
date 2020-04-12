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
     * @ORM\Column(type="integer")
     */
    private int $age;

    /**
     * @ORM\Column(type="float")
     */
    private float $luminosity;

    /**
     * @ORM\Column(type="float")
     */
    private float $temperature;

    /**
     * @ORM\Column(type="string")
     */
    private string $spectral_class;

    /**
     * @return System
     */
    public function getSystem(): System
    {
        return $this->system;
    }

    /**
     * @return int
     */
    public function getAge(): int
    {
        return $this->age;
    }

    /**
     * @return float
     */
    public function getLuminosity(): float
    {
        return $this->luminosity;
    }

    /**
     * @return float
     */
    public function getTemperature(): float
    {
        return $this->temperature;
    }

    /**
     * @return string
     */
    public function getSpectralClass(): string
    {
        return $this->spectral_class;
    }
}
