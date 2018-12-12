<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductsController extends Controller
{
    public function index() 
    {
        $products = Product::all();
        return view('products', compact('products'));
    }

    public function detail($id) 
    {
        $product = Product::find($id);
        return view('detail', compact('product'));
    }
}
