<?php
/**
 * Created by PhpStorm.
 * User: Venice
 * Date: 2019/5/30
 * Time: 11:18
 */

namespace app\api\service;

use app\lib\exception\TokenException;

class AppToken  extends Token
{
    public  function getToken($Id, $scope){
        $values = [
            'scope' => $scope,
            'id' => $Id
        ];
        $token = $this->saveToCache($values);
        return $token;
    }

    private function saveToCache($values){
        $token = self::generateToken();
        $expire_in = config('secure.token_expire_in');
        $result = cache($token, json_encode($values), $expire_in);
        if(!$result){
            throw new TokenException([
                'msg' => '服务器缓存异常',
                'errorCode' => 999
            ]);
        }
        return $token;
    }
}