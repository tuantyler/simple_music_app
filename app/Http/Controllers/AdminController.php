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


        $genreEntities = DB::table("theloai")->get(["idTheLoai" , "TenTheLoai"]);
        $albumEntities = DB::table("idalbum")->get(["idAlbum" , "TenAlbum"]);
        $playlistEntities = DB::table("paylist")->get(["idPayList" , "Ten"]);
        return view("admin.songs.index" , compact("songs" , "genreEntities" , "albumEntities" , "playlistEntities"));
    }

    public function addSong(Request $res){
        $uniqid = uniqid();
        $HinhBaiHat_fileName = $uniqid . "-" . $res->HinhBaiHat->getClientOriginalName();
        $LinkBaiHat_fileName = $uniqid . "-" . $res->LinkBaiHat->getClientOriginalName();

        $res->HinhBaiHat->move(public_path("HinhBaiHat"), $HinhBaiHat_fileName);
        $res->LinkBaiHat->move(public_path("LinkBaiHat"), $LinkBaiHat_fileName);

        $entity = $res->except("_token");
        $entity["HinhBaiHat"] = "HinhBaiHat/" . $HinhBaiHat_fileName;
        $entity["LinkBaiHat"] = "LinkBaiHat/" . $LinkBaiHat_fileName;
        $entity["idAlbum"] = (boolval($entity["idAlbum"])) ? $entity["idAlbum"] : null;
        $entity["idTheLoai"] = (isset($entity["idTheLoai"])) ? implode(",",$entity["idTheLoai"]) : null;
        $entity["idPayList"] = (isset($entity["idPayList"])) ? implode(",",$entity["idPayList"]) : null;
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
