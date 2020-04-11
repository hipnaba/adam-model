<?php
namespace Adam\Model\Entity\Agent;

use Adam\Model\Entity\Character\Character;
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
     * @return AgentType
     */
    public function getAgentType(): AgentType
    {
        return $this->agent_type;
    }
}
