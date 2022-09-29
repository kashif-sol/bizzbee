<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
use OhMyBrew\ShopifyApp\Facades\ShopifyApp;
use App\Models\shopifyData;
use DB;
use Illuminate\Support\Facades\Log;
use Osiset\BasicShopifyAPI\BasicShopifyAPI;
use Osiset\BasicShopifyAPI\Options;
use Osiset\BasicShopifyAPI\Session;

// use RocketCode\Shopify\ShopifyServiceProvider;
class ShowSyncData extends Controller
{
    //
    private $shopData;
    public function __construct()
    {
        
    }
    public function show(){


    }

    public function order_fulfil_bb($order_data , $shopDoamin)
    {
        $shopName = DB::table('users')->orderBy('id', 'desc')->where('name', $shopDoamin)->first();
        $shopData = DB::table('shops_otherdetails')->orderBy('id', 'desc')->where('shop_id', $shopName->id)->first();
        $data = [
            'identity' => $shopData->identity,
            'authentication' => $shopData->authentication,
            'sonce' => $shopData->sonce,
            'order_id'=>$order_data->order_id,
            'order_status'=>'ship',
            'tracking_link'=>$order_data->tracking_url,
            'tracking_code'=>$order_data->tracking_number,
            'trackmethod'=>'Bizzybee API',
            ];
    
            $aPost = [
            'data' => json_encode($data)
            ];
           
            $ch = curl_init('https://bizzybee.ws/API/order/updatestatus');
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $aPost);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_VERBOSE, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            $output = curl_exec($ch);
            curl_close($ch);
            $output = json_decode($output);

            $device = new shopifyData();
            $device->data1 = $output->error;
            $device->data2 = $output->error;
    
