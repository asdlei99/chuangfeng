<?php
/**
 * Created by PhpStorm.
 * User: Venice
 * Date: 2019/5/29
 * Time: 11:09
 */

namespace app\api\controller\v1;
use app\api\model\Taskitem as TaskitemModel;
use app\lib\exception\TokenException;
use think\Db;
use app\lib\exception\SuccessMessage;
use app\lib\exception\MissException;
use app\lib\exception\ParameterException;
use app\api\validate\IDMustBePositiveInt;
use app\api\validate\AddTaskItemValidate;
use app\api\service\AppToken;


class Taskitem
{
    public function getTaskItem()
    {
        $ret = TaskitemModel::getTaskList();
        if(empty($ret)){
            throw new MissException([
                'msg' => '还没有任何记账项目！',
                'errorCode' => 10001
            ]);
        }
        return $ret;
    }

    public function removeTaskItem($id)
    {
        $token = new AppToken();// 需要拿令牌，并且是管理员的令牌
        $token->needSuperScope();
        $validate = new IDMustBePositiveInt();
        $validate->goCheck();
        $ret = TaskitemModel::ReMoveById($id);
        if($ret){
            throw new SuccessMessage();
        }
        else{
            throw new MissException([
                'msg' => '请求删除错误',
                'errorCode' =>10003
            ]);
        }
    }

    public function updateTaskItemById($id,$name)
    {
        $token = new AppToken();// 需要拿令牌，并且是管理员的令牌
        $token->needSuperScope();
        $validate = new IDMustBePositiveInt();
        $validate->goCheck();
        if($name == ''){
            throw  new ParameterException();
        }
        $ret =  TaskitemModel::updateItemById($id,$name);
        if($ret)
        {
            throw new SuccessMessage();
        }
        else{
            throw new MissException([
                'msg' => '数据更新失败',
                'errorCode' =>10004
            ]);
        }

    }

    public  function  insertTaskItem($name)
    {
        $token = new AppToken();// 需要拿令牌，并且是管理员的令牌
        $token->needSuperScope();

        $validate = new AddTaskItemValidate();
        $validate->goCheck();
        $ret = TaskitemModel::addTaskItem($name);
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