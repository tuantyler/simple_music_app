<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Hash;

class AdminController extends Controller
{
    public function index(){
        return view("admin.index");
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

    public function songs(){
        $songs = DB::table("baihat")
        ->leftJoin('idalbum','baihat.idAlbum','idalbum.idAlbum')
        ->leftJoin('theloai','baihat.idTheLoai','theloai.idTheLoai')
        ->leftJoin('paylist','baihat.idPayList','paylist.idPayList')
        ->get();
        return view("admin.songs.index" , compact("songs"));
    }
}
