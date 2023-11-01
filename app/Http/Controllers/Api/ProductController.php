<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    
    public function index(Request $request) {

        $products = Product::query();

        if($request->has('fields')) {
            $fields = $request->get('fields');
            $products = Product::selectRaw($fields);   
        }

        return response()->json($products->paginate(3)); 
        
    }

    public function show($id) {
        
        $product = Product::find($id);

        return response()->json($product);

    }

    public function store(ProductRequest $request) {

        $data = $request->all();

        //VALIDACAO CUSTOMIZADA (Substituída pelo FormRequest:ProductRequest)
        
        // $validator = Validator::make($data, [
        //     'title' => 'required|string|max:255',
        //     'url' => 'required|string|max:255',
        //     'price' => 'required|numeric',
        //     'description' => 'required|string'
        // ]);

        // if($validator->fails()) {
        //     return response()->json(['error' => $validator->errors()], 400);
        // };

        $product = new Product;
        $product->fill($data);
        $product->save();

        return response()->json([
            'msg' => 'Produto cadastrado com sucesso',
            'data' => $product
        ]);

    }

    public function update(Request $request, $id) {

        $data = $request->all();

        //VALIDACAO CUSTOMIZADA (Nesse caso substituiu o FormRequest:ProductRequest)
        //
        $validator = Validator::make($data, [

            'title' => 'string|max:255',
            'url' => 'string|max:255',
            'price' => 'numeric',
            'description' => 'string'
        ]);

        if($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        };

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

    public function patch(Request $request, $id) {

        $data = $request->only(['title','url','price','description']);

        $validator = Validator::make($data, [
            'title' => 'string|max:255',
            'url' => 'string|max:255',
            'price' => 'numeric',
            'description' => 'string'
        ]);

        if($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $product = Product::find($id);

        if (!$product) {
            return response()->json(['error' => 'Produto não encontrado'], 404);
        }

        $product->update($data);

        return response()->json([
            'msg' => 'Produto alterado com sucesso',
            'data' => $product
        ]);

    } 

    public function delete($id) {

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
