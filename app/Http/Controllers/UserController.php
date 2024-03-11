<?php

namespace App\Http\Controllers;

use App\Exceptions\AoiException;
use App\Http\Requests\AddCreateRequest;
use App\Http\Requests\ReviewCreateRequest;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Resources\UserResource;
use App\Models\Review;
use App\Models\User;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return response()->json(UserResource::collection($users))->setStatusCode(200);
    }

    public function create(UserCreateRequest $request){
        if ($request){
            $user = new User($request->all());
            $user->save();
            return response()->json($user)->setStatusCode(200, 'yes');
        }else{
            return response()->json()->setStatusCode(401,'Registration failed');
        }

    }

    public function update(UserUpdateRequest $request, $id){
        $user = User::find($id);
        if ($user){
            if ($id == 1){
                return response()
                    ->json('Пользователя admin редактировать запрещено.')
                    ->setStatusCode(403, 'Edit employee failed');
            }else{
                $user->update($request->all());
                return response()
                    ->json(UserResource::make($user))
                    ->setStatusCode(200);
            }

        }else{
            return response()->json()->setStatusCode(403,'Edit employee failed.');
        }

    }

    public function add(AddCreateRequest $request){
        $user = new User($request->all());
       if ($user){
           $user->save();
           return response()->json($user)->setStatusCode(200);
       }else{
           return response()->json()->setStatusCode(403, 'Add employee failed');
       }
    }

    public function updateUser(Request $request, $id){
       $user = User::find($id);

       if ($user->role_id = 4){

           $user->update($request->all());
           return response()->json($user)->setStatusCode(200);
       }else{
           return response()->json()
               ->setStatusCode(403, 'Edit data failed');
       }
    }

    public function createGrade(ReviewCreateRequest $request){

       $userName = Auth::user()->id;
        $review = new Review($request->all());
       $review->user_id = $userName;
       $review->save();

       return response()->json($review)->setStatusCode(200);
    }
}
