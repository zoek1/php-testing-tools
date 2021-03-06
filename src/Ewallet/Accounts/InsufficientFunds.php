<?php
/**
 * PHP version 5.6
 *
 * This source file is subject to the license that is bundled with this package in the file LICENSE.
 */
namespace Ewallet\Accounts;

use RuntimeException;

/**
 * This exception is thrown to prevent a member to overdraw her account
 */
class InsufficientFunds extends RuntimeException
{
}
