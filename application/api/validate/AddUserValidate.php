<?php
/**
 * Created by PhpStorm.
 * User: Venice
 * Date: 2019/5/29
 * Time: 19:29
 */

namespace app\api\validate;


class AddUserValidate extends BaseValidate
{
    protected $rule = [
        'username' => 'require|isNotEmpty',
        'password' => 'require|isNotEmpty',
        'role'=>'require|isPositiveInteger'
    ];
}