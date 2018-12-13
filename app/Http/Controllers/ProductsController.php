<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductsController extends Controller
{
    public function index() 
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function detail($id) 
    {
        $product = Product::find($id);
        return view('products.detail', compact('product'));
    }

    public function create() 
    {
        return view('products.create');
    }
}
