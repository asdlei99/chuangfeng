<?php
/**
 * Created by PhpStorm.
 * User: Venice
 * Date: 2019/5/29
 * Time: 16:30
 */

namespace app\api\model;
use think\Model;
use traits\model\SoftDelete;

class BaseModel extends Model
{
    // 软删除，设置后在查询时要特别注意whereOr
    // 使用whereOr会将设置了软删除的记录也查询出来
    // 可以对比下SQL语句，看看whereOr的SQL
    use SoftDelete;
    protected static $deleteTime = 'delete_time';  // 5.2版本之前必须用static定义

    protected $hidden = ['delete_time'];


}