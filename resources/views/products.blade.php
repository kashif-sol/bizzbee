@extends('layouts.master')
@section('title') {{'Products'}} @endsection
@section('content')

    <?php
   $arr=[];
   $result =json_encode($arr);
// if(isset($_GET['submit'])){
    
    if(!empty($_GET['lang'])) {

        foreach($_GET['lang'] as $value){
            // echo "value : ".$value.'<br/>';
            array_push($arr,$value);
        }
    
    }
    // dd($arr);
  
   
   $result =json_encode($arr);
//    dd($result);

?>

    <div class="container" style="padding-top: 5%;line-height: 36px;">
        <div class="card-title mb-4">
            <h1 style="font-size: 25px; font-weight: bold;">Shopify Products</h1>
        </div>
        
<form method="get" action="productid">
        <div class="row">
            <div class="card" style="box-shadow: 0px 0px 16px rgb(0 0 0 / 12%);">
                <div class="card-body">

                    <div class="row pt-2 pb-4 pl-2" style="margin-left:0">
                        <input type="submit" style="width:117px" class="btn btn-success" name="submit" value="Published"/>
                    </div>
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Name</th>
                                <th>Vendor</th>
                                <th>Type</th>
                                <th>status</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach ($data as $key=>$data)
                                <tr>
                                    <td><input type="checkbox"  name="products_ids[]'" id="checkbox_id{{$key}}" value="{{$data['id']}}"/>&nbsp;</td>
                                    <td>{{ $data['title'] }}</td>
                                    <td>{{ $data['vendor'] }}</td>
                                    <td>{{ $data['product_type'] }}</td>
                                    <td>{{ $data['status'] }}</td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </form>
    </div>

@endsection
@push('scripts')
    <script>
        console.log($('input[name="lang"]:checked').serialize());
    </script>
@endpush
