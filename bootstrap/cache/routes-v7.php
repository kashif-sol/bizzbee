<?php

/*
|--------------------------------------------------------------------------
| Load The Cached Routes
|--------------------------------------------------------------------------
|
| Here we will decode and unserialize the RouteCollection instance that
| holds all of the route information for an application. This allows
| us to instantaneously load the entire route map into the router.
|
*/

app('router')->setCompiledRoutes(
    array (
  'compiled' => 
  array (
    0 => false,
    1 => 
    array (
      '/sanctum/csrf-cookie' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::N4OrnRR6q7CPIZdl',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::9YPU9AXI1l6aqV5W',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/me' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::R3qJ6zHMY022lS1U',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/plans' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::l3F4MtuyyLZEkm0y',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'home',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/authenticate' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'authenticate',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/authenticate/token' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'authenticate.token',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/billing/usage-charge' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'billing.usage_charge',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::AyQphLPPrEsZfH1B',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/single-order' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::EsGDx8vpQAm0oiNw',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/home' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::WQreiOX9hRNX9YOf',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/testapi' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::hLvbdqFodJLjG1ch',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/verifyApi' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::MWTZxEhKyxoe7IoE',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/cancelorder' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::YkCzd1ecbJMVVwSq',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/fulfillorder' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::7YxMPTTJjfXqdaYN',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/stockorder' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::AYfL9x4MTdEi5VXd',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/orders' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'Orders',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/order_view' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::92tOMDqlURxcOu2q',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/orderid' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::6phFAxkuqtxYLoXy',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/products' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'products',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/productid' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::VoOrxjnXe4yM1JRa',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/webhook' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::J5A061i0R0C2AGac',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/customers/data_request' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::62RTef2q7LAif3IE',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/customers/redact' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::82BvW8MxSWDkIa2T',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/fulfillOrder' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'fulfillOrder',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/shop/redact' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::KnB2FKX7eIZtHk6G',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
    ),
    2 => 
    array (
      0 => '{^(?|/webhook/([^/]++)(*:24)|/billing(?|(?:/((?:[0-9]+|)))?(*:61)|/process(?:/((?:[0-9]+|)))?(*:95))|/fulfillmentorder/([^/]++)(*:129))/?$}sDu',
    ),
    3 => 
    array (
      24 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'webhook',
          ),
          1 => 
          array (
            0 => 'type',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      61 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'billing',
            'plan' => NULL,
          ),
          1 => 
          array (
            0 => 'plan',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      95 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'billing.process',
            'plan' => NULL,
          ),
          1 => 
          array (
            0 => 'plan',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      129 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'fulfillmentorder',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => NULL,
          1 => NULL,
          2 => NULL,
          3 => NULL,
          4 => false,
          5 => false,
          6 => 0,
        ),
      ),
    ),
    4 => NULL,
  ),
  'attributes' => 
  array (
    'generated::N4OrnRR6q7CPIZdl' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sanctum/csrf-cookie',
      'action' => 
      array (
        'uses' => 'Laravel\\Sanctum\\Http\\Controllers\\CsrfCookieController@show',
        'controller' => 'Laravel\\Sanctum\\Http\\Controllers\\CsrfCookieController@show',
        'namespace' => NULL,
        'prefix' => 'sanctum',
        'where' => 
        array (
        ),
        'middleware' => 
        array (
          0 => 'web',
        ),
        'as' => 'generated::N4OrnRR6q7CPIZdl',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::9YPU9AXI1l6aqV5W' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'verify.shopify',
        ),
        'uses' => 'Osiset\\ShopifyApp\\Http\\Controllers\\ApiController@index',
        'controller' => 'Osiset\\ShopifyApp\\Http\\Controllers\\ApiController@index',
        'namespace' => NULL,
        'prefix' => '/api',
        'where' => 
        array (
        ),
        'as' => 'generated::9YPU9AXI1l6aqV5W',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::R3qJ6zHMY022lS1U' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/me',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'verify.shopify',
        ),
        'uses' => 'Osiset\\ShopifyApp\\Http\\Controllers\\ApiController@getSelf',
        'controller' => 'Osiset\\ShopifyApp\\Http\\Controllers\\ApiController@getSelf',
        'namespace' => NULL,
        'prefix' => '/api',
        'where' => 
        array (
        ),
        'as' => 'generated::R3qJ6zHMY022lS1U',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::l3F4MtuyyLZEkm0y' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/plans',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'verify.shopify',
        ),
        'uses' => 'Osiset\\ShopifyApp\\Http\\Controllers\\ApiController@getPlans',
        'controller' => 'Osiset\\ShopifyApp\\Http\\Controllers\\ApiController@getPlans',
        'namespace' => NULL,
        'prefix' => '/api',
        'where' => 
        array (
        ),
        'as' => 'generated::l3F4MtuyyLZEkm0y',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'webhook' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'webhook/{type}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth.webhook',
        ),
        'uses' => 'Osiset\\ShopifyApp\\Http\\Controllers\\WebhookController@handle',
        'controller' => 'Osiset\\ShopifyApp\\Http\\Controllers\\WebhookController@handle',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'webhook',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'home' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '/',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'verify.shopify',
        ),
        'uses' => 'App\\Http\\Controllers\\ShopController@getData',
        'controller' => 'App\\Http\\Controllers\\ShopController@getData',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'home',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'authenticate' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'authenticate',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Osiset\\ShopifyApp\\Http\\Controllers\\AuthController@authenticate',
        'controller' => 'Osiset\\ShopifyApp\\Http\\Controllers\\AuthController@authenticate',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'authenticate',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'authenticate.token' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'authenticate/token',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'verify.shopify',
        ),
        'uses' => 'Osiset\\ShopifyApp\\Http\\Controllers\\AuthController@token',
        'controller' => 'Osiset\\ShopifyApp\\Http\\Controllers\\AuthController@token',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'authenticate.token',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'billing' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'billing/{plan?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'verify.shopify',
        ),
        'uses' => 'Osiset\\ShopifyApp\\Http\\Controllers\\BillingController@index',
        'controller' => 'Osiset\\ShopifyApp\\Http\\Controllers\\BillingController@index',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'billing',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
        'plan' => '^([0-9]+|)$',
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'billing.process' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'billing/process/{plan?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'verify.shopify',
        ),
        'uses' => 'Osiset\\ShopifyApp\\Http\\Controllers\\BillingController@process',
        'controller' => 'Osiset\\ShopifyApp\\Http\\Controllers\\BillingController@process',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'billing.process',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
        'plan' => '^([0-9]+|)$',
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'billing.usage_charge' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'billing/usage-charge',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'verify.shopify',
        ),
        'uses' => 'Osiset\\ShopifyApp\\Http\\Controllers\\BillingController@usageCharge',
        'controller' => 'Osiset\\ShopifyApp\\Http\\Controllers\\BillingController@usageCharge',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'billing.usage_charge',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::AyQphLPPrEsZfH1B' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/user',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
        ),
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:303:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:85:"function (\\Illuminate\\Http\\Request $request) {
    return $request->user();
    
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"0000000046415b780000000054395106";}";s:4:"hash";s:44:"os3PXBI/OFRla1ncEyytrOs5ohrIQoA8dvti/k9KOoM=";}}',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::AyQphLPPrEsZfH1B',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::EsGDx8vpQAm0oiNw' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/single-order',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\OrderController@single_order',
        'controller' => 'App\\Http\\Controllers\\OrderController@single_order',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::EsGDx8vpQAm0oiNw',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::WQreiOX9hRNX9YOf' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'home',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\ShowSyncData@show',
        'controller' => 'App\\Http\\Controllers\\ShowSyncData@show',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::WQreiOX9hRNX9YOf',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::hLvbdqFodJLjG1ch' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'testapi',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\ShowSyncData@testApiCall',
        'controller' => 'App\\Http\\Controllers\\ShowSyncData@testApiCall',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::hLvbdqFodJLjG1ch',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::MWTZxEhKyxoe7IoE' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'verifyApi',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\VerifyController@verifyData',
        'controller' => 'App\\Http\\Controllers\\VerifyController@verifyData',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::MWTZxEhKyxoe7IoE',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::YkCzd1ecbJMVVwSq' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'cancelorder',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\OrderStatusController@cancelOrder',
        'controller' => 'App\\Http\\Controllers\\OrderStatusController@cancelOrder',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::YkCzd1ecbJMVVwSq',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::7YxMPTTJjfXqdaYN' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'fulfillorder',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\OrderStatusController@fulfillOrder',
        'controller' => 'App\\Http\\Controllers\\OrderStatusController@fulfillOrder',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::7YxMPTTJjfXqdaYN',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::AYfL9x4MTdEi5VXd' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'stockorder',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\OrderStatusController@stockOrder',
        'controller' => 'App\\Http\\Controllers\\OrderStatusController@stockOrder',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::AYfL9x4MTdEi5VXd',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'Orders' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'orders',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'verify.shopify',
        ),
        'uses' => 'App\\Http\\Controllers\\OrderController@index',
        'controller' => 'App\\Http\\Controllers\\OrderController@index',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'Orders',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::92tOMDqlURxcOu2q' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'order_view',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'verify.shopify',
        ),
        'uses' => 'App\\Http\\Controllers\\OrderController@order_view',
        'controller' => 'App\\Http\\Controllers\\OrderController@order_view',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::92tOMDqlURxcOu2q',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::6phFAxkuqtxYLoXy' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'orderid',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'verify.shopify',
        ),
        'uses' => 'App\\Http\\Controllers\\OrderController@getOrderID',
        'controller' => 'App\\Http\\Controllers\\OrderController@getOrderID',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::6phFAxkuqtxYLoXy',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'products' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'products',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'verify.shopify',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductController@index',
        'controller' => 'App\\Http\\Controllers\\ProductController@index',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'products',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::VoOrxjnXe4yM1JRa' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'productid',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'verify.shopify',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductController@getProductID',
        'controller' => 'App\\Http\\Controllers\\ProductController@getProductID',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::VoOrxjnXe4yM1JRa',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'fulfillmentorder' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'fulfillmentorder/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'verify.shopify',
        ),
        'uses' => 'App\\Http\\Controllers\\OrderController@fulfillmentorder',
        'controller' => 'App\\Http\\Controllers\\OrderController@fulfillmentorder',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'fulfillmentorder',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::J5A061i0R0C2AGac' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'webhook',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Webhook@create',
        'controller' => 'App\\Http\\Controllers\\Webhook@create',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::J5A061i0R0C2AGac',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::62RTef2q7LAif3IE' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'customers/data_request',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:240:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:22:"function () {
    
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"0000000046415b470000000054395106";}";s:4:"hash";s:44:"rvAA2jQCaEiFVs7o5RES4B7bUlEqlS8R1bsu2dzgZOA=";}}',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::62RTef2q7LAif3IE',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::82BvW8MxSWDkIa2T' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'customers/redact',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:240:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:22:"function () {
    
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"0000000046415b450000000054395106";}";s:4:"hash";s:44:"qQR15q3UacSzckLlaD5LeDCU68opDx1WQtk+Fc0zHYI=";}}',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::82BvW8MxSWDkIa2T',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'fulfillOrder' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'fulfillOrder',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\OrderController@fulfillOrder',
        'controller' => 'App\\Http\\Controllers\\OrderController@fulfillOrder',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'fulfillOrder',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::KnB2FKX7eIZtHk6G' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'shop/redact',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:240:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:22:"function () {
    
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"0000000046415b420000000054395106";}";s:4:"hash";s:44:"o2s46nj7WoZ4nP57W/ikX6aEUu6/ik66bE+7AMf4OJE=";}}',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::KnB2FKX7eIZtHk6G',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
  ),
)
);
