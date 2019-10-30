<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;
use Image;

class CarController extends Controller
{
    public function index()
    {

        $cars = Car::latest()->paginate(20);


        return view('car.index',compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 20);
    }

    public function create()
    {
        return view('car.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',

        ]);


        // Creating product with specified parameters
        // Not using Product::Create due to inability to correctly upload image to the DB
        $product = new Product;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->material = $request->material;

        //Image upload section
        if ($request->hasFile('image')) {
          $image = $request->file('image');
          $filename = time() . '.' . $image->getClientOriginalExtension();
          Image::make($image)->/*resize(150,150)->*/save( public_path('/images/product_images/'. $filename));
          $product->image = $filename;
        }
        $product->save();
        return redirect()->route('products.index')
                        ->with('success','Product created successfully.');
    }
}
