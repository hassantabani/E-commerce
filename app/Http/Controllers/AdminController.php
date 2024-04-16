<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view("admin.index");
    }


    public function show_user(){
        $users = User::all();
        return view("admin.showUser",compact("users"));
    }

    public function product(){
        return view("admin.storeProduct");
    }

    public function store_product(Request $request){
        if($request->other_media){
            $uploadfile=[];
            foreach($request->other_media as $o){
                $object= new \stdClass();
$extension = $o->extension();

if(in_array($extension , ['mp4','avi','mkv','mov','bin'])){
    $object->type="video";
}elseif(in_array($extension , ['avif','jpeg','jpg','png'])){
    $object->type="image";
}else{
    $object->type="others";
}

$media=rand(000000,99900009).'.'.$extension;
$path=$o->storeAs("product",$media,'public');
$object->url = "storage/".$path;

$uploadfile[]=$object;
            }

            dd($uploadfile);
        }
    }
}
