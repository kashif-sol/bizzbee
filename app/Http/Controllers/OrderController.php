<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $shop = Auth::user();
        // $orders = $shop->api()->rest('GET','/admin/api/2022-10/orders.json?status=any');
        $orders = $shop->api()->rest('GET', "/admin/api/2021-04/orders.json", ["fields" => "id,order_number,contact_email,created_at,total_price"]);
        // dd($orders);    
        // dd($orders['body']->container['orders']);
        $data = $orders['body']->container['orders'];
        // dd($data);
        return view('orders', compact('data'));
    }
    public function getOrders()
    {
        $shop = Auth::user();
        
        $data = $shop->api()->rest('GET', '/admin/api/2022-10/orders.json?status=any');
        dd($data->conatiner);
    }
    public function getOrderID(Request $request, $arr = [])
    {

        $result = json_decode($arr);
        // dd($result[0]);
        $shop = Auth::user();
        // dd(implode(",",$result));
       $rest=implode(",",$result);
    //    dd($rest);
        $query=[
            'ids' => $rest,
            'limit'=>250,
        ];
        $orders = $shop->api()->rest('GET',"/admin/api/2021-04/orders.json", $query);
        dd($orders);
        // return view('order-id',compact($result));


    }
}
