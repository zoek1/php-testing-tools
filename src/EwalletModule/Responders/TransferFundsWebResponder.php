<?php
/**
 * PHP version 5.6
 *
 * This source file is subject to the license that is bundled with this package in the file LICENSE.
 */
namespace EwalletModule\Responders;

use Ewallet\Accounts\Identifier;
use Ewallet\Wallet\TransferFundsResponse;

interface TransferFundsWebResponder
{
    /**
     * @param TransferFundsResponse $result
     */
    public function respondTransferCompleted(TransferFundsResponse $result);

    /**
     * @param array $messages
     * @param array $values
     * @param string $fromMemberId
     */
    public function respondInvalidTransferInput(
        array $messages,
        array $values,
        $fromMemberId
    );

    /**
     * @param Identifier $fromMemberId
     */
    public function respondEnterTransferInformation(Identifier $fromMemberId);

    /**
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function response();
}
