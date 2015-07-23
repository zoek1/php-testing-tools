<?php
/**
 * PHP version 5.6
 *
 * This source file is subject to the license that is bundled with this package in the file LICENSE.
 */
namespace EwalletSlimBridge;

use EwalletSlimBridge\ServiceProviders\EwalletServiceProvider;
use EwalletSlimBridge\ServiceProviders\FormsServiceProvider;
use EwalletSlimBridge\ServiceProviders\DoctrineServiceProvider;
use EwalletSlimBridge\ServiceProviders\TwigServiceProvider;

class Services extends \ComPHPPuebla\Slim\Services
{
    public function init()
    {
        $this
            ->add(new DoctrineServiceProvider())
            ->add(new TwigServiceProvider())
            ->add(new FormsServiceProvider())
            ->add(new EwalletServiceProvider())
        ;
    }
}
