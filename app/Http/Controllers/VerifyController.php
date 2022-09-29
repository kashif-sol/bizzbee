<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\StoreDetails;
use Illuminate\Support\Facades\Http;

class VerifyController extends Controller
{
  //

  public function verifyData(Request $request)
  {


    $req = $request->all();
    

    $shop = User::find($req['shop_id']);
 
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => config('app.vendor_api'),
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_SSL_VERIFYHOST => 0,
      CURLOPT_SSL_VERIFYPEER => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => array('domain'=>$shop->name),
      CURLOPT_HTTPHEADER => array(
        'Accept: application/json',
        'x-api-key: ' .$req['apiKey'],
        'Authorization: Bearer '.$req['token'],
      ),
    ));

    $response = curl_exec($curl);
    curl_exec($curl);
    if (curl_errno($curl)) {
        $error_msg = curl_error($curl);
    }
    curl_close($curl);

    
    
    if (!$response==false) {
      $storeDet = StoreDetails::firstOrNew(array('identity' => $req['apiKey']));
      $storeDet->identity = $req['apiKey'];
      $storeDet->authentication = $req['token'];
      $storeDet->sonce = 'null';

      $storeDet->shop_id = $shop->id;
      $storeDet->save();
      return array('response' => true, 'msg' => 'Verified');
    } else {
      return array('response' => false, 'msg' => 'not Verified');
    }
  }
}
