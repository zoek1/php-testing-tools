<?php
/**
 * PHP version 5.6
 *
 * This source file is subject to the license that is bundled with this package in the file LICENSE.
 */
namespace specs\Ewallet\Accounts;

use Assert\InvalidArgumentException;
use PhpSpec\ObjectBehavior;

class EmailSpec extends ObjectBehavior
{
    function it_should_throw_exception_if_an_invalid_email_address_is_provided()
    {
        $this->beConstructedWith('invalid email address');
        $this
            ->shouldThrow(InvalidArgumentException::class)
            ->duringInstantiation()
        ;
    }

    function it_should_have_access_to_its_address()
    {
        $this->beConstructedWith('montealegreluis@gmail.com');
        $this->address()->shouldBe('montealegreluis@gmail.com');
    }
}
