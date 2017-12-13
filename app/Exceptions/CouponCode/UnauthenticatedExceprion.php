<?php

namespace App\Exceptions\CouponCode;

use Exception;

class UnauthenticatedExceprion  extends Exception
{
    /**
     * @var string
     */
    protected $message = 'User is not authenticated, and can not use promotion code.';
    /**
     * @var int
     */
    protected $code = 401;
}