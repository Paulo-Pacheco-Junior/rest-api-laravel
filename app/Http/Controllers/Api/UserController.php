<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(Request $request) {

        $users = User::query();

        return response()->json($users->paginate(3)); 
        
    }

    public function show($id) {
        
        $user = User::find($id);

        return response()->json($user);

    }

    public function store(Request $request) {

        $data = $request->all();

        $validator = Validator::make($data, [

            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|min:8'
        ]);

        if($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        };

        $user = new User;
        $user->fill($data);
        $user->save();

        return response()->json([
            'msg' => 'Usuário cadastrado com sucesso',
            'data' => $user
        ]);

    }

    public function update(Request $request, $id) {

        $data = $request->all();

        //VALIDACAO CUSTOMIZADA (Nesse caso substituiu o FormRequest:ProductRequest)
        //
        $validator = Validator::make($data, [

            'name' => 'string|max:255',
            'email' => 'email|max:255',
            'password' => 'min:8|confirmed'
        ]);

        if($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        };

        $user = User::find($id);

        if(!$user) {
            return response()->json(['error' => 'Usuário não encontrado'], 404);
        }
        
        $user->update($data);

        return response()->json([
            'msg' => 'Usuário alterado com sucesso',
            'data' => $user
        ]);

    } 

    public function patch(Request $request, $id) {

        $data = $request->only(['name','email','password']);

        $validator = Validator::make($data, [

            'name' => 'string|max:255',
            'email' => 'email|max:255',
            'password' => 'min:8|confirmed'
        ]);

        if($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        };

        $user = User::find($id);

        if (!$user) {
            return response()->json(['error' => 'Usuário não encontrado'], 404);
        }

        $user->update($data);

        return response()->json([
            'msg' => 'Usuário alterado com sucesso',
            'data' => $user
        ]);

    } 

    public function delete($id) {

       $user = User::find($id);

        if(!$user) {
            return response()->json(['error' => 'Usuário não encontrado'], 404);
        };

        $user->delete();

        return response()->json(
            ['msg' => 'Usuário removido com sucesso!']
        );

    }
}
