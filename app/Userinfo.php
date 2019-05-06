<?php
/**
 * Created by PhpStorm.
 * User: Zhang
 * Date: 2019/4/30
 * Time: 15:00
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Userinfo extends Model
{
    //指定表名
    protected $table="code";
    //指定ID
    protected $primaryKey="id";
    //自动维护时间戳 true=打开 false=关闭
    public $timestamps=false;
    //允许新增的字段
    protected $fillable=["mobile","code","expiration"];
    //不允许新增的字段 这个两个函数不能同时使用
    protected $guarded=[];

    public static function getMember()
    {
        return "member name is sean";
    }

//    public function getDateFormat()
//    {
//        return time();
//    }
//
//    public function asDateTime($val)
//    {
//        return $val;
//    }

}