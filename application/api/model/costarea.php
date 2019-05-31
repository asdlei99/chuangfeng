<?php
/**
 * Created by PhpStorm.
 * User: Venice
 * Date: 2019/5/31
 * Time: 14:15
 */

namespace app\api\model;




class Costarea extends  BaseModel
{
    protected $hidden = [ 'update_time','delete_time'];

    public  static  function  getCostArealist()
    {
        return self::select();
    }
    public  static  function  insertCostAreaList($name)
    {
        $data = ["name"=>$name];
        //状态正常的就不重复添加了。
        if(self::field('*')->where( $data )->find())
            return 0;

        $data = [
            'name' => $name
        ];
        $model = Costarea::create($data, true);
        return $model->id;
    }
}