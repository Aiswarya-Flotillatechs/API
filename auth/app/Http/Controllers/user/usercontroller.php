<?php

use App\Models\User;
namespace App\Http\Controllers\user;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Request;

class usercontroller extends Controller
{
    public function userprofile()
    {
        
        $users = DB::select('select *  from userswhere id="$id"');
    	return view('auth.userprofile')->with('users',$users);
    }
}
