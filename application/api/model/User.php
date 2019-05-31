<?php
/**
 * Created by PhpStorm.
 * User: Venice
 * Date: 2019/5/29
 * Time: 19:00
 */

namespace app\api\model;


class User extends BaseModel
{
    protected $hidden = ['delete_time', 'update_time','role_id','password'];

    public static  function  doLogin($username,$password){
        $data = ["nickname"=>$username,
            "password"=>$password
        ];
        return self::field('id,role_id')->where($data)->find();

    }

    public static function AddUser($username,$password,$role)
    {
        $data = ["nickname"=>$username];
        //状态正常的就不重复添加了。
        if(self::field('*')->where( $data )->find())
            return 0;
        $role_id  = $role == '管理员'?1:2;
        $data = [
            'nickname' => $username,
            'password'=>$password,
            'role_id'=>$role_id
        ];
        $model = User::create($data, true);
        return $model->id;
    }

    public static  function  deleteUser($id)
    {
        return self::destroy($id);
    }


    public function  role(){
        return $this->belongsTo('role','role_id','id');
    }

    public  static  function  getUserList()
    {
        return self::with(['role'])->select(); //field可以指定筛选的字段
    }

    public static  function  updateUserInfo($id,$password)
    {
        $data = [
            'id' => $id,
            'password' => $password
        ];
        $where = ['id' => $id];
        return self::update($data,$where);
    }
}