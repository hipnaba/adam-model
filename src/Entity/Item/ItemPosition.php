<?php
namespace Adam\Model\Entity\Item;

/**
 * Class Position
 *
 * @package Adam\Model\Entity\Item
 * @author Danijel Fabijan <hipnaba@gmail.com>
 * @link https://github.com/hipnaba/adam-model
 */
final class ItemPosition
{
    private float $x;
    private float $y;
    private float $z;

    /**
     * Position constructor.
     * @param float $x
     * @param float $y
     * @param float $z
     */
    public function __construct(float $x = 0, float $y = 0, float $z = 0)
    {
        $this->x = $x;
        $this->y = $y;
        $this->z = $z;
    }

    /**
     * @return float
     */
    public function getX(): float
    {
        return $this->x;
    }

    /**
     * @return float
     */
    public function getY(): float
    {
        return $this->y;
    }

    /**
     * @return float
     */
    public function getZ(): float
    {
        return $this->z;
    }
}
