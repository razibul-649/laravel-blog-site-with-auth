<?php

namespace App\Http\Controllers;
use App\Models\User;
use Session;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{
 
    public function login(){
        return view('login');
    }
    public function register(){
        return view('register');
    }


    public function loginInf(Request $req){



        $req->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $req->only('email', 'password');
        if (Auth::attempt($credentials)) {
           $name= Auth::user()->name;
            return redirect('/category/add');
        }
  
        return redirect("/login")->with('msg','Login details are not valid');
         
        

       
    
       }

   public function registerConf(Request $req){
   

            $req->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:6',
            ]);
            
            $data = $req->all();
            $check = $this->create($data);
            
            return redirect("/login")->with('msg','Registration Successfuly');
  

   }

   public function create(array $data)
   {
     return User::create([
       'name' => $data['name'],
       'email' => $data['email'],
       'password' => Hash::make($data['password'])
     ]);
   }   


   public function logOut(){

       Session::flush();
        Auth::logout();
  
        return Redirect('login');

   }

}
