<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\User;

class admincontroller extends Controller
{
  public function view_user()
  {
      $users=DB::select('select * from users');
      return view('admin.view_users')->with ('users',$users);
  }  
  public function add_user(Request $request)
  {
    $name=$request->input('name');
    $user_type=$request->input('user_type');
    $email=$request->input('email');
    $password=$request->input('password');
    $data=array('name'=>$name,'user_type'=>$user_type,'email'=>$email,'password'=>$password);
    DB::table('users')->insert($data);
    return redirect('dashboard');
  }
  public function update(Request $request,$id)
  {
      $name=$request->input('name');
      $email=$request->input('email');
      $user_type=$request->input('user_type');
      DB::update('update users set name= ?,email= ?,user_type= ? where id=?',
                 [$name,$email,$user_type,$id]);
                 
      echo "record update successfully!!";
  }
}
