<?php
/**
 * PHP version 5.6
 *
 * This source file is subject to the license that is bundled with this package in the file LICENSE.
 */
require __DIR__ . '/../../../../../../vendor/autoload.php';

use Dotenv\Dotenv;
use EwalletApplication\Bridges\Slim\Application;

$environment = new Dotenv(__DIR__ . '/../../../../../../');
$environment->load();
$environment->required(['DOCTRINE_DEV_MODE', 'TWIG_DEBUG']);

$app = new Application(
    require __DIR__ . '/../../../../../../app/config_dev.php'
);
$app->run();
