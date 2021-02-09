<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class AuthenticateController extends Controller
{
    public function index()
    {
        return view("pages.login");
    }
    public function login()
    {
        $data = request()->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($data)) {
            if (Auth::user()->user_type == "admin") {
                return redirect("/app-accounts");
            }elseif (Auth::user()->user_type == "vendor") {
                return redirect("/vendor");
            }else {
                return redirect("/index");
            }
        }else{
            return redirect("/pages/login")->with("msg", "Incorrect email or password!");
        }
    }
    public function regIndex(Request $request)
    {
        if ($request->has('ref')) {
            $refer = request("ref");
            return view("pages.register_2", compact("refer"));
        }else{
            return view("pages.register");
        }
    }
    public function register()
    {
        $data = request()->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'username' => 'required',
            'phone' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required|same:password'
        ]);

        $item['name'] = request('name');
        $item['email'] = request('email');
        $item['username'] = request('username');
        $item['phone'] = request('phone');
        $item['level'] = "0";
        $item['ref_id'] = rand($min = 0, $max = 10000000000);
        $item['password'] = Hash::make(request('password'));

        if(request("ref")){
            $item['ref_by'] = request('ref_by');
        }
        if(request("vendor") == "on"){
            $item['vendor_request'] = "Yes";
        }else{
            $item['vendor_request'] = "No";
        }

        User::create($item);

        return redirect("/index");
    }
}
