<?php
/**
 * Created by PhpStorm.
 * User: Venice
 * Date: 2019/5/29
 * Time: 14:58
 */

namespace app\lib\exception;


class UserException extends BaseException
{
    public $code = 404;
    public $msg = '用户不存在';
    public $errorCode = 60000;
}