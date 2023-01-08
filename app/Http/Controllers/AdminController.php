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

    public function genres(){
        $genres = DB::table('theloai')->get();
        return view("admin.genres.index" , compact("genres"));
    }
    public function playlists(){
        $playlists = DB::table("paylist")->get();
        return view("admin.playlists.index" , compact("playlists"));
    }
    public function albums(){
        $albums = DB::table("idalbum")->get();
        return view("admin.albums.index" , compact("albums"));
    }
    public function topics(){
        $topics = DB::table("idchude")->get();
        return view("admin.topics.index" , compact("topics"));
    }
    public function ads(){
        $ads = DB::table("quangcao")->get();
        return view("admin.ads.index" , compact("ads"));
    }

}
