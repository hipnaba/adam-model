<?php
namespace AdamTest\Model;


use Adam\Model\ConfigProvider;
use Indigo\ORM\Service\EntityRepositoryAbstractServiceFactory;
use Laminas\ConfigAggregator\ArrayProvider;
use Laminas\ConfigAggregator\ConfigAggregator;
use Laminas\ServiceManager\ServiceManager;

$config = (new ConfigAggregator([
    \Indigo\ORM\ConfigProvider::class,
    ConfigProvider::class,
    new ArrayProvider([
        'dependencies' => [
            'abstract_factories' => [
                EntityRepositoryAbstractServiceFactory::class,
            ],
        ],
        'database' => [
            'driver' => 'pdo_sqlite',
            'path' => ':memory:',
        ],
        'orm' => [
            'dev_mode' => true,
        ],
    ]),
]))->getMergedConfig();

$config['dependencies']['services']['config'] = $config;
return new ServiceManager($config['dependencies']);
