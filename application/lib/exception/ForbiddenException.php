<?php
/**
 * Created by PhpStorm.
 * User: Venice
 * Date: 2019/5/30
 * Time: 11:11
 */

namespace app\lib\exception;

/**
 * token验证失败时抛出此异常
 */
class ForbiddenException extends BaseException
{
    public $code = 403;
    public $msg = '权限不够';
    public $errorCode = 10006;
}