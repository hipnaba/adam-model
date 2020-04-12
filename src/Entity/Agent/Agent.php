<?php
namespace Adam\Model\Entity\Agent;

use Adam\Model\Entity\Character\Character;
use Adam\Model\Entity\Corporation\CorporationDivision;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Agent
 *
 * @package Adam\Model\Entity\Agent
 * @author Danijel Fabijan <hipnaba@gmail.com>
 * @link https://github.com/hipnaba/adam-model
 *
 * @ORM\Entity()
 * @ORM\Table(name="agent")
 */
class Agent extends Character
{
    /**
     * @ORM\ManyToOne(targetEntity="\Adam\Model\Entity\Agent\AgentType")
     * @ORM\JoinColumn(name="agent_type_id", referencedColumnName="id")
     */
    private AgentType $agent_type;

    /**
     * @ORM\ManyToOne(targetEntity="\Adam\Model\Entity\Corporation\CorporationDivision")
     * @ORM\JoinColumn(name="division_id", referencedColumnName="id")
     */
    private CorporationDivision $division;

    /**
     * @ORM\Column(type="integer")
     */
    private int $level;

    /**
     * @ORM\Column(type="integer")
     */
    private int $quality;

    /**
     * @ORM\Column(type="boolean")
     */
    private bool $locator;

    /**
     * @return AgentType
     */
    public function getAgentType(): AgentType
    {
        return $this->agent_type;
    }

    /**
     * @return CorporationDivision
     */
    public function getDivision(): CorporationDivision
    {
        return $this->division;
    }

    /**
     * @return int
     */
    public function getLevel(): int
    {
        return $this->level;
    }

    /**
     * @return int
     */
    public function getQuality(): int
    {
        return $this->quality;
    }

    /**
     * @return bool
     */
    public function isLocator(): bool
    {
        return $this->locator;
    }
}
