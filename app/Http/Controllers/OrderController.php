<?php

namespace App\Http\Controllers;

use App\Http\Requests\StatusUpdateRequest;
use App\Http\Resources\OrderListResource;
use App\Http\Resources\UserAddress;
use App\Models\OrderList;

class OrderController extends Controller
{
    public function index(){
        $orderList = OrderList::all();
        return response()->json(OrderListResource::collection($orderList));
    }

    public function update(StatusUpdateRequest $request, $id){
        $order = OrderList::find($id);
        if ($order){
            $order->update($request->all());
            return response()->json(OrderListResource::make($order))->setStatusCode(200);
        }else{
            return response()->json()->setStatusCode(407,'Product add failed.');
        }
    }

    public function show($id){
        $orderList = OrderList::find($id);
        return response()->json(UserAddress::make($orderList))->setStatusCode(200);
    }

    public function AddList(){

    }
}
