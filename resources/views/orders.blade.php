@extends('layouts.master')
@section('title') {{'Orders'}} @endsection

@section('content')
    <?php
       $arr=[];
       $result =json_encode($arr);
        if(!empty($_GET['lang'])) {
            foreach($_GET['lang'] as $value){
                array_push($arr,$value);
            }
        }
       $result =json_encode($arr);
?>
 
    <div class="container" style="padding-top: 5%;line-height: 36px;">
        <div class="card-title mb-4">
            <h1 style="font-size: 25px; font-weight: bold;">Shopify Orders</h1>
        </div>
        <form method="get" action="orderid">
        <div class="row">
            <div class="card" style="box-shadow: 0px 0px 16px rgb(0 0 0 / 12%);">

                <div class="card-body">


                        <div class="row pt-2 pb-4 pl-2 " style="margin-left:0">
                            <input type="submit" style="width:117px" class="btn btn-success publish" id="publish" name="submit" value="Puslished"/>
                        </div>



                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Order #</th>
                                <th>Email</th>
                                <th>Created date</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach ($data as $key=>$data)
                                <tr>
                                    <td><input type="checkbox"  name="order_ids[]'" id="checkbox_id{{$key}}" value="{{$data['id']}}"/>&nbsp;</td>
                                    <td>{{ $data['order_number'] }}</td>
                                    <td>{{ $data['contact_email'] }}</td>
                                    <td>{{ \Carbon\Carbon::parse($data['created_at'])->format('d-M-Y') }}</td>
                                    <td>{{ $data['total_price'] }}</td>

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
        $(document).on('click', '#publish', function(e) {
            console.log($('input[name="lang"]:checked').serialize());
        });
    </script>
@endpush