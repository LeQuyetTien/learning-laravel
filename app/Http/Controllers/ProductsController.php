<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Carbon;
use Faker\Factory as Faker;
use App\Product;
use App\Http\Requests\ProductFormRequest;
use Illuminate\Support\Facades\File;

class ProductsController extends Controller
{
    public function index() 
    {
        $products = Product::paginate(4);
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

    public function store(ProductFormRequest $request) 
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image')->getClientOriginalName();
            $request->file('image')->move(
                public_path() . '/images/products/', $image
            );
        } else {
            $image = null;
        }

        // get dữ liệu
        $name = Input::get('name');
        $description = Input::get('description');
        // $image = $name.'.jpg';
        $price = Input::get('price');
        $quantity = Input::get('quantity');

        // dd($image);

        Product::create([
            'name' => $name,
            'description' => $description,
            'image' => $image,
            'price' => $price,
            'quantity' => $quantity,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        return redirect()->route('product.index');
    }

    public function edit($id) 
    {
        $product = Product::find($id);
        return view('products.edit', compact('product'));
    }

    public function update($id, ProductFormRequest $request) 
    {
        $product = Product::find($id);

        if ($request->hasFile('image')) {
            // delete old image
            $result = File::delete(public_path() . '/images/products/'.$product->image);
            // add new image
            $image = $request->file('image')->getClientOriginalName();
            $request->file('image')->move(
                public_path() . '/images/products/', $image
            );
        } else {
            $image = $product->image;
        }

        $product->update([
            'image' => $image,
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'price' => $request->get('price'),
            'quantity' => $request->get('quantity'),
            'updated_at' => Carbon::now()
        ]);

        return redirect()->route('product.detail', compact('product'));
    }

    public function delete($id) 
    {
        $product = Product::find($id);
        $product->delete();

        return redirect()->route('product.index');
    }
}
