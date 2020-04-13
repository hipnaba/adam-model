<?php
namespace Adam\Model;

use Doctrine\DBAL\Connection;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Container\ContainerInterface;

require 'vendor/autoload.php';
/** @var ContainerInterface $container */
$container = require __DIR__ . '/config/container.php';
/** @var EntityManagerInterface $em */
$em = $container->get(EntityManagerInterface::class);
$conn = $em->getConnection();

$qb = $conn->createQueryBuilder();
$query = $qb->select(['table_name', 'column_name', 'constraint_name', 'referenced_table_name', 'referenced_column_name'])
    ->distinct()
    ->from('INFORMATION_SCHEMA.key_column_usage')
    ->where($qb->expr()->isNotNull('referenced_table_name'))
    ->andWhere($qb->expr()->isNotNull('referenced_column_name'))
    //->andWhere("referenced_table_name IN('item', 'celestial', 'celestial_stargate')")
    ->andWhere("constraint_schema = 'adam_model'")
;

$constraints = $query->execute()->fetchAll();
$drops = [];
$changeColumns = [];
$changeReferencedColumns = [];
$adds = [];

foreach ($constraints as $constraint) {
    $drops[] = sprintf('ALTER TABLE `%s` DROP FOREIGN KEY `%s`', $constraint['table_name'], $constraint['constraint_name']);
    $changeColumns[] = sprintf('ALTER TABLE `%s` CHANGE `%s` `%s` BIGINT UNSIGNED', $constraint['table_name'], $constraint['column_name'], $constraint['column_name']);
    $changeReferencedColumns[] = sprintf('ALTER TABLE `%s` CHANGE `%s` `%s` BIGINT UNSIGNED', $constraint['referenced_table_name'], $constraint['referenced_column_name'], $constraint['referenced_column_name']);
    $adds[$constraint['constraint_name']] = sprintf(
        'ALTER TABLE `%s` ADD CONSTRAINT `%s` FOREIGN KEY(`%s`) REFERENCES `%s` (`%s`)',
        $constraint['table_name'], $constraint['constraint_name'], $constraint['column_name'],
        $constraint['referenced_table_name'], $constraint['referenced_column_name']
    );
}

$conn->transactional(function (Connection $conn) use ($drops, $changeColumns, $changeReferencedColumns, $adds) {
    foreach ($drops as $drop) {
        $conn->exec($drop);
    }
    foreach ($changeColumns as $changeColumn) {
        $conn->exec($changeColumn);
    }
    foreach ($changeReferencedColumns as $changeReferencedColumn) {
        $conn->exec($changeReferencedColumn);
    }
    foreach ($adds as $add) {
        $conn->exec($add);
    }
});
