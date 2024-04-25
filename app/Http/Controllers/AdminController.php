<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
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
        $category=Category::all();
        return view("admin.storeProduct",compact("category"));
    }

    public function store_product(Request $request){
        $request->validate([
            "product_name"=>"required",
            "product_description"=>"required",
            "product_category"=>"required",
            "main_image"=>"required",
        ]);

        $input= $request->all();

$image =rand(6546656,54554542).'.'.$request->main_image->extension();
$main_path = $request->main_image->storeAs("main",$image,"public");
$input['main_image']="storage/".$main_path;

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

$input['other_media']=json_encode($uploadfile);

        }

        $product = Product::create($input);

        return redirect()->back();
    }


    public function show_product(){
        $product=Product::all();
        return view("admin.showProduct",compact("product"));
    }


    public function delete_product(Request $request){
       $product=Product::find($request->id);
       if($product){
        $product->delete();
        return response()->json("Product Deleted Successfully");
       }else{
        return response()->json("Product Not found");

       }
    }


    public function status_product(Request $request){
        $product=Product::find($request->id);
        if($product){
        if($product->status== "Active"){
            $product->status = "InActive";
        }else{
            $product->status = "Active";
        }
        $product->save();
         return response()->json("Product Status Updated Successfully");
        }else{
         return response()->json("Product Not found");
 
        }
     }
}
