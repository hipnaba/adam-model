<?php
namespace Adam\Model\Entity\Corporation;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class CorporationInvestor
 *
 * @package Adam\Model\Entity\Corporation
 * @author Danijel Fabijan <hipnaba@gmail.com>
 * @link https://github.com/hipnaba/adam-model
 *
 * @ORM\Entity()
 * @ORM\Table(name="corporation_investor")
 */
class CorporationInvestor
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\ManyToOne(targetEntity="Corporation", inversedBy="investors")
     * @ORM\JoinColumn(name="corporation_id", referencedColumnName="id", nullable=false)
     */
    private Corporation $corporation;

    /**
     * @ORM\ManyToOne(targetEntity="Corporation", inversedBy="investments")
     * @ORM\JoinColumn(name="investor_id", referencedColumnName="id", nullable=false)
     */
    private Corporation $investor;

    /**
     * @ORM\Column(type="integer")
     */
    private int $shares;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return Corporation
     */
    public function getCorporation(): Corporation
    {
        return $this->corporation;
    }

    /**
     * @return Corporation
     */
    public function getInvestor(): Corporation
    {
        return $this->investor;
    }

    /**
     * @return int
     */
    public function getShares(): int
    {
        return $this->shares;
    }
}
