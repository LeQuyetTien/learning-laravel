<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Carbon;
use Faker\Factory as Faker;
use App\Product;
use App\Http\Requests\ProductFormRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderShipped;

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
            $path = Storage::putFile('public/products', $request->file('image'));
            $image = $request->file('image')->hashName();
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
            'image' => 'products/'.$image,
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
            Storage::delete('public/'.$product->image);
            // add new image
            Storage::putFile('public/products', $request->file('image'));
            $image = $request->file('image')->hashName();
        } else {
            $image = $product->image;
        }

        $product->update([
            'image' => 'products/'.$image,
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
        // delete image
        Storage::delete('public/'.$product->image);
        $product->delete();

        return redirect()->route('product.index');
    }

    public function order($id)
    {
        $product = Product::find($id);

        return view('products.order', compact('product'));
    }

    public function buy(Request $request, $id)
    {
        $product = Product::find($id);
        
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'email',
            'phone' => 'required',
            'address' => 'required',
        ]);

        // dd($product->name);
        $when = now()->addMinutes(2);
        Mail::to($request->get('email'))->later($when, new OrderShipped($product, $request->get('name'), $request->get('email'), $request->get('phone'), $request->get('address'), $request->get('note')));
   
        return 'Email was sent later';
    }
}
