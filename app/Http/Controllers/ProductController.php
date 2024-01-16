<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $title = 'Create Product';
        return view('user/create-product', compact('title'));
    }

    public function store(Request $request)
    {
        // Validate form input
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
        ]);

        // Handle file upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $imagePath = 'uploads/products/' . $imageName;
            $image->move(public_path('uploads/products'), $imageName);

            $fullImageUrl = asset($imagePath);
        }

        // Create a new product instance
        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->user_id = $request->user_id; // Assign logged-in user's ID
        $product->image_path = $fullImageUrl;

        // Save the product to the database
        $product->save();

        // Redirect to a success page or display a success message
        // return redirect()->route('/')->with('success', 'Product created successfully!');
        return redirect()->intended('/');
    }
}
