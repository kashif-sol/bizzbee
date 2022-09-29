<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
use Illuminate\Support\Facades\Auth;
use App\Models\shopifyData;
use App\Models\StoreDetails;
use DB;
use App\Http\Controllers\ShopifyHelper;

class Webhook extends Controller
{
    
    public function __construct()
    {
        
    }

    public function create()
    {
        
        $shops = DB::table('users')->orderBy('id', 'desc')->get();
        // dd($shops);
        foreach ($shops as $key => $shop) {

            $accessToken = $shop->password;
            $shopify_domain = $shop->name;

            $data["webhook"] = 
                array(
                    'topic' => 'orders/fulfilled',
                    'address' => env('APP_URL').'/webhook/orders/fulfilled'
                );

            $response = ShopifyHelper::shopify_call($accessToken , $shopify_domain , "/admin/webhooks.json",[], 'GET' );
            dd($response);

        }
            
    		/*
            $order = $this->shopify->call([
                'METHOD' => 'POST',
                'URL' => '/admin/orders/'.$orderId.'/cancel.json',
                // 'DATA' => json_encode($data)
                ]);
            return j
            */

    }

  

}