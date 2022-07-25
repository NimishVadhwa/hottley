<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //

    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }

    public function login()
    {
        if(Auth::check())
        {
            return redirect('admin/dashboard');
        }
        else
        {
            return view('login.login');
        }
    }

    public function login_data(Request $req)
    {
        
        $data=[
            'email'=>$req->email,
            'password'=>$req->password,
            'type'=>'admin'
        ];

        if(Auth::attempt($data))
        {
            return redirect('admin/dashboard');
        }
        else
        {
            return back()->with('msg','PLease check Email Id or password');
        }


    }

}
