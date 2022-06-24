<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(){
        $name = 'kiatti';
        $age = 14;
        return view('auth.register',compact('name','age'));
    }

    public function login(){
        return view('auth.login');
    }

    public function home(){
        return view('home');
    }

    public function index($name){
        return $name;
    }

    public function storeRegister(Request $request){
        // FORM VALIDATE
        $message = [
            'first_name.required' => 'กรุณากรอกชื่อ',
            'last_name.required' => 'กรุณากรอกนามสกุล',
            'phone_number.required' => 'กรุณากรอกหมายเลขโทรศัพท์',
            'email.email' => 'กรุณากรอกอีเมลให้ถูกต้อง',
            'email.required' => 'กรุณากรอกอีเมล',
            'email.unique' => 'ขออภัย อีเมลนี้ถูกใช้งานแล้ว',
            'password.min' => 'รหัสผ่านอย่างน้อย 6 ตัวอักษร',
            'password.required' => 'กรุณาระบบรหัสผ่าน'
        ];
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone_number' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ], $message);

        User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        //return $request->all();
        return redirect('/auth/login');
    }

    public function checkLogin(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $data = $request->only('email','password');
        if(Auth::attempt($data)){
            return redirect('/home');
        }else{
            return redirect('/auth/login')->withErrors(['message'=>'login fail']);
        }
        //return $data;
    }

    public function logout(){
        Auth::logout();
        return redirect('/auth/login');
    }

}
