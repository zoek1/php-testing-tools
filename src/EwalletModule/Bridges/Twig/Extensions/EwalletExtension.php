<?php
/**
 * PHP version 5.6
 *
 * This source file is subject to the license that is bundled with this package in the file LICENSE.
 */
namespace EwalletModule\Bridges\Twig\Extensions;

use Ewallet\Accounts\MemberInformation;
use EwalletModule\View\MemberFormatter;
use Money\Money;
use Twig_Extension as Extension;
use Twig_SimpleFunction as SimpleFunction;

class EwalletExtension extends Extension
{
    /** @var MemberFormatter */
    private $formatter;

    /**
     * @param MemberFormatter $formatter
     */
    public function __construct(MemberFormatter $formatter)
    {
        $this->formatter = $formatter;
    }

    /**
     * @return array
     */
    public function getFunctions()
    {
        return [
            new SimpleFunction('member', [$this, 'renderMember']),
            new SimpleFunction('money_amount', [$this, 'renderMoneyAmount']),
            new SimpleFunction('money', [$this, 'renderMoney']),
        ];
    }

    /**
     * @param MemberInformation $member
     * @return string
     */
    public function renderMember(MemberInformation $member)
    {
        return $this->formatter->renderMember($member);
    }

    /**
     * @param Money $money
     * @return string
     */
    public function renderMoney(Money $money)
    {
        return $this->formatter->renderMoney($money);
    }

    /**
     * @param integer $amount
     * @return string
     */
    public function renderMoneyAmount($amount)
    {
        return $this->formatter->renderMoneyAmount($amount);
    }

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return 'ewallet';
    }
}
