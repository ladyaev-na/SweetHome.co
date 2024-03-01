<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryCreateRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return response()->json($categories);
    }

    public function create(CategoryCreateRequest $request){
        $category = new Category($request->all());
        $category->save();
        return response()->json($category )->setStatusCode(200,'ok');
    }
}
