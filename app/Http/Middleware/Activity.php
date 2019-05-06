<?php
/**
 * Created by PhpStorm.
 * User: Zhang
 * Date: 2019/5/5
 * Time: 10:03
 */

namespace App\Http\Middleware;
use Closure;

class Activity
{
    //创建前置中间件
    public function handle($request,Closure $next)
    {
        if(time()<strtotime("2019-05-06")) {
            return redirect("activity0");
        }
        return $next($request);
    }
}