<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return response()->json($products);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre'        => 'required',
            'referencia'    => 'required',
            'descripcion'   => 'required',
            'precio'        => 'required'
        ]);
        $product = new Product;
        $product->nombre      = $request->nombre;
        $product->referencia  = $request->referencia;
        $product->descripcion = $request->descripcion;
        $product->precio      = $request->precio;
        $product->save();

        //$product = Product::create($request->all());
        return response()->json($product);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $product = Product::find($id);
        //return $product;
        return response()->json($product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'nombre'        => 'required',
            'referencia'    => 'required',
            'descripcion'   => 'required',
            'precio'        => 'required'
        ]);
        $product->nombre      = $request->nombre;
        $product->referencia  = $request->referencia;
        $product->descripcion = $request->descripcion;
        $product->precio      = $request->precio;
        $product->update();

        return response()->json($product);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        if(is_null($product)){
            return response()->json('No se pudo realizar', 404);
        }
        $product->delete();
        return response()->noContent();
    }
}
