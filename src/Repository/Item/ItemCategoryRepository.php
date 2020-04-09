<?php
namespace Adam\Model\Repository\Item;

use Doctrine\ORM\Query;
use Indigo\ORM\Repository\EntityRepository;

/**
 * Class ItemCategoryRepository
 *
 * @package Adam\Model\Repository\Item
 * @author Danijel Fabijan <hipnaba@gmail.com>
 * @link https://github.com/hipnaba/adam-model
 */
final class ItemCategoryRepository extends EntityRepository
{
    /**
     * @return int[]
     */
    public function findIdsWithoutGroups(): array
    {
        $qb = $this->createQueryBuilder('c');
        $qb->select('c.id')
            ->leftJoin('c.groups', 'g')
            ->groupBy('c.id')
            ->having($qb->expr()->eq('COUNT(g)', 0));

        $query = $qb->getQuery();
        $results = $query->getResult(Query::HYDRATE_ARRAY);

        return array_map(fn (array $row) => $row['id'], $results);
    }
}