            $device->response = "order fulfilled from shopify to bizybee apis";
            $device->save();
    }

    public function ordercancelled($order_data , $shopDoamin)
    {
        $shopName = DB::table('users')->orderBy('id', 'desc')->where('name', $shopDoamin)->first();
        $shopData = DB::table('shops_otherdetails')->orderBy('id', 'desc')->where('shop_id', $shopName->id)->first();
        $data = [
            'identity' => $shopData->identity,
            'authentication' => $shopData->authentication,
            'sonce' => $shopData->sonce,
            'order_id'=>$order_data->id,
            'order_status'=>'cancelled'
            ];
    
            $aPost = [
            'data' => json_encode($data)
            ];

            $ch = curl_init('https://bizzybee.ws/API/order/updatestatus');
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $aPost);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_VERBOSE, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            $output = curl_exec($ch);
            curl_close($ch);
            $output = json_decode($output);

            $device = new shopifyData();
            $device->data1 = $output->error;
            $device->data2 = $output->error;
            $device->response = "order cancelled from shopify to bizybee apis";
            $device->save();

    }


    public function ordersSync($data , $shopDoamin){
        $shopName = DB::table('users')->orderBy('id', 'desc')->where('name', $shopDoamin)->first();
        $shopData = DB::table('shops_otherdetails')->orderBy('id', 'desc')->where('shop_id', $shopName->id)->first();
        $ch = curl_init();
        $ordersData = $data;
		
		//mail('ankesh@internetbusinesssolutionsindia.com','Shopify Starting email Ankesh first',json_encode($ordersData));
		// if(empty($data->customer->first_name)){
			// continue;
		// }
		
		
        $customerId = $data->customer->id;
        $postdata[0]['id'] = $customerId;
        $postdata[0]['username'] = $data->customer->first_name;
        $postdata[0]['email'] = $data->customer->email;
        if(!empty( $data->customer->default_address->phone)){
            $postdata[0]['phone_no'] = $data->customer->default_address->phone;
        }else{
             $postdata[0]['phone_no'] = '';
        }
        
        $postdata[0]['address']['firstname'] = $data->customer->first_name;
        $postdata[0]['address']['lastname'] = $data->customer->last_name;
        $postdata[0]['address']['street'] = $data->customer->default_address->address1;
        $postdata[0]['address']['address-1'] = $data->customer->default_address->address1;
        if(!empty($data->customer->default_address->address2)){
            $postdata[0]['address']['address-2'] = $data->customer->default_address->address2;
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
			//mail('ankesh@internetbusinesssolutionsindia.com','Shopify Starting email Ankesh first',json_encode($ordersData));
			if(!empty($ordersData->customer->first_name) && $ordersData->financial_status=='paid'){
				//mail('ankesh@internetbusinesssolutionsindia.com','Shopify Starting email new if cancel',json_encode($ordersData));
				$this->createOrder($ordersData , $shopName->id);
			}elseif(!empty($ordersData->cancelled_at) && $ordersData->financial_status=='refunded'){
                $this->cancelOrder($ordersData , $shopName->id);
            }
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
		
       // mail('ankesh@internetbusinesssolutionsindia.com','Shopify Email new 2258',json_encode($data));
        /* MAIN CODE BEGIN */
            if(isset($data->refunds) && !empty($data->refunds)){
                
                $refund_line_item_ids = [];
                foreach ($data->refunds as $refund) {
                    if(isset($refund->refund_line_items) && !empty($refund->refund_line_items)){
                        foreach ($refund->refund_line_items as $refund_line_item) {
                            $refund_line_item_ids[] = $refund_line_item->line_item_id;
                        }
                    }
                }

                if(isset($data->line_items) && !empty($data->line_items)){
                    foreach ($data->line_items as $key => $line_item) {
                        if (in_array($line_item->id, $refund_line_item_ids)){
                            unset($data->line_items[$key]);
                        }
                            
                    }
                    $data->line_items = array_values($data->line_items);
                }
            }
    /* MAIN CODE END YOU CAN CHECK order_data VARIABLE BEFORE AND AFTER ORDER UPDATE */

		//mail('ankesh@internetbusinesssolutionsindia.com','Shopify Email new',json_encode($data->refund_line_items));
		
		$only_oneitem = '';
		$manuvel_array = array();
		$count = 0;
        foreach ($data->line_items as $items){ 
            
			if($shopData->sonce=='bd8569bdf9c5b3a2'){
				$sku = explode('-',$items->sku);
				if(!empty($sku['1'])){
					if($sku['0']=='bundel'){
						$itemsdata[$index]['sku'] = '8719326161327';
						$itemsdata[$index]['quantity'] = $items->quantity*$sku['1'];
						$itemsdata[$index]['price'] = '19.99';
						$itemsdata[$index]['name'] = $items->variant_title;
						$itemsdata[$index]['description'] = $items->title;
						$index++;
						 
						$itemsdata[$index]['sku'] = '8719326161389';
						$itemsdata[$index]['quantity'] = $items->quantity*$sku['1'];
						$itemsdata[$index]['price'] = '17.99';
						$itemsdata[$index]['name'] = $items->variant_title;
						$itemsdata[$index]['description'] = $items->title;
						$index++;
						
						$itemsdata[$index]['sku'] = '8719326161396';
						$itemsdata[$index]['quantity'] = $items->quantity*$sku['1'];
						$itemsdata[$index]['price'] = '19.99';
						$itemsdata[$index]['name'] = $items->variant_title;
						$itemsdata[$index]['description'] = $items->title;
						
					}else{
						$itemsdata[$index]['sku'] = $sku['0'];
						$itemsdata[$index]['quantity'] = $items->quantity*$sku['1'];
						$itemsdata[$index]['price'] = $items->price;
						$itemsdata[$index]['name'] = $items->variant_title;
						$itemsdata[$index]['description'] = $items->title;
					}
							
					
				}else{
						$itemsdata[$index]['sku'] = $items->sku;
						$itemsdata[$index]['quantity'] = $items->quantity;
						$itemsdata[$index]['price'] = $items->price;
						$itemsdata[$index]['name'] = $items->variant_title;
						$itemsdata[$index]['description'] = $items->title;
				}
				
			}else{
				$itemsdata[$index]['sku'] = $items->sku;
				$itemsdata[$index]['quantity'] = $items->quantity;
				$itemsdata[$index]['price'] = $items->price;
				$itemsdata[$index]['name'] = $items->variant_title;
				$itemsdata[$index]['description'] = $items->title;
			}
			
            $index++;
        }
		
		
		//mail('ankesh@internetbusinesssolutionsindia.com','Shopify Email item details',json_encode($itemsdata));
        //customer data
        $postdata['id'] = $customerId;
        $postdata['username'] = $data->customer->first_name;
        $postdata['email'] = $data->customer->email;
        if(!empty($data->customer->default_address->phone)){
            $postdata['phone_no'] = $data->customer->default_address->phone;
        }else{
            $postdata['phone_no'] = '';
        }
        
		$postdata['billing']['company'] = $data->shipping_address->company;
        $postdata['billing']['firstname'] = $data->customer->first_name;
        $postdata['billing']['lastname'] = $data->customer->last_name;
        $postdata['billing']['street'] = $data->customer->default_address->address1;
        $postdata['billing']['address-1'] = $data->customer->default_address->address1;
        if(!empty($data->customer->default_address->address2)){ 
            $postdata['billing']['address-2'] = $data->customer->default_address->address2;
        }else{
            $postdata['billing']['address-2']  = '';
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
            $postdata['shipping']['address-2'] = $data->shipping_address->address2;
        }else{
            $postdata['shipping']['address-2'] = '';
        }
        
        $postdata['shipping']['housenumber-addon'] = '';
        $postdata['shipping']['address-1'] = $data->shipping_address->address1;
        //$postdata['shipping']['address-2'] = '';
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
			if($data->shipping_lines[0]->title=='Extra (proof of postage)'){
				$parcel_type = 'PARCELLITE';
			}elseif($data->shipping_lines[0]->title=='Excellent (fully traceable delivery)'){
				$parcel_type = 'PARCELPLUS';
			}else{
				$parcel_type = "";
			}
		}else{
			$parcel_type = "";
		}

		//mail('ankesh@internetbusinesssolutionsindia.com','Shopify Email 33343',json_encode($data));
		
        $data = [
            'identity' => $shopData->identity,
            'authentication' => $shopData->authentication,
            'sonce' => $shopData->sonce,
            'order' => $data->id,
            'paid' => $data->total_price,
            ///'payment_method' => trim($shopData->payment_method),
            //'shipping_method' => trim($shopData->shipping_method),
           // 'parcel_type' => $parcel_type,
            'shop_type' => 'Shopify',
			'reference_no' => $data->order_number,
            'items' =>  (object) $itemsdata,
            'customer' => (object) $postdata
            ];
            // $this->logData($data);
            
           // $aPost['data'] =  json_encode($data);
           $aPost = [
            'data' =>  json_encode($data)
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
            Log::info('ORDERWEBHOOK' . $output);
            $output2 = json_decode($output,true);
            
            if($output2['error']){
                $this->logData($output2);
            }else{
                $this->logData($output2); //log file
            }
    }
        
    public function storeDevice($data , $shopDoamin){
        // mail('ankeshibs@gmail.com','Data 123', '25896'.json_encode($data));
        // $shop = ShopifyApp::shop(); 
        $shopName = DB::table('users')->orderBy('id', 'desc')->where('name', $shopDoamin)->first();
        $shopData = DB::table('shops_otherdetails')->orderBy('id', 'desc')->where('shop_id', $shopName->id)->first();
        $accessToken = $shopName->password;
        $shopDomain = $shopDoamin;
        $options = new Options();
        $options->setVersion('2022-04');
        $api = new BasicShopifyAPI($options);
        $api->setSession(new Session($shopDomain , $accessToken));
       
        $ch = curl_init();
		
		$counter = 0;
        $location_id = "";
		foreach($data->variants as $item){
			$postdata[$counter]['sku'] = $item->sku;
			$postdata[$counter]['ean_code'] = $item->barcode;
			$postdata[$counter]['brand'] = 'No brand';
			$postdata[$counter]['brandgroup'] = 'No brand';
			$postdata[$counter]['vatcode'] = '1';
			$postdata[$counter]['costprice'] = '';
			$postdata[$counter]['price'] = $item->price;
			$postdata[$counter]['description'] = $data->title.' '.$item->title;
			$postdata[$counter]['image'] = false;
            $inventory_item_id = $item->inventory_item_id;
            $locations = $api->rest('GET', '/admin/api/2022-07/inventory_levels.json',['inventory_item_ids'=>$inventory_item_id])['body']['inventory_levels'];
            foreach($locations as $location){
                $location_id = $location['location_id'] .",".$location_id;
            }
            $location_id = rtrim($location_id, ",");
            $postdata[$counter]['locationid'] = $location_id;
           
			$counter++;
		}

        
        
        $data = [
        'identity' => $shopData->identity,
        'authentication' => $shopData->authentication,
        'sonce' => $shopData->sonce,
        'items' => (object) $postdata
        ];

        
        $aPost = [
        'data' => json_encode($data)
        ];
        Log::info( json_encode( $data));
        //mail('ankeshibs@gmail.com','Data Item', json_encode($data));
        
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
        $output = json_decode($output,true);
        if($output['error']){
            $this->logData($output);
        }else{
            $this->logData($output); //log file
        }
 
    }

    public function cancelOrder($data , $shopId){
        
        $shopData = DB::table('shops_otherdetails')->orderBy('id', 'desc')->where('shop_id', $shopId)->first();

        $ch = curl_init();
                
        $data = [
        'identity' => $shopData->identity,
        'authentication' => $shopData->authentication,
        'sonce' => $shopData->sonce,
        'order_id'=> $data->id,
        'order_status' => 'cancelled'
        ];

        
        $aPost = [
        'data' => json_encode($data)
        ];
        
        //mail('ankeshibs@gmail.com','Data Item', json_encode($data));
        
        $username = 'dev';
        $password = 'dev';
        $ch = curl_init('https://bizzybee.ws/API/order/updatestatus');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $aPost);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_VERBOSE, true);
        // curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $output = curl_exec($ch);
        curl_close($ch);
        $output = json_decode($output,true);
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
