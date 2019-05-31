<?php
/**
 * Created by PhpStorm.
 * User: Venice
 * Date: 2019/5/31
 * Time: 10:32
 */

namespace app\api\model;


class Consume extends BaseModel
{
    protected $hidden = ['update_time','delete_time'];
    public function items()
    {
        return $this->hasMany('ConsumeItem', 'consume_id', 'id');
    }

    public static function getConsumes()
    {
        $consumes = self::with(['items'])->select();
        return $consumes;
    }

    public static  function  insertConsume($name)
    {
        $data = ["name"=>$name];
        //状态正常的就不重复添加了。
        $ret = self::field('*')->where( $data )->find();
        if(!empty($ret))
            return $ret->getData('id');

        $data = [
            'name' => $name,

        ];
        $model = Consume::create($data, true);
        return $model->id;
    }
}