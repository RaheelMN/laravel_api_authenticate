<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    // public function getProducts(){
    //     return Product::all();
    // }

    public function index(){
        $products = Product::query()->orderByDesc('id')->paginate(5);
        return response($products,200);
        // return Product::all();
        // return SkillResource::collection(Skill::all());
        // return new SkillCollection(Skill::paginate(10));
    }

    public function show($id){
        return Product::find($id);
    }

    public function store(StoreProductRequest $req){
        $product = new Product();
        $product->name = $req->name;
        $product->description=$req->description;
        $product->price=$req->price;
        $product->file_path = $req->file('image')->store('images');
        $product->save();
        return response()->json('Product created');   
    }

    public function update(UpdateProductRequest $req,Product $product){
        if($req->image){
            $productDB = Product::find($product->id);
            Storage::delete('/'.$productDB->file_path);      
            $product->name = $req->name;
            $product->description=$req->description;
            $product->price=$req->price;
            $product->file_path = $req->file('image')->store('images');
            $product->save();
            return response()->json(['message'=>'product updated']);
        }else{
            $product->update($req->validated());
            return $product;
        }

    }

    public function destroy(Product $product){
        $product->delete();
        return response()->json('Product deleted');
    }


    public function searchProducts($key){

        $result = Product::select('id','name','file_path','description','price')->where('name','like',"%{$key}%")->paginate(5);
        return $result;
    }     

}
