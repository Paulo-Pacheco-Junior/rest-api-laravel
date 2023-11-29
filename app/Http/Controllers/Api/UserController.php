<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{
    
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;

    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = $this->user->query();

        return response()->json($users->paginate(10));
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $data = $request->only(['name','email','password']);
        $user = $this->user->fill($data);
        $user->save();

        return response()->json([
            'msg' => 'Usuário cadastrado com sucesso',
            'data' => $user
        ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return response()->json($user);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user)
    {
        $data = $request->only(['name','email','password']);

        $user->update($data);
        
        return response()->json([
            'msg' => 'Usuário alterado com sucesso',
            'data' => $user
        ]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return response()->json([
            'msg' => 'Usuário removido com sucesso',
            'data' => $user
        ]);

    }
    
}
