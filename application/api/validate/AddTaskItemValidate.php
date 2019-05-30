<?php
/**
 * Created by PhpStorm.
 * User: Venice
 * Date: 2019/5/29
 * Time: 16:43
 */

namespace app\api\validate;


class AddTaskItemValidate extends  BaseValidate
{
    protected $rule = [
        'name' => 'require|isNotEmpty'
    ];
}