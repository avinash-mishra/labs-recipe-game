<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Tnt\Controller\DefaultController;
use Tnt\Entity\SiteFactory;

$app = new Silex\Application();

// setting up services
$app->register(new Silex\Provider\ServiceControllerServiceProvider());

// setting up connections
$dbConnections = include __DIR__ . '/../config/database.php';

$environment = isset($environment) ? $environment : 'dev';
$environment = isset($_ENV['env']) ? $_ENV['env'] : $environment;
$connectionName = isset($dbConnections[$environment])? $environment: 'default';
$dbConnection = $dbConnections[$connectionName];

// Doctrine DBAL
$app->register(new Silex\Provider\DoctrineServiceProvider, [
    'dbs.options' => ['default' => $dbConnection],
]);

/** @var \Doctrine\DBAL\Connection $connection */
$connection = $app['db'];

// add new types for Doctrine DBAL
$connection->getDatabasePlatform()->registerDoctrineTypeMapping('enum', 'string');
$connection->getDatabasePlatform()->registerDoctrineTypeMapping('set', 'string');

// set which tables should be managed by Doctrine (ORM mappings)
$connection->getConfiguration()->setFilterSchemaAssetsExpression("/^(questions|answers)$/");

// Doctrine ORM
$app->register(new Dflydev\Silex\Provider\DoctrineOrm\DoctrineOrmServiceProvider, [
    'orm.proxies_dir' => realpath(__DIR__.'/../var/cache/doctrine/proxies'),
    'orm.em.options' => [
        'mappings' => [
            [
                'type'      => 'annotation',
                'namespace' => 'Tnt\Entity',
                'path'      => realpath(__DIR__.'/../src/Tnt/Entity'),
                'use_simple_annotation_reader' => false,
            ],
        ],
        //'connection' => 'default',
    ],
]);

// Application services
$app[DefaultController::class] = $app->share(function () use ($app) {
    return new DefaultController($app);
});
$app[SiteFactory::class] = $app->share(function () use ($app) {
    return new SiteFactory();
});

// setting up controllers
$app->mount('/', $app[DefaultController::class]);

return $app;
