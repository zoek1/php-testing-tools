<?php
/**
 * PHP version 5.6
 *
 * This source file is subject to the license that is bundled with this package in the file LICENSE.
 */
namespace spec\Ewallet\Accounts;

use Ewallet\Accounts\InsufficientFunds;
use Money\Money;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class AccountSpec extends ObjectBehavior
{
    function it_should_be_created_with_a_specific_balance()
    {
        $this->beConstructedThrough('withBalance', [Money::MXN(3000)]);
        $this->balance()->getAmount()->shouldBe(3000);
    }

    function it_should_increase_balance_after_a_deposit()
    {
        $this->beConstructedThrough('withBalance', [Money::MXN(3000)]);

        $this->deposit(Money::MXN(500));

        $this->balance()->getAmount()->shouldBe(3500);
    }

    function it_should_decrease_balance_after_a_withdrawal()
    {
        $this->beConstructedThrough('withBalance', [Money::MXN(3000)]);

        $this->withdraw(Money::MXN(500));

        $this->balance()->getAmount()->shouldBe(2500);
    }

    function it_should_not_allow_withdrawing_more_than_the_current_balance()
    {
        $this->beConstructedThrough('withBalance', [Money::MXN(3000)]);

        $this
            ->shouldThrow(InsufficientFunds::class)
            ->duringWithdraw(Money::MXN(3500))
        ;
    }
}