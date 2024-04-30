<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(){
        return view("website.login");
    }

    public function register(){
        return view("website.register");
    }


    public function store_user(Request $request){
        $request->validate([
            "name"=>"required",
            "email"=>"required|unique:users,email",
            "password"=>"required",
        ]);
$input=$request->all();
$input['role']="User";
$user=User::create($input);
Auth::login($user);
return redirect()->route("index");
    }



    public function logout(){
        $user =auth()->user();
        Auth::logout($user);
return redirect()->route("index");
    }


    public function store_login(Request $request){
        $request->validate([
            "email"=>"required",
            "password"=>"required",
        ]);

      $user=  User::where('email' , $request->email)->where( 'password' , $request->password)->first();
if($user){
    Auth::login($user);
    if($user->role == "User"){
        return redirect()->route("index");
    }else{
        return redirect()->route("admin.index");
    }

}else{
    return redirect()->route("login");
}

    }



    public function product($category){
      
        $product = Product::where("status","Active")->get();
        $products=[];
        if($product->count()>0){
            foreach($product as $p){
                $categories=Category::find($p->id);
               
                if($categories->name == $category){
                    $p['category_name']=$categories->name;
$products[]=$p;

                }
            }

            return view("website.Products",compact("products"));
        }else{
            return view("website.Products",compact("products"));
        }
    }
}
