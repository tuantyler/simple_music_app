<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Hash;

class AdminController extends Controller
{
    public function index(){
        return "Welcome";
    }
    public function login(){
        return view("login");
    }
    public function postLogin(Request $res){
        if (Auth::attempt(['username' => $res->username, 'password' => $res->password])) { 
            return redirect()->route("adminIndex");
        }
        else {
            return "error";
        }
    }
    public function createAccount($username , $password){
        DB::table('users')->delete();
        DB::table('users')->insert(["username" => $username , "password" => Hash::make($password)]);
    }
}
