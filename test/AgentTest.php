<?php
namespace AdamTest\Model;

use Adam\Model\Entity\Agent\Agent;
use Adam\Model\Entity\Agent\AgentType;
use Adam\Model\Entity\Character\Character;
use Adam\Model\Entity\Item\Item;

final class AgentTest extends TestCase
{
    /**
     * @throws \Doctrine\DBAL\DBALException
     */
    public function testCanGetAgent()
    {
        $em = $this->getEntityManager();
        $conn = $em->getConnection();

        $conn->insert('item', [
            'id' => 3008416,
            'type_id' => 1376,
            'type' => 'agent',
            'name' => 'Antaken Kamola',
        ]);

        $conn->insert('character_bloodline', [
            'id' => 1,
            'race_id' => 1,
            'corporation_id' => 1000006,
            'ship_type_id' => 601,
            'male_description' => '',
            'female_description' => '',
            'short_description' => '',
            'short_male_description' => '',
            'short_female_description' => '',
            'charisma' => 12,
            'intelligence' => 10,
            'memory' => 14,
            'willpower' => 15,
            'perception' => 18,
            'name' => 'Deteis',
        ]);

        $conn->insert('character', [
            'id' => 3008416,
            'ancestry_id' => 11,
            'bloodline_id' => 1,
            'corporation_id' => 1000002,
            'birthday' => '2003-05-04 00:32:00',
            'gender' => 'female',
            'security_status' => 0,
        ]);

        $conn->insert('agent_type', [
            'id' => 2,
            'name' => 'BasicAgent',
        ]);

        $conn->insert('agent', [
            'id' => 3008416,
            'agent_type_id' => 2,
        ]);

        /** @var Agent $agent */
        $agent = $em->find(Item::class, 3008416);

        $this->assertInstanceOf(Agent::class, $agent);
        $this->assertInstanceOf(AgentType::class, $agent->getAgentType());
        $this->assertEquals('BasicAgent', $agent->getAgentType()->getName());

        $this->assertInstanceOf(Character::class, $agent);
        $this->assertEquals(15, $agent->getBloodline()->getWillpower());
    }
}
