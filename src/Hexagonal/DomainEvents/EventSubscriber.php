<?php
/**
 * PHP version 5.6
 *
 * This source file is subject to the license that is bundled with this package in the file LICENSE.
 */
namespace Hexagonal\DomainEvents;

interface EventSubscriber
{
    /**
     * @param Event $event
     * @return boolean
     */
    public function isSubscribedTo(Event $event);

    /**
     * @param Event $event
     * @return boolean
     */
    public function handle(Event $event);
}
