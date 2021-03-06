<?php
/**
 * PHP version 5.6
 *
 * This source file is subject to the license that is bundled with this package in the file LICENSE.
 */
namespace Hexagonal\Application\Services;

interface TransactionalSession
{
    /**
     * @param  callable $operation
     * @return mixed
     */
    public function executeAtomically(callable $operation);
}
