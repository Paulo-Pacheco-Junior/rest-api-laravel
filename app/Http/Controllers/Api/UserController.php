<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Http\Resources\UserCollection;
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

        return new UserCollection($users->paginate(10));
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $data = $request->only(['name','email','password']);
        $user = $this->user->fill($data);
        $user->save();

        return new UserResource($user);

    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return new UserResource($user);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, $id)
    {
        $user = $this->user->find($id);
        $data = $request->only(['name','email','password']);

        $user->update($data);

        return new UserResource($user);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return new UserResource($user);

    }
    
}
