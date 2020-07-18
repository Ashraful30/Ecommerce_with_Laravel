<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;

use Session;

class AdminController extends Controller
{
    public function login(Request $request){

        if($request->isMethod('post')){
            $data = $request->input();
            if (Auth::attempt(['email'=>$data['email'],'password'=>$data['password'],'active'=>'1'])) {
            //    echo "Success";die;
                // Session::put('adminSession',$data['email']);
                return redirect('/admin/dashboard');
            }
            else{
                //echo "Failed";die;
                return redirect('/admin')->with('flash_message_error','Invalid Email or Password');
            }
        }
        return view('admin.admin_login');
    }

    public function dashboard(){

        // if (Session::has('adminSession')) {
        //     return view('admin.dashboard');
        // }
        // else{
        //     return redirect('/admin')->with('flash_message_error','Please login first');
        // }
        return view('admin.dashboard');
    }

    public function settings(){

        return view('admin.settings');
    }

    public function check(Request $request){

        $user = Auth::user();
        $data = $request->all();
        $check_password = $data['check_current_password'];
        $current_password = $user->password;

        if(Hash::check($check_password,$current_password)){
            echo "true";die;
        } else{
            echo "false";die;
        }
        
    }

    public function updatePassword(Request $request){

        $user = Auth::user();
        $data = $request->all();
        $check_password = $data['current_password'];
        $new_password = $data['new_password'];
        $confirm_password = $data['confirm_password'];
        $current_password = $user->password;

        if(Hash::check($check_password,$current_password)){
            
            if ($new_password == $confirm_password) {

                $user->password = Hash::make($new_password);
                $user->save();
                return redirect('/admin/settings')->with('flash_message_success','Password updated successfully');
            } else{
                return redirect('/admin/settings')->with('flash_message_error','Confirm password is incorrect');
            }
        } else{
            return redirect('/admin/settings')->with('flash_message_error','Current password is incorrect');
        }
    }

    public function logout(){
        Session::flush();
        return redirect('/admin')->with('flash_message_success','Logged out successfully');
    }
}
