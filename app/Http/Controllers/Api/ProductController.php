<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;
use App\Models\Product;


class ProductController extends Controller
{
    
    private $product;

    public function __construct(Product $product) 
    {
        $this->product = $product;

    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $products = $this->product->query();

        if($request->has('fields')) {
            $fields = $request->get('fields');
            $products->selectRaw($fields);
        }

        return response()->json($products->paginate(10));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $data = $request->only(['title','url','price','description']);
        $product = $this->product->fill($data);
        $product->save();

        return response()->json([
            'msg' => 'Produto cadastrado com sucesso',
            'data' => $product
        ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return response()->json($product);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {
        $data = $request->only(['title','url','price','description']);
        $product = $this->product->find($product->id);

        $product->update($data);
        
        return response()->json([
            'msg' => 'Produto atualizado com sucesso',
            'data' => $product
        ]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return response()->json(
            ['msg' => 'Produto removido com sucesso!']
        );

    }
}
