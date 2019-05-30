<?php
/**
 * Created by PhpStorm.
 * User: Venice
 * Date: 2019/5/29
 * Time: 19:00
 */

namespace app\api\controller\v1;
use app\api\model\User as UserModel;
use app\api\validate\AddUserValidate;
use app\lib\exception\MissException;
use app\api\validate\IDMustBePositiveInt;
use app\lib\exception\SuccessMessage;

class User
{
    public function Login($username,$password)
    {
        if($username == ''||$password == ''){
            throw new MissException([
                'msg' => '登录失败，用户名或密码不能为空！',
                'errorCode' => 10005
            ]);
        }
        $ret = UserModel::doLogin($username,$password);
        if(empty($ret)){
            throw new MissException([
                'msg' => '用户名或者密码错误！',
                'errorCode' => 10005
            ]);
        }
        return $ret;
    }

    public function  insertUser($username,$password,$role)
    {
        $validate = new AddUserValidate();
        $validate->goCheck();
        $ret =  UserModel::AddUser($username,$password,$role);
        if(!$ret){
            throw new MissException([
                'msg' => '添加用户失败',
                'errorCode' => 10005
            ]);
        }
        $data = ["id"=>$ret,'msg' => 'ok'];
        return json($data);
    }
    public  function  removeUser($id){
        $validate = new IDMustBePositiveInt();
        $validate->goCheck();
        $ret = UserModel::deleteUser($id);
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

    public function getUsers()
    {
        $ret = UserModel::getUserList();
        if(empty($ret)){
            throw new MissException([
                'msg' => '没有任何用户！',
                'errorCode' => 10001
            ]);
        }
        return $ret;
    }

    public function  updateUserInfo($id,$password)
    {
        $validate = new IDMustBePositiveInt();
        $validate->goCheck();
        if($password == ''){
            throw  new ParameterException();
        }
        $ret =  UserModel::updateUserInfo($id,$password);
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
}