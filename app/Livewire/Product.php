<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Product as PM;

use Livewire\WithFileUploads;
class Product extends Component
{
    use WithFileUploads;
    public $product_name;
    public $product_description;
    public $product_category;
    public $main_image;
    public $status;
    public $available_quantity;

    protected $rule=[
        "product_name"=>"required",
        "product_description"=>"required",
    ];
public function store(){

    $extension = $this->main_image->extension();
$imageName = rand(6546656, 54554542) . '.' . $extension;

$main_path = $this->main_image->storeAs('public/main', $imageName);

$this->main_image = 'storage/main/' . $imageName;


$product = PM::create([
    "product_name"=>$this->product_name,
    "product_description"=>$this->product_description,
    "product_category"=>$this->product_category,
    "status"=>$this->status,
    "price"=>50,
    "main_image"=>$this->main_image,
    "available_quantity"=>$this->available_quantity
]);
return view('livewire.product');
}


    public function render()
    {
        $category=Category::all();
        return view('livewire.product',compact('category'));
    }
}
