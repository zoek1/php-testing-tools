<?php
/**
 * PHP version 5.6
 *
 * This source file is subject to the license that is bundled with this package in the file LICENSE.
 */
namespace Hexagonal\Messaging;

class PublishedMessage
{
    /** @var integer */
    private $id;

    /** @var string */
    private $exchangeName;

    /** @var integer */
    private $mostRecentMessageId;

    /**
     * @param string $exchangeName
     * @param integer $mostRecentMessageId
     */
    public function __construct($exchangeName, $mostRecentMessageId)
    {
        $this->exchangeName = $exchangeName;
        $this->mostRecentMessageId = $mostRecentMessageId;
    }

    /**
     * @return integer
     */
    public function id()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function exchangeName()
    {
        return $this->exchangeName;
    }

    /**
     * @return integer
     */
    public function mostRecentMessageId()
    {
        return $this->mostRecentMessageId;
    }

    /**
     * @param integer $mostRecentMessageId
     */
    public function updateMostRecentMessageId($mostRecentMessageId)
    {
        $this->mostRecentMessageId = $mostRecentMessageId;
    }

    /**
     * 2 messages are equal if they have the same ID
     *
     * @param PublishedMessage $message
     * @return boolean
     */
    public function equals(PublishedMessage $message)
    {
        return $this->id == $message->id;
    }
}
