<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
use OhMyBrew\ShopifyApp\Facades\ShopifyApp;
use App\shopifyData;
use DB;
// use RocketCode\Shopify\ShopifyServiceProvider;
class ShowSyncData extends Controller
{
    //
    private $shopData;
    public function __construct()
    {
        
    }
    public function show(){

        $curl = curl_init();

curl_setopt_array($curl, array(
CURLOPT_URL => "https://k.shopifyapplications.com/cancelorder",
CURLOPT_RETURNTRANSFER => true,
CURLOPT_ENCODING => "",
CURLOPT_MAXREDIRS => 10,
CURLOPT_TIMEOUT => 30,
CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
CURLOPT_CUSTOMREQUEST => "POST",
CURLOPT_POSTFIELDS => "{\n\t\"shopDoamin\": \"development07.myshopify.com\",\n\t\"orderId\": \"1178375880747\"\n}\n",
CURLOPT_HTTPHEADER => array(
"Accept: */*",
"Accept-Encoding: gzip, deflate",
"Cache-Control: no-cache",
"Connection: keep-alive",
"Content-Length: 78",
"Content-Type: application/json",
"Cookie: laravel_session=eyJpdiI6Im5jTEJ3MFpNWEdld3ZTZ0VzVlZldGc9PSIsInZhbHVlIjoiODBRQ3F6angyS1VwQmZtZllhRlJDdW5DV1NIOFB1bFpxelwvb2xqVndOVGFUN2gyVXJUaUFWU0pSZVRIZGFYcjIiLCJtYWMiOiI0ZWI1NjFjNmE3ODZhZjU5NWQzNWE5YjRkZmQzNmRhZWQ4ZjEwNTY4NjE5ZWFlMGE3NDcyZGI5OGNmY2E5NzAxIn0%3D; XSRF-TOKEN=eyJpdiI6IjFYN3VhUWR1a3FmWnZ0N1NPM0xRa1E9PSIsInZhbHVlIjoicnlGYTJCU3lPWUV0djRnNmRrQXhMYU9MTjEzUDBwRk4raFBIZ2pFOEh3bWN3bFNwQmtcLzJVUlJJVnFsRFFYeE0iLCJtYWMiOiI4NTgzZmYwYzNlZjQzOGYyMjY1OWVhYjI5NTgyOTY5ZDg0ZDQ2ZjQxNTYzN2U1YWMxOTI2NGU2MDVjNjhhOTc5In0%3D",
"Host: k.shopifyapplications.com",
"Postman-Token: edb01171-f986-4907-b83d-2fbfd0785041,e1d480f9-cc4b-4cf5-9365-d867b7059da2",
"User-Agent: PostmanRuntime/7.15.2",
"cache-control: no-cache"
),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
echo "cURL Error #:" . $err;
} else {
echo $response;
}
    }



    public function ordersSync($data , $shopDoamin){
        $shopName = DB::table('shops')->orderBy('id', 'desc')->where('shopify_domain', $shopDoamin)->first();
        $shopData = DB::table('shops_otherdetails')->orderBy('id', 'desc')->where('shop_id', $shopName->id)->first();
        $ch = curl_init();
        $ordersData = $data;
        $customerId = $data->customer->id;
        $postdata[0]['id'] = $customerId;
        $postdata[0]['username'] = $data->customer->first_name;
        $postdata[0]['email'] = $data->customer->email;
        if(!empty( $data->customer->default_address->phone)){
            $postdata[0]['phone_no'] = $data->customer->default_address->phone;
        }else{
             $postdata[0]['phone_no'] = '';
        }
        mail('ankesh@internetbusinesssolutionsindia.com','Shopify Email new 44444',json_encode($ordersData));
        $postdata[0]['address']['firstname'] = $data->customer->first_name;
        $postdata[0]['address']['lastname'] = $data->customer->last_name;
        $postdata[0]['address']['street'] = $data->customer->default_address->address1;
        $postdata[0]['address']['address-1'] = $data->customer->default_address->address1;
        if(!empty($data->customer->default_address->address2)){
            $postdata[0]['address']['housenumber'] = $data->customer->default_address->address2;
        }else{
            $postdata[0]['address']['housenumber'] = '';
        }
        
        $postdata[0]['address']['housenumber-addon'] = '';
        $postdata[0]['address']['city'] = $data->customer->default_address->city;
        $postdata[0]['address']['zip'] = $data->customer->default_address->zip;
        $postdata['shipping']['country'] = $data->shipping_address->country_code;
        //$postdata[0]['address']['country'] = $data->customer->default_address->country_code;
        
        if(!empty($data->customer->default_address->phone)){
           $postdata[0]['address']['phone_no'] = $data->customer->default_address->phone;
        }else{
            $postdata[0]['address']['phone_no'] = '';
        }

        
        $data = [
            'identity' => $shopData->identity,
            'authentication' => $shopData->authentication,
            'sonce' => $shopData->sonce,
            'customers' => (object) $postdata
            ];
    
            $aPost = [
            'data' => json_encode($data)
            ];

        // //    print_r($aPost);die;
            $username = 'dev';
            $password = 'dev';
            $ch = curl_init('https://bizzybee.ws/API/customer/sync');
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $aPost);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_VERBOSE, true);
            // curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            $output = curl_exec($ch);
            curl_close($ch);
            $output = json_decode($output);

