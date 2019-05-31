<?php
/**
 * Created by PhpStorm.
 * User: Venice
 * Date: 2019/5/31
 * Time: 10:31
 */

namespace app\api\controller\v1;
use app\api\model\Consume as ConsumeModel;
use  app\api\model\ConsumeItem as ConsumItemModel;
use app\lib\exception\MissException;

class Consume
{
    public  function  getConsumeList(){
        $ret = ConsumeModel::getConsumes();
        if(empty($ret)){
            throw new MissException([
                'msg' => '没有消耗品！',
                'errorCode' => 10001
            ]);
        }
        return $ret;
    }


    public  function insertConsumeItem($name,$itemname,$specs,$unit,$price)
    {
        $id = ConsumeModel::insertConsume($name);
        $ret = ConsumItemModel::insertConsumeItem($id,$itemname,$specs,$unit,$price);

        if($ret){
            $data = ["id"=>$ret,'msg' => 'ok'];
            return json($data);
        }else {
            throw new MissException([
                'msg' => '数据添加失败',
                'errorCode' => 10005
            ]);
        }
    }

}