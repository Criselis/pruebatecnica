<?php

namespace App\Http\Controllers;

use App\Models\Variation;
use App\Models\Product;
use Illuminate\Http\Request;

class VariationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Product $product)
    {
       // $variations = $product->variations;
        $variations = Variation::with('product')->get();
        return response()->json($variations);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Product $product)
    {
        /*
        Variation::create($request->all());
        return redirect()->route('variations.index')->with('success','created successfully :D');
        */

        $variation = new Variation($request->all());
        $product->variations()->save($variation);
        /// $variation->product()->save($variation);
        return response()->json($variation, 201);
                
     /*   $request->validate([
            'referencia'    => 'required',
            'descripcion'   => 'required',
            'precio'        => 'required',
            'product_id'    => 'required'
        ]);

        $variation = new Variation;
        $variation->referencia  = $request->referencia;
        $variation->descripcion = $request->descripcion;
        $variation->precio      = $request->precio;
        $variation->product_id  = $request->product_id;

        $variation->save(); */
    }

    /**
     * Display the specified resource.
     */
    public function show(Variation $variation)
    {
        return $variation; 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Variation $variation)
    {
        $request->validate([
            'referencia'    => 'required',
            'descripcion'   => 'required',
            'precio'        => 'required',
            'product_id'    => 'required'
        ]);

        $variation->referencia  = $request->referencia;
        $variation->descripcion = $request->descripcion;
        $variation->precio      = $request->precio;
        ///$variation->product_id  = 1;
        $variation->product_id  = $request->product_id;
        $variation->update();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $variation= Variation::find($id);
        if(is_null($variation)){
            return response()->json('No se pudo realizar', 404);
        }
        $variation->delete();
        return response()->noContent();
    }
}
