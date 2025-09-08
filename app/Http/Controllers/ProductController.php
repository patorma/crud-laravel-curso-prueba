<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    //Obtener todos los productos
    public function index()
    {
        //Obtener todos los productos
        $products = Product::all();
        //compact is used to create an array from variables and their values
        //returning the view with the products data
        //the view file should be located at resources/views/products/index.blade.php
        //and it should be designed to display the products list
        //you can use Blade templating to loop through the products and display them

        //Retornar la vista 'products.index' con lista de productos
        return view('products.index', compact('products'));
    }


    public function create()
    {
        // Reetornar la vista 'products.create' para crear un nuevo producto
        return view('products.create');
    }


    public function store(Request $request)
    {
        //Validar formulario
        $request->validate([
            'name'=> 'required|string|max:255',
            'price'=> 'required|numeric',
            'description'=> 'required',
        ]);

        //Crear un nuevo producto con los datos validados
        Product::create($request->all());
        // Redirigir a la lista de productos con un mensaje de éxito
        return redirect()->route('products.index')->with('success', 'Producto creado exitosamente.');
    }


    public function show(Product $product)
    {
        // Retornar la vista 'products.show' con el producto especificado
        return view('products.show',compact('product'));
    }


    public function edit(Product $product)
    {
        // Retornar la vista 'products.edit' con el producto especificado para editar
        return view('products.edit',compact('product'));
    }


    public function update(Request $request, Product $product)
    {
        //Validar formulario
        $request->validate([
            'name'=> 'required|string|max:255',
            'price'=> 'required|numeric',
            'description'=> 'required',
        ]);

        // Actualizar el producto con los datos validados
        $product->update($request->all());
        // Redirigir a la lista de productos con un mensaje de éxito
        return redirect()->route('products.index')->with('success', 'Producto Actualizado.');
    }


    public function destroy(Product $product)
    {
        // Eliminar el producto especificaddo
        $product->delete();

        // Redirigir a la lista de productos con un mensaje de éxito
        return redirect()->route('products.index')->with('success', 'Producto Eliminado.');
    }
}
