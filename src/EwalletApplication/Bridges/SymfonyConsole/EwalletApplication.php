<?php
/**
 * PHP version 5.6
 *
 * This source file is subject to the license that is bundled with this package in the file LICENSE.
 */
namespace EwalletApplication\Bridges\SymfonyConsole;

use EwalletApplication\Bridges\Pimple\EwalletConsoleContainer;
use EwalletApplication\Bridges\SymfonyConsole\Commands\NotifyTransferByEmailCommand;
use EwalletApplication\Bridges\SymfonyConsole\Commands\PublishMessagesCommand;
use EwalletApplication\Bridges\SymfonyConsole\Commands\TransferFundsCommand;
use Symfony\Component\Console\Application;

class EwalletApplication extends Application
{
    /**
     * @param EwalletConsoleContainer $container
     */
    public function __construct(EwalletConsoleContainer $container)
    {
        parent::__construct('ewallet', '1.0.0');
        $this
            ->add(new TransferFundsCommand(
                $container['ewallet.transfer_funds'],
                $container['ewallet.member_formatter']
            ))
        ;
        $this
            ->add(new PublishMessagesCommand(
                $container['hexagonal.messages_publisher']
            ))
        ;
        $this
            ->add(new NotifyTransferByEmailCommand(
                $container['ewallet.transfer_mail_notifier'],
                $container['hexagonal.messages_consumer']
            ))
        ;
        $this->setDispatcher($container['ewallet.console.dispatcher']);
    }
}
