<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserEditRequest;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function index()
    {
        return new UserCollection($this->user->orderByName()->paginate(7));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $user = $this->user;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->birthday = $request->birthday;
        $user->active = $request->active;
        $user->save();

        return response()->json([
            'ready' => true,
            'type' => 'Users',
            'data' => new UserResource($user)
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return response()->json([
            'ready' => true,
            'type' => 'Users',
            'data' => new UserResource($user)
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserEditRequest $request, User $user)
    {
        $user->name = $request->name;
        $user->email = $request->email;

        if(isset($request->password)){
            $user->password = bcrypt($request->password);
        }

        $user->birthday = $request->birthday;
        $user->active = $request->active;
        $user->update();

        return response()->json([
            'ready' => true,
            'type' => 'Users',
            'data' => new UserResource($user)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return response()->json([
            'ready' => true,
            'message' => 'El usuario se ha eliminado correctamente',
            'user' => $user,
        ],204);
    }
}
