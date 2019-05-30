<?php
/**
 * Created by PhpStorm.
 * User: Venice
 * Date: 2019/5/29
 * Time: 11:10
 */

namespace app\api\model;


use think\Model;


class Taskitem extends BaseModel
{
    protected $hidden = ['delete_time', 'update_time'];

    public  static  function getTaskList()
    {
        return self::select();
    }

    public static  function ReMoveById($id)
    {
        return self::destroy($id);
    }

    public  static function  updateItemById($id,$name)
    {
        $data = [
            'id' => $id,
            'name' => $name
        ];
        $where = ['id' => $id];
        return self::update($data,$where);
    }

    public  static  function  addTaskItem($name)
    {

        $data = ["name"=>$name];
        //状态正常的就不重复添加了。
        if(self::field('*')->where( $data )->find())
            return 0;

        $data = [
            'name' => $name
        ];
        $model = Taskitem::create($data, true);
       return $model->id;
    }
}