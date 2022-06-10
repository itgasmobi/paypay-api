<?php

namespace Itgasmobi\PaypalApi\Results\Transaction\ValueObject;

class CodeType
{
     private const GENERAL_PAYMENT_CODE = 'T0000';
     private const GENERAL_PAYMENT = [
        'name' => 'General Payment',
        'category' => 'General payment'
    ];

    private const GENERAL_ACCOUNTING_TRANSFER_CODE = 'T2000';
    private const GENERAL_ACCOUNTING_TRANSFER = [
        'name' => 'General intraaccount transfer',
        'category' => 'Account Transfer'
    ];

    private const GENERAL_CURRENCY_CONVERSION_CODE = 'T0200';
    private const GENERAL_CURRENCY_CONVERSION  = [
        'name' => 'General Currency Conversion',
        'category' => 'Currency Conversion'
    ];

    private const PRE_APPROVED_PAYMENT_BILL_USER_CODE = 'T0003';
    private const PRE_APPROVED_PAYMENT_BILL_USER  = [
        'name' => 'PreApproved Payment Bill User Payment',
        'category' => 'Payment Bill User Payment'
    ];

    private const BANK_DEPOSIT_TO_PP_ACCOUNT_CODE = 'T0300';
    private const BANK_DEPOSIT_TO_PP_ACCOUNT  = [
        'name' => 'PreApproved Payment Bill User Payment',
        'category' => 'Payment Bill User Payment'
    ];

    private const MASS_PAY_PAYMENT_CODE = 'T0001';
    private const MASS_PAY_PAYMENT  = [
        'name' => 'PreApproved Payment Bill User Payment',
        'category' => 'Payment Bill User Payment'
    ];

    private const GENERAL_CREDIT_CARD_DEPOSIT_CODE = 'T0700';
    private const GENERAL_CREDIT_CARD_DEPOSIT  = [
        'name' => 'General Credit Card Deposit',
        'category' => 'General Credit Card Deposit'
    ];
     
    private const CHECKOUT_API_CODE = 'T0006';
    private const CHECKOUT_API = [
        'name' => 'PayPal Checkout APIs.',
        'category' => 'PayPal account-to-PayPal account payment'
    ];

    private const USER_INICIATE_CURRENCY_CONVERSION_CODE = 'T0201';

    private const USER_INICIATE_CURRENCY_CONVERSION = [
        'name' => 'User-initiated currency conversion',
        'category' => 'Currency conversion'
    ];

    private const GENERAL_WITHDRAWAL_CODE = 'T0400';

    private const GENERAL_WITHDRAWAL = [
        'name' => 'General withdrawal from PayPal account',
        'category' => 'Bank withdrawal from PayPal account'
    ];

    private const WEBSITE_STANDARD_PAYMENT_CODE = 'T0007';

    private const WEBSITE_STANDARD_PAYMENT = [
        'name' => 'Website payments standard payment.',
        'category' => ' PayPal account-to-PayPal account payment'
    ];

    private const PAYMENT_REFUND_INITIATE_MERCHANT_CODE = 'T1107';

    private const PAYMENT_REFUND_INITIATE_MERCHANT = [
        'name' => 'Payment refund, initiated by merchant.',
        'category' => 'Reversal'
    ];



    private const MESSAGES = [
        self::GENERAL_PAYMENT_CODE => self::GENERAL_PAYMENT,
        self::GENERAL_ACCOUNTING_TRANSFER_CODE => self::GENERAL_ACCOUNTING_TRANSFER,
        self::GENERAL_CURRENCY_CONVERSION_CODE => self::GENERAL_CURRENCY_CONVERSION,
        self::PRE_APPROVED_PAYMENT_BILL_USER_CODE => self::PRE_APPROVED_PAYMENT_BILL_USER,
        self::BANK_DEPOSIT_TO_PP_ACCOUNT_CODE => self::BANK_DEPOSIT_TO_PP_ACCOUNT,
        self::MASS_PAY_PAYMENT_CODE => self::MASS_PAY_PAYMENT,
        self::GENERAL_CREDIT_CARD_DEPOSIT_CODE => self::GENERAL_CREDIT_CARD_DEPOSIT,
        self::CHECKOUT_API_CODE => self::CHECKOUT_API,
        self::USER_INICIATE_CURRENCY_CONVERSION_CODE => self::USER_INICIATE_CURRENCY_CONVERSION,
        self::GENERAL_WITHDRAWAL_CODE => self::GENERAL_WITHDRAWAL,
        self::WEBSITE_STANDARD_PAYMENT_CODE => self::WEBSITE_STANDARD_PAYMENT,
        self::PAYMENT_REFUND_INITIATE_MERCHANT_CODE => self::PAYMENT_REFUND_INITIATE_MERCHANT
    ];


    /**
     * @param string $code
     * @return string
     */
    public static function getName(string $code): string
    {
        return isset(self::MESSAGES[$code]) ? self::MESSAGES[$code]['name'] : '';

    }

    /**
     * @param string $code
     * @return array|string
     */
    public static function getCategory(string $code): array|string
    {
        return isset(self::MESSAGES[$code]) ? self::MESSAGES[$code]['name'] : '';

    }


}
