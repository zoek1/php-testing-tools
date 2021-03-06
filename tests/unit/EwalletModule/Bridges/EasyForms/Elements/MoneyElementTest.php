<?php
/**
 * PHP version 5.6
 *
 * This source file is subject to the license that is bundled with this package in the file LICENSE.
 */
namespace EwalletModule\Bridges\EasyForms\Elements;

use PHPUnit_Framework_TestCase as TestCase;

class MoneyElementTest extends TestCase
{
    /** @test */
    function it_should_set_its_value_as_a_pair_amount_currency()
    {
        $money = new MoneyElement('amount');

        $money->setValue(100);

        $this->assertEquals(
            ['amount' => 100, 'currency' => 'MXN'], $money->value()
        );
    }

    /** @test */
    function it_should_pass_value_to_the_amount_text_element()
    {
        $money = new MoneyElement('amount');

        $money->setValue(3533);

        $view = $money->buildView();

        $this->assertEquals(3533, $view->amount->value);
    }
}
