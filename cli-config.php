<?php
namespace Adam\Model;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Psr\Container\ContainerInterface;

/** @var ContainerInterface $container */
$container = require __DIR__ . '/config/container.php';
$em = $container->get(EntityManagerInterface::class);

return ConsoleRunner::createHelperSet($em);
