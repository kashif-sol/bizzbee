<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
use App\Models\User;
use App\Models\shopifyData;
use App\Models\StoreDetails;
use DB;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    
    public function __construct()
    {
        
    }

    public function getData(){
        $shop = Auth::user();
        $data = DB::table('shops_otherdetails')->orderBy('id', 'desc')->where('shop_id', $shop->id)->first();
        
        //DB::statement("UPDATE shops SET shopify_domain = '222tiptopdeal-nl.myshopify.com' where id = '15'");
        //
        //$results = DB::select( DB::raw("SELECT * FROM shops WHERE id = '15'") );
        //
        //echo "<pre>";
        //print_r($results);
       
        return view('welcome')->with('data' , $data);
    
    
    }

}