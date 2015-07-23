<?php
/**
 * PHP version 5.6
 *
 * This source file is subject to the license that is bundled with this package in the file LICENSE.
 */
namespace Ewallet\Accounts;

use Eris\Generator;
use Eris\TestTrait;
use EwalletTestsBridge\MembersBuilder;
use Money\Money;
use PHPUnit_Framework_TestCase as TestCase;

class MemberTest extends TestCase
{
    use TestTrait;

    /** @test */
    function giver_balance_should_decrease_after_funds_have_been_transferred()
    {
        $this
            ->forAll(Generator\int())
            ->then(function($amount) {
                $aMember = MembersBuilder::aMember();
                $fromMember = $aMember->withBalance(10000)->build();
                $toMember = MembersBuilder::aMember()->build();
                $fromMember->transfer(Money::MXN($amount), $toMember);
                $currentBalance = $fromMember->accountBalance()->getAmount();
                $this->assertLessThan(
                    10000,
                    $currentBalance,
                    "{$currentBalance} > 10000, {$amount} transferred"
                );
            });
        ;
    }
}
