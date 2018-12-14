<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Carbon;
use Faker\Factory as Faker;
use App\Product;
use App\Http\Requests\ProductFormRequest;

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
        // in kết quả ra kết hợp 2 hàm die() và dump() trong php
        // dd(Input::get('name'));

        // dùng faker để tạo image
        // require_once 'D:/dev/learning_laravel/vendor/fzaninotto/faker/src/autoload.php';
        $faker = Faker::create();
        $url = $faker->image($dir='D:/dev/learning_laravel/public/images', $width='500', $height='500');
        $image = substr($url, strpos($url, '\\')+1);

        // dd($image);

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
        $product->update([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'price' => $request->get('price'),
            'quantity' => $request->get('quantity'),
            'updated_at' => Carbon::now()
        ]);

        return redirect()->route('product.index');
    }

    public function delete($id) {
        $product = Product::find($id);
        $product->delete();

        return redirect()->route('product.index');
    }
}
