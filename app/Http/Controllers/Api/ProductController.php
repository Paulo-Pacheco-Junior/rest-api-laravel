<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductCollection;
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

        return new ProductCollection($products->paginate(10));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $data = $request->only(['title','url','price','description']);
        $product = $this->product->fill($data);
        $product->save();

        return new ProductResource($product);

    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return new ProductResource($product);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {
        $data = $request->only(['title','url','price','description']);

        $product->update($data);

        return new ProductResource($product);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        
        return new ProductResource($product);
    
    }
}