            $device = new shopifyData();
            $device->data1 = $output->error;
            $device->data2 = $output->error;
            $device->response = "customer created";
            $device->save();

            $this->createOrder($ordersData , $shopName->id);
    }

    public function createOrder($data , $shopId){
        
        $shopData = DB::table('shops_otherdetails')->orderBy('id', 'desc')->where('shop_id', $shopId)->first();
        $ch = curl_init();
        $customerId = $data->customer->id;
        $itemsdata =array();
        $postdata =array();
        $shippingdata =array();
        //items data
        $index = 0;
		
		//mail('ankesh@internetbusinesssolutionsindia.com','Shopify Email',json_encode($data));
		
		
        foreach ($data->line_items as $items){ 
            $itemsdata[$index]['name'] = $items->variant_title;
            $itemsdata[$index]['price'] = $items->price;
            $itemsdata[$index]['sku'] = $items->sku;
            $itemsdata[$index]['quantity'] = $items->quantity;
            $itemsdata[$index]['description'] = $items->title;
            $index++;
        }
        //customer data
        $postdata['id'] = $customerId;
        $postdata['username'] = $data->customer->first_name;
        $postdata['email'] = $data->customer->email;
        if(!empty($data->customer->default_address->phone)){
            $postdata['phone_no'] = $data->customer->default_address->phone;
        }else{
            $postdata['phone_no'] = '';
        }
        
		$postdata['billing']['company'] = $data->default_address->company;
        $postdata['billing']['firstname'] = $data->customer->first_name;
        $postdata['billing']['lastname'] = $data->customer->last_name;
        $postdata['billing']['street'] = $data->customer->default_address->address1;
        $postdata['billing']['address-1'] = $data->customer->default_address->address1;
        if(!empty($data->customer->default_address->address2)){ 
            $postdata['billing']['housenumber'] = $data->customer->default_address->address2;
        }else{
            $postdata['billing']['housenumber']  = '';
        }
        $postdata['billing']['housenumber-addon'] = '';
        $postdata['billing']['city'] = $data->customer->default_address->city;
        if(empty($data->customer->default_address->zip) && $data->customer->default_address->country_code== 'IE'){
            $postdata['billing']['zip'] = '5555 555 555';
        }else{
            $postdata['billing']['zip'] = $data->customer->default_address->zip;
        }
        
        $postdata['billing']['country'] = $data->customer->default_address->country_code;
         if(!empty($data->shipping_address->phone)){
            $postdata['billing']['phone_no'] = $data->customer->default_address->phone;
        }else{
            $postdata['billing']['phone_no'] = '';
        }
        
        //shipping data
		$postdata['shipping']['company'] = $data->shipping_address->company;
        $postdata['shipping']['firstname'] = $data->shipping_address->first_name;
        $postdata['shipping']['lastname'] = $data->shipping_address->last_name;
        $postdata['shipping']['street'] = $data->shipping_address->address1;
        if(!empty($data->shipping_address->address2)){
            $postdata['shipping']['housenumber'] = $data->shipping_address->address2;
        }else{
            $postdata['shipping']['housenumber'] = '';
        }
        
        $postdata['shipping']['housenumber-addon'] = '';
        $postdata['shipping']['address-1'] = $data->shipping_address->address1;
        $postdata['shipping']['address-2'] = '';
        $postdata['shipping']['address-3'] = '';
        $postdata['shipping']['city'] = $data->shipping_address->city;
        if(empty($data->shipping_address->zip) && $data->shipping_address->country_code=='IE'){
            $postdata['shipping']['zip'] = '5555 555 555';
        }else{
            $postdata['shipping']['zip'] = $data->shipping_address->zip;
        }
        
        $postdata['shipping']['country'] = $data->shipping_address->country_code;
        
        if(!empty($data->shipping_address->phone)){
            $postdata['shipping']['phone_no'] = $data->shipping_address->phone;
        }else{
            $postdata['shipping']['phone_no'] = '';
        }
        
		if($shopData->sonce=='3bc042b57daa98c5'){
			if($data->shipping_lines[0]->title=='Postal delivery with tracking code'){
				$parcel_type = 'PARCELPLUS';
			}elseif($data->shipping_lines[0]->title=='Proof of postage'){
				$parcel_type = 'PARCELLITE';
			}elseif($data->shipping_lines[0]->title=='Fully traceable delivery'){
				$parcel_type = 'PARCELPREMIUM';
			}else{
				$parcel_type = $shopData->parcel_type;
			}
		}else{
			$parcel_type = $shopData->parcel_type;
		}

        $data = [
            'identity' => $shopData->identity,
            'authentication' => $shopData->authentication,
            'sonce' => $shopData->sonce,
            'order' => $data->id,
            'paid' => $data->total_price,
            'payment_method' => trim($shopData->payment_method),
            'shipping_method' => trim($shopData->shipping_method),
            'parcel_type' => $parcel_type,
            'shop_type' => 'Shopify',
            'items' =>  (object) $itemsdata,
            'customer' => (object) $postdata
            ];
            // $this->logData($data);
            
            $aPost = [
            'data' => json_encode($data)
            ];
        
        
            $username = 'dev';
            $password = 'dev';
            $ch = curl_init('https://bizzybee.ws/API/order/add');
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $aPost);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_VERBOSE, true);
            // curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            $output = curl_exec($ch);
            curl_close($ch);
            $output = json_decode($output);
            if($output['error']){
                $this->logData($output);
            }else{
                $this->logData($output); //log file
            }

    }
        
    public function storeDevice($data , $shopDoamin){
         //mail('ankeshibs@gmail.com','Data 123', '25896');
        // $shop = ShopifyApp::shop(); 
        $shopName = DB::table('shops')->orderBy('id', 'desc')->where('shopify_domain', $shopDoamin)->first();
        $shopData = DB::table('shops_otherdetails')->orderBy('id', 'desc')->where('shop_id', $shopName->id)->first();
        $ch = curl_init();
        $postdata[0]['sku'] = $data->variants[0]->sku;
        $postdata[0]['ean_code'] = $data->variants[0]->barcode;
        $postdata[0]['brand'] = 'No brand';
        $postdata[0]['brandgroup'] = 'No brand';
        $postdata[0]['vatcode'] = '1';
        $postdata[0]['costprice'] = '';
        $postdata[0]['price'] = $data->variants[0]->price;
        $postdata[0]['description'] = $data->title;
        $postdata[0]['image'] = false;

        
        $data = [
        'identity' => $shopData->identity,
        'authentication' => $shopData->authentication,
        'sonce' => $shopData->sonce,
        'items' => (object) $postdata
        ];

        
        $aPost = [
        'data' => json_encode($data)
        ];
        
       // mail('ankeshibs@gmail.com','Data', json_encode($data));
        
        $username = 'dev';
        $password = 'dev';
        $ch = curl_init('https://bizzybee.ws/API/product/sync');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $aPost);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_VERBOSE, true);
        // curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $output = curl_exec($ch);
        curl_close($ch);
        $output = json_decode($output);
        if($output['error']){
            $this->logData($output);
        }else{
            $this->logData($output); //log file
        }
 
    }

    public function logData($data){
        $data = json_encode($data);
        $file = time() . '_file.json';
        $destinationPath=public_path()."/upload/json/";
        if (!is_dir($destinationPath)) {  mkdir($destinationPath,0777,true);  }
        File::put($destinationPath.$file,$data);
    }

}
