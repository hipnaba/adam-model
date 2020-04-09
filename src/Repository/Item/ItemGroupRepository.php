<?php
namespace Adam\Model\Repository\Item;

use Doctrine\ORM\Query;
use Indigo\ORM\Repository\EntityRepository;

/**
 * Class ItemGroupRepository
 *
 * @package Adam\Model\Repository\Item
 * @author Danijel Fabijan <hipnaba@gmail.com>
 * @link https://github.com/hipnaba/adam-model
 */
final class ItemGroupRepository extends EntityRepository
{
    /**
     * @return int[]
     */
    public function findIdsWithoutTypes(): array
    {
        $qb = $this->createQueryBuilder('g');
        $qb->select('g.id')
            ->leftJoin('g.types', 't')
            ->groupBy('g.id')
            ->having($qb->expr()->eq('COUNT(t)', 0));

        $query = $qb->getQuery();
        $results = $query->getResult(Query::HYDRATE_ARRAY);

        return array_map(fn (array $row) => $row['id'], $results);
    }
}
