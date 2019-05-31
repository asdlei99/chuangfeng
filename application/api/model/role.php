<?php
/**
 * Created by PhpStorm.
 * User: Venice
 * Date: 2019/5/30
 * Time: 17:10
 */

namespace app\api\model;


class Role extends BaseModel
{
    protected $hidden = ['id', 'update_time','delete_time'];
    public function items()
    {
        return $this->hasMany('user', 'role_id', 'id');
    }

    public  static  function  getUserList()
    {
        return self::with(['items'])->select(); //field可以指定筛选的字段
    }
}