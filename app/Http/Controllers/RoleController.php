<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleCreateRequest;
use App\Http\Resources\RoleResource;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index(){
        $roles = Role::all();
        return response()->json(RoleResource::collection($roles));
    }

    public function create(RoleCreateRequest $request){
        $role = new Role($request->all());
        $role->save();
        return response()->json($role)->setStatusCode(200,'ok');
    }
}
