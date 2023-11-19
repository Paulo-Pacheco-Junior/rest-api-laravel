<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;
use App\Models\Product;



class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) {

        $products = Product::query();

        if($request->has('fields')) {
            $fields = $request->get('fields');
            $products = Product::selectRaw($fields);   
        }

        return response()->json($products->paginate(10)); 
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request) {

        $data = $request->all();

        $product = new Product;
        $product->fill($data);
        $product->save();

        return response()->json([
            'msg' => 'Produto cadastrado com sucesso',
            'data' => $product
        ]);

    }

    /**
     * Display the specified resource.
     */
    public function show($id) {
        
        $product = Product::find($id);

        return response()->json($product);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, $id) {

        $data = $request->only(['title','url','price','description']);

        $product = Product::find($id);

        if(!$product) {
            return response()->json(['error' => 'Produto não encontrado'], 404);
        }
        
        $product->update($data);

        return response()->json([
            'msg' => 'Produto alterado com sucesso',
            'data' => $product
        ]);

    } 

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) {

        $product = Product::find($id);

        if(!$product) {
            return response()->json(['error' => 'Produto não encontrado'], 404);
        };

        $product->delete();

        return response()->json(
            ['msg' => 'Produto removido com sucesso!']
        );
        
    }
}
