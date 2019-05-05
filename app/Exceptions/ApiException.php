<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/30
 * Time: 17:22
 */

namespace App\Exceptions;


use Throwable;

class ApiException extends \RuntimeException
{
    public function __construct(array $apiErrConst, Throwable $previous = null)
    {
        $message = $apiErrConst[1];
        $code    = $apiErrConst[0];
        parent::__construct($message, $code, $previous);
    }
}