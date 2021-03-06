<?php
/**
 * PHP version 5.6
 *
 * This source file is subject to the license that is bundled with this package in the file LICENSE.
 */
namespace specs\Ewallet\Accounts;

use Assert\InvalidArgumentException;
use Ewallet\Accounts\Identifier;
use PhpSpec\ObjectBehavior;

class IdentifierSpec extends ObjectBehavior
{
    function it_should_be_created_from_a_string()
    {
        $this->beConstructedThrough('fromString', ['abcd']);
        $this->__toString()->shouldBe('abcd');
    }

    function it_should_be_created_randomly_using_any_non_empty_value()
    {
        $this->beConstructedThrough('any', []);
        $this->__toString()->shouldNotBe('');
    }

    function it_should_not_be_created_from_an_empty_string()
    {
        $this->beConstructedThrough('fromString', ['']);
        $this
            ->shouldThrow(InvalidArgumentException::class)
            ->duringInstantiation()
        ;
    }

    function it_should_know_when_it_is_equal_to_another_id()
    {
        $this->beConstructedThrough('fromString', ['abcd']);
        $this->equals(Identifier::fromString('abcd'))->shouldBe(true);
    }

    function it_should_be_casted_to_string()
    {
        $this->beConstructedThrough('fromString', ['abcd']);
        $this->__toString()->shouldBe('abcd');
    }
}
