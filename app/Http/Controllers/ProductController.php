<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $shop = Auth::user();
        $products = $shop->api()->rest('GET', "/admin/api/2022-04/products.json");
        // dd($products);

        $data = $products['body']->container['products'];
        return view('products', compact('data'));
    }
    public function getProductID(Request $request)
    {

        $total_products = implode(",", $request->products_ids);
        // dd($rest);
        $query = [
            'ids' => $total_products,
            'limit' => 250,
        ];
        $shop = Auth::user();
        $shopName = DB::table('users')->orderBy('id', 'desc')->where('name', $shop->name)->first();
        $shopData = DB::table('shops_otherdetails')->orderBy('id', 'desc')->where('shop_id', $shopName->id)->first();

        $product_api = $shop->api()->rest('GET', "/admin/api/2022-04/products.json", $query);
        $products = $product_api['body']['container']['products'];
        $array_t=array();
        $ch = curl_init();
        foreach ($products as $product) {
            
            $postdata['product_id'] = $product['id'];
            $postdata['name'] = $product['title'];
            $postdata['description'] = $product['handle'];
            $postdata['quantity'] = $product['variants'][0]['inventory_quantity'];
            $postdata['subtotal'] = $product['variants'][0]['price'];
            $postdata['total'] = $product['variants'][0]['price'];
            $postdata['price'] = $product['variants'][0]['price'];
            $postdata['weight'] = $product['variants'][0]['weight'];
            $postdata['subtotal_tax'] = $product['variants'][0]['weight'];
            if($product['variants'][0]['taxable']==true){
                $postdata['subtotal_tax'] = '1';
            }
            else{
                $postdata['subtotal_tax'] = '0';
            }
            $postdata['tax_class'] = '';
            if($product['variants'][0]['taxable']==true){
                $postdata['tax_status'] = 'taxable';
            }
            else{
                $postdata['tax_status'] = 'not taxable';
            }

            $array = [
                'products' =>  array($postdata),
            ];

          
            $array_t[] =  $postdata;
          
        }
        // $array = [
        //     'products' =>  array($array_t),
        // ];
        $array['products']=$array_t;
        // dd($array);
          $data = json_encode($array);
            $header = [
                'x-api-key:' . $shopData->identity,
                'Accept: application/json',
                'Content-Type: application/json',
                'Authorization: Bearer ' . $shopData->authentication,
            ];
            $ch = curl_init('https://senderum.com/api/vendors/sync/webhooks/shop/sync-products');
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_VERBOSE, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_HTTPHEADER,  $header);
            $output = curl_exec($ch);
            if (curl_errno($ch)) {
                $error_msg = curl_error($ch);
                print_r('r');
            }
            curl_close($ch);
            $output = json_decode($output);
            // dd($output);
            if($output->status==true){
                foreach ($products as $product){
                $save = Product::create([
                    'product_id' => $product['id'],
                    'api_id' => $output->products->{$product['id']},
    
                ]);
            }
                $save->save();
            }
       return redirect('products');
    }
    
    
}
