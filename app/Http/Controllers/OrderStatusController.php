<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
use Illuminate\Support\Facades\Auth;
use App\Models\shopifyData;
use App\Models\StoreDetails;
use DB;
use Osiset\BasicShopifyAPI\BasicShopifyAPI;
use Osiset\BasicShopifyAPI\Options;
use Osiset\BasicShopifyAPI\Session;



class OrderStatusController extends Controller
{
    //

    public function cancelOrder(Request $request)
    {
        
            $shopData = DB::table('users')->orderBy('id', 'desc')->where('name', $request->shopDoamin)->first();
            $accessToken = $shopData->password;
            $shopDomain = $request->shopDoamin;
            $orderId = $request->orderId;
            $options = new Options();
            $options->setVersion('2022-04');
            $api = new BasicShopifyAPI($options);
            $api->setSession(new Session($shopDomain , $accessToken));
            $response = $api->rest('POST', '/admin/orders/'.$orderId.'/cancel.json');  
            return json_encode( $response);
    }
    
    public function fulfillOrder(Request $request)
    {
           
            $shopData = DB::table('users')->orderBy('id', 'desc')->where('name', $request->shopDomain)->first();
           
            if(empty($shopData) || $shopData == "")
            {
                return true;
            }
            $accessToken = $shopData->password;
            $shopDomain = $request->shopDomain;
            $orderId = "gid://shopify/Order/" . $request->orderId;
            $tracking_link = urldecode($request->tracking_link);
            $options = new Options();
            $options->setVersion('2022-04');
            $api = new BasicShopifyAPI($options);
            $api->setSession(new Session($shopDomain , $accessToken));
            $result = $api->rest('GET', '/admin/api/2022-04/shop.json');  
            if($result['status'] == "200")
            {
                $location_id = $result['body']['container']['shop']['primary_location_id'];
            }else{
                return json_encode( array("error" , true , "message" => "There is error when try to get shop location.")); 
            }
           
           
			if($request->trackmethod=='B2CMASKB'){
				$request->trackmethod = 'Covid-Safety';
			}

             
            $fulfilemtnQuery = '{
                order(id:"'.$orderId.'") {
                    fulfillmentOrders (first:10) {
                      edges {
                        node {
                          id
                        }
                      }
                    }
                  }
                }';

            $result = $api->graph($fulfilemtnQuery);
         
            if(count($result['body']['container']['data']['order']['fulfillmentOrders']) > 0)
            {
               
            $fulfilmentOorderId = $result['body']['container']['data']['order']['fulfillmentOrders']['edges'][0]['node']['id'];
              
           
            $query = 'mutation fulfillmentCreateV2($fulfillment: FulfillmentV2Input!) {
                fulfillmentCreateV2(fulfillment: $fulfillment) {
                  fulfillment {
                    id
                    trackingInfo{
                        company
                        number
                        url
                    }
                  }
                  userErrors {
                    field
                    message
                  }
                }
              }
              ';    
               
            $variable['fulfillment'] = array(
                "lineItemsByFulfillmentOrder" => array(
                    "fulfillmentOrderId"=> $fulfilmentOorderId,
                    
                ),
                "notifyCustomer"=> false,
                "trackingInfo" => array(
                    "company"=> $request->trackmethod,
                    "number"=> $request->trackcode,
                    "url"=> $tracking_link  //"https://johns-apparel.myshopify.com"
                )
            );

           
            $result = $api->graph( $query,$variable);                                                                               
            return $result;
        }
    }
    
    
    public function stockOrder(Request $request)
    {

        $shopData = DB::table('users')->orderBy('id', 'desc')->where('name', $request->shopDoamin)->first();
        $accessToken = $shopData->password;
        $shopDomain = $request->shopDoamin;
        $stock_updated = false;
        $product_sku = $request->sku;
        $new_stock = $request->stock;
        $options = new Options();
        $options->setVersion('2022-04');
        $api = new BasicShopifyAPI($options);
        $api->setSession(new Session($shopDomain , $accessToken));
        $result = $api->rest('GET', '/admin/api/2022-04/products.json' , ['sku' => $product_sku]); 
        $products = $result['body']['container']['products'];
           if(isset($products)){
           
            
                foreach($products as $product){
                    foreach($product['variants'] as $variant){
                        if($variant['sku']==$product_sku){
                            $inventory_item_id = '';
                            $inventory_item_id =  $variant['inventory_item_id'];
                          
                            if($inventory_item_id!=''){
                                $result3 = $api->rest('GET', '/admin/api/2022-04/inventory_levels.json' , ['inventory_item_ids' => $inventory_item_id]); 
                                $inv_levels = $result3['body']['container']['inventory_levels'];
								
                                if(isset($inv_levels)){
                                    foreach($inv_levels as $inventory){
                                        $inventory_item_id = '';
                                        $location_id = '';
										$location_id = $inventory['location_id'];
                                        $inventory_item_id = $inventory['inventory_item_id'];
                                        if($inventory_item_id!='' && $location_id!=''){
                                            $data = array("location_id"=>$location_id, "inventory_item_id"=>$inventory_item_id,'available'=>$new_stock);
                                            $result_inv = $api->rest('POST', '/admin/api/2022-04/inventory_levels/set.json' , $data); 
                                            if($result_inv['errors'] == false)
                                            {
                                                $stock_updated = true;
                                            }
                                            break;
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
           }

           if( $stock_updated)
           {
            $arr = array(
                "status" => "success",
                "message" => "Stock updated"
            );
           }else{
            $arr = array(
                "status" => "error",
                "message" => "Stock not updated"
            );
           }
           
       return  $arr;
    }
    
    

}