<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin ;
use Illuminate\Support\Facades\Hash;
// use App\Models\Admin\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (session()->has('Admin_login')) {
            return view('admin.dashboard');
        } else {
            return view('admin.login');
        }
    }

    function auth(Request $request){
                    $email=$request->email;
                    $password=$request->password;
                    $result=Admin::where(['email'=>$email])->first();
                    if($result){
                        if(Hash::check($password, $result->password)){
                            $request->session()->put('Admin_login', true);
                            $request->session()->put('Admin_id', $result->id);
                            $request->session()->put('Admin_name', 'Administrator');
                            return redirect('admin/dashboard');
                        }else{
                            $request->session()->flash('error', "Wrong Passowrd");
                            return redirect('admin');
                        }
                    }else{
                        $request->session()->flash('error', "Please enter valid login credentials");
                        return redirect('admin');
                    }
        }

        public function dashboard()
        {
            return view('admin.dashboard');
        }


}
