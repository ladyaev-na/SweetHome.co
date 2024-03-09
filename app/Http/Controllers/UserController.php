<?php

namespace App\Http\Controllers;

use App\Exceptions\AoiException;
use App\Http\Requests\AddCreateRequest;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return response()->json(UserResource::collection($users));
    }

    public function create(UserCreateRequest $request){
        if ($request){
            $user = new User($request->all());
            $user->save();
            return response()->json($user)->setStatusCode(200);
        }else{
            return response()->json()->setStatusCode(400);
        }

    }

    public function update(UserUpdateRequest $request, $id){
        $user = User::find($id);
        if ($user){
            if ($id == 1){
                return 'Пользователя admin редактировать запрещено.';
            }else{
                $user->update($request->all());
                return response()->json(UserResource::make($user))->setStatusCode(200);
            }

        }else{
            return response()->json()->setStatusCode(406,'Edit employee failed.');
        }

    }

    public function add(AddCreateRequest $request){
        $user = new User($request->all());
        $user->save();
        return response()->json($user)->setStatusCode(200);
    }
}
