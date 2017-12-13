<?php

namespace App\Exceptions\CouponCode;

use Exception;

class InvalidPromocodeExceprion  extends Exception
{
    /**
     * @var string
     */
    protected $message = 'Invalid promotion code was passed.';
    /**
     * @var int
     */
    protected $code = 404;
}