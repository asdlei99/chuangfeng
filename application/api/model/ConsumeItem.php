<?php
/**
 * Created by PhpStorm.
 * User: Venice
 * Date: 2019/5/31
 * Time: 10:43
 */

namespace app\api\model;

use think\Model;



class ConsumeItem extends BaseModel
{
    protected $hidden = ['update_time', 'consume_id','delete_time'];

    public static  function  insertConsumeItem($id,$name,$specs,$unit,$price)
    {
        $data = ["name"=>$name];
        //状态正常的就不重复添加了。
        if(self::field('*')->where( $data )->find())
            return 0;

        $data = [
            'name' => $name,
            'specs' => $specs,
            'unit' => $unit,
            'price' => $price,
            'consume_id' => $id,
        ];
        $model = ConsumeItem::create($data, true);
        return $model->id;
    }

}