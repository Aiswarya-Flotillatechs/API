<?php
use App\Models\User;
namespace App\Http\Controllers\admin;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class DashboardController extends Controller
{
   public function registered()
   {

        $users = DB::select('select *  from users');
    	return view('admin.users')->with('users',$users);

       
   }
   public function admin_reg(Request $request)
   {
    $name=$request->input('name');
    $email=$request->input('email');
    $usertype=$request->input('usertype');
    $password=$request->input('password');
    $data=array('name'=>$name,'email'=>$email,'usertype'=>$usertype,'password'=>$password);
    DB::table('users')->insert($data);
     return redirect('dashboard');
   }
  
   public function update(Request $request,$id)
   {
      $name=$request->input('name');
      $email=$request->input('email');
      $usertype=$request->input('usertype');
      DB::update('update users set name= ?,email= ?,usertype= ? where id=?',
                 [$name,$email,$usertype,$id]);
                 
      echo "record update successfully!!";
      
   }
      

}
