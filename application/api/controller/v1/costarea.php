<?php
/**
 * Created by PhpStorm.
 * User: Venice
 * Date: 2019/5/31
 * Time: 14:15
 */

namespace app\api\controller\v1;
use  app\api\model\Costarea as CostareaModel;
use app\api\validate\AddCostAreasValidate;
use app\lib\exception\MissException;

class Costarea
{
    public function getCostareas()
    {
        $ret = CostareaModel::getCostArealist();
        if(empty($ret)){
            throw new MissException([
                'msg' => '还没有任何记账项目！',
                'errorCode' => 10001
            ]);
        }
        return $ret;
    }

    public function insertCostarea($name)
    {
        $validate = new AddCostAreasValidate();
        $validate->goCheck();
        $ret =  CostareaModel::insertCostAreaList($name );
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