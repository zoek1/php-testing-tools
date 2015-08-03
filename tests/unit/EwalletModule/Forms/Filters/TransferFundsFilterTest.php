<?php
/**
 * PHP version 5.6
 *
 * This source file is subject to the license that is bundled with this package in the file LICENSE.
 */
namespace EwalletModule\Forms\Filters;

use EwalletModule\Forms\MembersConfiguration;
use PHPUnit_Framework_TestCase as TestCase;
use Zend\Validator\Digits;
use Mockery;
use Zend\Validator\InArray;
use Zend\Validator\NotEmpty;

class TransferFundsFilterTest extends TestCase
{
    const VALID_ID = 'a valid ID';
    const VALID_AMOUNT = 12000;

    /** @test */
    function it_should_pass_validation_with_a_valid_amount()
    {
        $filter = new TransferFundsFilter();
        $filter->setData([
            'toMemberId' => self::VALID_ID,
            'amount' => self::VALID_AMOUNT,
        ]);

        $this->assertTrue($filter->isValid(), 'Amount should be valid');
    }

    /** @test */
    function it_should_not_pass_validation_with_a_non_integer_amount()
    {
        $filter = new TransferFundsFilter();
        $filter->setData([
            'toMemberId' => self::VALID_ID,
            'amount' => 12000.34
        ]);

        $this->assertFalse($filter->isValid(), 'Amount should be invalid');
        $this->assertArrayHasKey(Digits::NOT_DIGITS, $filter->getMessages()['amount']);
    }

    /** @test */
    function it_should_not_pass_validation_if_amount_is_empty()
    {
        $filter = new TransferFundsFilter();
        $filter->setData([
            'toMemberId' => self::VALID_ID,
            'amount' => '',
        ]);

        $this->assertFalse($filter->isValid(), 'Amount should be invalid');
        $this->assertArrayHasKey(Digits::STRING_EMPTY, $filter->getMessages()['amount']);
    }

    /** @test */
    function it_should_pass_validation_with_valid_member_id()
    {
        $filter = new TransferFundsFilter();
        $filter->setData([
            'toMemberId' => self::VALID_ID,
            'amount' => self::VALID_AMOUNT,
        ]);

        $this->assertTrue($filter->isValid(), 'Member ID should be valid');
    }

    /** @test */
    function it_should_not_pass_validation_with_an_empty_member_id()
    {
        $filter = new TransferFundsFilter();
        $filter->setData([
            'toMemberId' => '',
            'amount' => self::VALID_AMOUNT,
        ]);

        $this->assertFalse($filter->isValid(), 'Member ID should be invalid');
        $this->assertArrayHasKey(NotEmpty::IS_EMPTY, $filter->getMessages()['toMemberId']);
    }

    /** @test */
    function it_should_not_pass_validation_if_member_id_is_not_in_white_list()
    {
        $filter = new TransferFundsFilter();
        $filter->setData([
            'toMemberId' => 'not a valid member ID',
            'amount' => self::VALID_AMOUNT,
        ]);

        $configuration = Mockery::mock(MembersConfiguration::class);
        $configuration
            ->shouldReceive('getMembersWhiteList')
            ->once()
            ->andReturn(['abc', 'xyz'])
        ;

        $filter->configure($configuration);

        $this->assertFalse($filter->isValid(), 'Member ID should be invalid');
        $this->assertArrayHasKey(InArray::NOT_IN_ARRAY, $filter->getMessages()['toMemberId']);
    }
}
