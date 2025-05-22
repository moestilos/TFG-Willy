<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        // Obtener todos los productos de la base de datos
        $products = Product::all();

        // Retornar la vista con la variable $products
        return view('products.index', compact('products'));
    }

    public function categories()
    {
        return view('products.categories');
    }

    public function camisetas()
    {
        return view('products.camisetas');
    }

    public function sudaderas()
    {
        return view('products.sudaderas');
    }

    public function gorras()
    {
        return view('products.gorras');
    }
}