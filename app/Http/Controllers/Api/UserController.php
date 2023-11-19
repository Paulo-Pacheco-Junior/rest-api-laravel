<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) {

        $users = User::query();

        return response()->json($users->paginate(10)); 
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request) {

        $data = $request->all();

        $user = new User;
        $user->fill($data);
        $user->save();

        return response()->json([
            'msg' => 'Usuário cadastrado com sucesso',
            'data' => $user
        ]);

    }

    /**
     * Display the specified resource.
     */
    public function show($id) {
        
        $user = User::find($id);

        return response()->json($user);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, $id) {

        $data = $request->only(['name','email','password']);

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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) {

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
