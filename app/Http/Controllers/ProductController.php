<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductCreateRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        return Product::all();
    }

    public function create(ProductCreateRequest $request){
        $product = new Product($request->all());
       if ($product){
           $product->save();
           return response()
               ->json(ProductResource::make($product))
               ->setStatusCode(200);
       }else{
           return response()
               ->json()
               ->setStatusCode(403, 'Product add failed');
       }
    }

    public function update(ProductUpdateRequest $request, $id){
        $product = Product::find($id);
        if ($product){
            $product->update($request->all());
            return response()
                ->json(ProductUpdateRequest::make($product))
                ->setStatusCode(407);
        }else{
            return response()
                ->json()
                ->setStatusCode(403,'Product add failed.');
        }
    }

    public function delete($id){
        $product = Product::find($id);
        if ($product) {
            Product::destroy($id);
            return response()->json('Продукт удален')->setStatusCode(200);
        } else {
            return response()->json('Продукт не найден')->setStatusCode(404, 'Not found');
        }
    }
}
