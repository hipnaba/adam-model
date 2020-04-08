<?php
namespace Adam\Model;

use Laminas\ConfigAggregator\ArrayProvider;
use Laminas\ConfigAggregator\ConfigAggregator;
use Laminas\ServiceManager\ServiceManager;

$config = (new ConfigAggregator([
    \Indigo\ORM\ConfigProvider::class,
    ConfigProvider::class,
    new ArrayProvider([
        'database' => [
            'user' => 'root',
            'password' => 'password',
            'dbname' => 'adam_model',
            'driver' => 'pdo_mysql',
            'charset' => 'utf8mb4',
        ],
    ]),
]))->getMergedConfig();

$config['dependencies']['services']['config'] = $config;
return new ServiceManager($config['dependencies']);
