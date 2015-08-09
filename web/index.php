<?php
/**
 * PHP version 5.6
 *
 * This source file is subject to the license that is bundled with this package in the file LICENSE.
 */
require __DIR__ . '/../vendor/autoload.php';

$app = new \Slim\Slim();
$resolver = new \ComPHPPuebla\Slim\Resolver();

$services = new \EwalletApplication\Bridges\Slim\Services(
    $resolver, require __DIR__ . '/../app/config.php'
);
$services->configure($app);

$controllers = new \EwalletApplication\Bridges\Slim\Controllers($resolver);
$controllers->register($app);

$app->run();
