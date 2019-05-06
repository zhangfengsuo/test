<?php
/**
 * Created by PhpStorm.
 * User: Zhang
 * Date: 2019/1/31
 * Time: 9:59
 */

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class TestController extends Controller {

    public function test()
    {

        //原生查询数据
        //$res=DB::select("select * from fa_user where id=?",[1]);
        //原生插入数据 插入成功返回true
        //$res=DB::insert("insert into fa_code (mobile,code,expiration)value(?,?,?)",["15038309303","1111",1503830930]);
        //原生修改数据 修改成功返回修改成功的条数 没有修改成功返回0
        //$res=DB::update('update fa_code set mobile=? where mobile=?',["15038309301","15038309303111"]);
        //原生删除数据 返回影响的函数
        //$res=DB::delete("delete from fa_code where id=?",[4]);
        //执行一些没有返回值的语句
        //DB::statement("drop table coinpay_otc");

        /**
         * 事务操作
         */
        /*
        DB::transaction(function(){
           DB::table('code')->update(["code"=>1111]);
           DB::table("userinfo")->delete(["id"=>2]);
        });
         DB::beginTransaction();
          try{
              $s1=DB::table('code')->update(["code"=>1111]);
              $s2=DB::table("userinfo")->delete(["id"=>2]);
              if(!$s1) throw new \Exception("更新失败");
              if(!$s2) throw new \Exception("删除失败");
              DB::commit();
          }catch (\Exception $e){
              DB::rollBack();
              return $e->getMessage();
          }
        */

        /**
         *  分块查询数据
         */
         /*   DB::table("userinfo")->orderBy("id")->chunk(10,function($users){
                foreach($users as $user){
                   dump($user->id);
                }
            });
         */
        /**
         *  分块修改数据
         */

          /*  DB::table("userinfo")->orderBy("id")->chunkById(10,function($users){
                foreach($users as $user){
                    DB::table("userinfo")->where("id",$user->id)->update(["nickname"=>"修改名字"]);
                }
            });
          */
        /**
         *  where参数分组查询
         */

        /*  $result=DB::table("user")
              ->where("id","=",1)
              ->where(function($query){
                  $query->where("mobile","=","15038309303")->orWhere("id",">",0);
              })
              ->get();
        */

        /**
         *  新增数据并返回新增数据的自增ID  只插入数据insert
         */
        // $result=DB::table("code")->insertGetId(["mobile"=>"15038309","code"=>"123456","expiration"=>"10000000"]);

        /**
         * 查询第一个参数如果存在，更新第二个参数， 如果不存在新增记录为两个参数的值
         */
        /* $result=DB::table('code')->updateOrInsert(
             ['mobile'=>"150383091","code"=>123456],
             ["expiration"=>20000000]
         );
        */
        /**
         *  sharedLock 共享锁可防止选中的数据列被篡改，直到事务被提交为止 ：
         *  lockForUpdate() 使用 「update」锁可避免行被其它共享锁修改或选取：
         */
       /*   $result=DB::table('code')->where("id",">",1)->sharedLock()->get();
          $result=DB::table('code')->where("id",">",1)->lockForUpdate()->get();*/

        /**
         *  已经有了一个查询构造器实例，并且希望在现有的查询语句中加入一个字段，那么你可以使用 addSelect 方法：
         */
          /*
          $count=DB::table("code")->where("id",">","1")->select("name");
          $users=$count->addSelect("salt")->get();
          */
        /**
         * 自增 自减
         * 自增或者自减时候修改其他字段的值
         */
       /*   DB::table("code")->where("id",1)->increment("code");   //自增
          DB::table("code")->where("id",1)->decrement("code");   //自减
          DB::table("code")->where("id",1)->decrement("code",1,["mobile"=>"150321"]);   //自减同时更新其他字段的内容*/
        /**
         * 删除记录
         * 清空表
         */
         /* DB::table("code")->where("id",1)->delete("code");
          DB::table("code")->truncate();*/
        /**
         * 使用游标遍历数据库，只执行一次查询
         */
        /*    foreach(\App\Userinfo::where("id",">","1")->cursor() as $val)
            {
                dump($val->mobile);
            }*/
        /**
         * 创建模型实例
         * 新增数据
         * 修改数据
         * 批量更新
         */
         /*
            $userinfo=new \App\Userinfo;
            $userinfo->mobile="1888888";
            $userinfo->code="1234";
            $userinfo->expiration="1234567890";
            $userinfo->save();

            $userinfo=\App\Userinfo::find(5);
            $userinfo->mobile="18072723804";
            $userinfo->save();


         */
        $bool=\App\Userinfo::where("id",">",1)->update(["code"=>"8888"]);
        dump($bool);
          $name=["abc","abcd"];
       return view("test.test",["name"=>$name]);
    }

    /*
     * 中间件测试
     * 活动没有开始只能访问宣传页面，活动开始才能访问活动页面
     */
    public function activity0()
    {
        return "宣传页面，活动还么有开始";
    }

    public function activity1()
    {
        return "活动1，活动正在进行中.....";
    }

    public function activity2()
    {
        return "活动2，活动正在进行中.....";
    }
    /**
     * request操作
     */
    public function getform(Request $request)
    {

        return view("test.getform");
    }
    /**
     * session 操作测试
     */
    public function session1(Request $request)
    {
        //赋值
        $request->session()->put("name","");
        $request->session()->put("name1","zhang1");
        session(["name2"=>"zhang2"]);
        $request->session()->flash("status","hidden");
        $request->session()->keep(["keep1",'email']);
    }
    public function session2(Request $request)
    {
        //获取值,没有值的时候用第二个参数
        /*
        $request->session()->get("name1","default");
        $request->session()->get("name1",function(){
            return "default1111";
        });
        session("name");
        session("name","default");
        */
        //获取session的所有值
//        $request->session()->all();
        //检查某个session值是否存在
       /*
        $request->session()->exists("name");
        $request->session()->has("name");
       */
       //向session添加一个数组数据
        //$request->session()->push("age",18);
       //删除一个session数据
        //$request->session()->pull("user");
        //闪存数据，存储到下一次HTTP请求之前
        //$request->session()->flash("status","hidden");

        //删除一个指定的session
        //$request->session()->forget("name1");

        //删除所有的session值
        //$request->session()->flush();

        //重新生成 Session ID
        //$request->session()->regenerate();
    }
    /**
     * 测试视图
     */
    public function test2()
    {
        return view("test.test2");
    }
}