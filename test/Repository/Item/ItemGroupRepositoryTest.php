<?php
namespace AdamTest\Model\Repository\Item;

use Adam\Model\Repository\Item\ItemGroupRepository;
use AdamTest\Model\TestCase;
use Doctrine\DBAL\DBALException;
use Doctrine\ORM\Tools\SchemaTool;
use Doctrine\ORM\Tools\ToolsException;

/**
 * Class ItemGroupRepositoryTest
 *
 * @package AdamTest\Model\Repository\Item
 * @author Danijel Fabijan <hipnaba@gmail.com>
 * @link https://github.com/hipnaba/adam-model
 */
final class ItemGroupRepositoryTest
{
    private function getRepository(): ItemGroupRepository
    {
        return $this->getContainer()->get(ItemGroupRepository::class);
    }

    /**
     * @throws DBALException
     */
    public function CanFindGroupsWithoutTypes()
    {
        $conn = $this->getEntityManager()->getConnection();
        $conn->insert('item_category', ['id' => 0, 'name' => '#system', 'published' => 1]);

        $fields = ['id', 'category_id', 'name', 'published'];
        $conn->insert('item_group', array_combine($fields, [1, 0, 'first', 1]));
        $conn->insert('item_group', array_combine($fields, [2, 0, 'second', 1]));
        $conn->insert('item_group', array_combine($fields, [3, 0, 'third', 1]));

        $fields = ['id', 'group_id', 'name', 'published'];
        $conn->insert('item_type', array_combine($fields, [1, 2, 'first', 1]));

        $ids = $this->getRepository()->findIdsWithoutTypes();
        $this->assertEquals([1, 3], $ids);
    }
}
