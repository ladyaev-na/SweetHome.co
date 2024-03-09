<?php

namespace App\Http\Controllers;

use App\Exceptions\AoiException;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(LoginRequest $request){
        $credentials = request(['login','password']);

       if ($credentials){
           if (!Auth::attempt($credentials)){
               throw new AoiException(401,'Authentication failed');
           }

           $user = Auth::user();
           $user->api_token = Hash::make(microtime(true)*1000);
           $user->save();

           return response()->json($user->api_token)->setStatusCode(200);
       }else{
           return response()->json()->setStatusCode(401, 'Authentication failed');
       }
    }

    public function logout(Request $request){
        $user = $request->user();
        $user->api_token = null;
        $user->save();
        return response()->json('Выход')->setStatusCode('logout');
    }
}
