<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'image' => 'required|image',
            'category' => 'required',
            'stock' => 'required|integer|min:0'
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('products', 'public');
            $validated['image'] = $path;
        }

        Product::create($validated);
        return redirect()->route('admin.products.index')->with('success', 'Producto creado exitosamente');
    }

    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'image' => 'nullable|image',
            'category' => 'required',
            'stock' => 'required|integer|min:0'
        ]);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($product->image);
            $path = $request->file('image')->store('products', 'public');
            $validated['image'] = $path;
        }

        $product->update($validated);
        return redirect()->route('admin.products.index')->with('success', 'Producto actualizado exitosamente');
    }

    public function destroy(Product $product)
    {
        Storage::disk('public')->delete($product->image);
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Producto eliminado exitosamente');
    }
}
