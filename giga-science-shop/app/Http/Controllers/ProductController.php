<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the products.
     */
    public function index()
    {
        return Product::all(); // Return all products
    }

    /**
     * Store a newly created product in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'category' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Image validation
        ]);

        // Handle image upload if present
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public'); // Store image in 'products' directory
        } else {
            $imagePath = null;
        }

        // Create the product
        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category' => $request->category,
            'image' => $imagePath, // Store image path
        ]);

        return response()->json($product, 201); // Return the newly created product with status code 201
    }

    /**
     * Display the specified product.
     */
    public function show(string $id)
    {
        $product = Product::findOrFail($id); // Find the product by ID or fail

        return response()->json($product); // Return the product data
    }

    /**
     * Update the specified product in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the incoming request
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'category' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Image validation
        ]);

        $product = Product::findOrFail($id); // Find the product by ID or fail

        // Handle image upload if present
        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }

            // Store new image
            $imagePath = $request->file('image')->store('products', 'public');
        } else {
            $imagePath = $product->image; // Keep the old image if no new one is uploaded
        }

        // Update the product with the provided data
        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category' => $request->category,
            'image' => $imagePath, // Update the image path
        ]);

        return response()->json($product); // Return the updated product data
    }

    /**
     * Remove the specified product from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id); // Find the product by ID or fail

        // Delete the product's image if it exists
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete(); // Delete the product

        return response()->json(['message' => 'Product deleted successfully']);
    }
}
 