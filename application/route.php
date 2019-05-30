<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

/*return [
    '__pattern__' => [
        'name' => '\w+',
    ],
    '[hello]'     => [
        ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
        ':name' => ['index/hello', ['method' => 'post']],
    ],

];*/

use  think\Route;

Route::get("getTaskItem","api/v1.Taskitem/getTaskItem");
Route::post("removeTaskItem","api/v1.Taskitem/removeTaskItem");
Route::post("updateTaskItem","api/v1.Taskitem/updateTaskItemById");
Route::post("insertTaskItem","api/v1.Taskitem/insertTaskItem");

Route::post("login","api/v1.User/Login");
Route::post("adduser","api/v1.User/insertUser");
Route::post("deleteuser","api/v1.User/removeUser");
Route::get("getUserList","api/v1.User/getUsers");
Route::post("updateuserinfo","api/v1.User/updateUserInfo");