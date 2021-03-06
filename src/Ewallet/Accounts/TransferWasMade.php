<?php
/**
 * PHP version 5.6
 *
 * This source file is subject to the license that is bundled with this package in the file LICENSE.
 */
namespace Ewallet\Accounts;

use DateTime;
use Hexagonal\DomainEvents\Event;
use Money\Money;

/**
 * This event is triggered every time a funds transfer is completed successfully
 */
class TransferWasMade implements Event
{
    /** @var DateTime */
    private $occurredOn;

    /** @var Identifier */
    private $fromMemberId;

    /** @var Money */
    private $amount;

    /** @var Identifier */
    private $toMemberId;

    /**
     * @param Identifier $fromMemberId
     * @param Money $amount
     * @param Identifier $toMemberId
     */
    public function __construct(
        Identifier $fromMemberId, Money $amount, Identifier $toMemberId
    ) {
        $this->occurredOn = new DateTime('now');
        $this->fromMemberId = $fromMemberId;
        $this->amount = $amount;
        $this->toMemberId = $toMemberId;
    }

    /**
     * @return DateTime
     */
    public function occurredOn()
    {
        return $this->occurredOn;
    }

    /**
     * @return Identifier
     */
    public function fromMemberId()
    {
        return $this->fromMemberId;
    }

    /**
     * @return Money
     */
    public function amount()
    {
        return $this->amount;
    }

    /**
     * @return Identifier
     */
    public function toMemberId()
    {
        return $this->toMemberId;
    }
}
