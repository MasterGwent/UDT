<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        return $product = Product::all();
    }

    public function store(Request $request){
        return Product::create($request->all());
    }

    public function update(Request $request, int $id){
        $product = Product::findOrFail($id);
        $product->update($request->all());
        return $product;
    }
    public function destroy($id){
        Product::where('id', $id)->delete();
    }
}