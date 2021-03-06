<?php
/**
 * PHP version 5.6
 *
 * This source file is subject to the license that is bundled with this package in the file LICENSE.
 */
namespace EwalletModule\View;

use DataBuilders\A;
use Money\Money;
use PHPUnit_Framework_TestCase as TestCase;

class MemberFormatterTest extends TestCase
{
    /** @var MemberFormatter */
    private $formatter;

    /** @before */
    public function createformatter()
    {
        $this->formatter = new MemberFormatter();
    }

    /** @test */
    function it_should_add_thousands_separator_to_a_money_amount()
    {
        $this->assertEquals('1,234.25', $this->formatter->formatMoneyAmount(1234.25));
    }

    /** @test */
    function it_should_add_2_decimal_places_to_an_integer_money_amount()
    {
        $this->assertEquals('546.00', $this->formatter->formatMoneyAmount(546));
    }

    /** @test */
    function it_should_format_a_money_object_information()
    {
        $this->assertEquals(
            '$5,987.29 MXN',
            $this->formatter->formatMoney(Money::MXN(598729))
        );
    }

    /** @test */
    function it_should_format_a_member_information()
    {
        $aMember = A::member()
            ->withName('Mario Montealegre')
            ->withBalance(1500025)
            ->build()
        ;

        $this->assertEquals(
            'Mario Montealegre $15,000.25 MXN',
            $this->formatter->formatMember($aMember->information())
        );
    }
}
