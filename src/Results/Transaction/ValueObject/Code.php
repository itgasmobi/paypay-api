<?php

namespace Itgasmobi\PaypalApi\Results\Transaction\ValueObject;

class Code
{
    private const GENERAL_PAYMENT = [
        'T000' => [
            'name' => 'General Payment',
            'category' => 'General payment'
        ]
    ];

    private const GENERAL_ACCOUNTING_TRANSFER = [
        'T200' => [
            'name' => 'General intraaccount transfer',
            'category' => 'Account Transfer'
        ]
    ];

    private const MESSAGES = [
        self::GENERAL_PAYMENT,
        self::GENERAL_ACCOUNTING_TRANSFER
    ];
    /**
     * @var string
     */
    private string $code;

    /**
     * @var string
     */
    private string $message;

    /**
     * @var string
     */
    private string $category;

    /**
     * @param string $code
     */
    public function __construct(string $code)
    {
        $this->code = $code;
        $this->setMessageAndCategory($code);
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @return string
     */
    public function getCategory(): string
    {
        return $this->category;
    }

    /**
     * @param string $code
     * @return void
     */
    private function setMessageAndCategory(string $code)
    {

        $this->message = CodeType::getName($code);
        $this->category = CodeType::getCategory($code);
    }


}
