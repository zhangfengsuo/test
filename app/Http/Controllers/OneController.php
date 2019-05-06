<?php
/**
 * Created by PhpStorm.
 * User: Zhang
 * Date: 2019/5/5
 * Time: 15:44
 */

namespace App\Http\Controllers;

use App\User;
class OneController extends Controller
{

    public function __invoke($id)
    {

        dump("1111111111111");
//        return view('user.profile', ['user' =>"name"]);
    }

}