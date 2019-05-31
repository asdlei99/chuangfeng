<?php
/**
 * Created by PhpStorm.
 * User: Venice
 * Date: 2019/5/31
 * Time: 15:37
 */

namespace app\api\validate;


class AddCostAreasValidate extends  BaseValidate
{
    protected $rule = [
        'name' => 'require|isNotEmpty'
    ];
}