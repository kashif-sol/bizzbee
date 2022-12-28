@extends('layouts.master')
@section('title') {{'Home'}} @endsection
@push('styles')
    <style>
        .card-body input {
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #dfdfdf;
            height: 35px;
            width: :90%;
        }

        .card {
            width: 100%;
            background: #FFFCFC;
            box-shadow: 0px 0px 16px rgba(0, 0, 0, 0.12);
            border-radius: 15px;
        }

        .card-body .form-inline {
            display: flex;
            align-items: baseline;
        }

        .row p {

            margin-top: 0;
            margin-bottom: 1rem;
            padding-left: 57px;
        }

        header p {
            padding-left: 20px;
        }
    </style>
@endpush
@section('content')
    @php
    $identity = "";
    $authentication="";
    $sonce="";
        if(!empty($data)){
            $identity = $data->identity;
            $authentication = $data->authentication;
            $sonce = $data->sonce;
        }
    @endphp
    <header>
        <p class="mt-2">We will sync your Shopify Store data with our system.you need below please contact us for
            details.</p>
        <hr>
    </header>
    <div class="section-1-container section-container">
        <div class="container">

            <div class="row">
                <div class="col-md-12 text-center mb-3">
                    <img src="{{asset('/upload/senderum.png')}}" alt="">
                </div>
                <div
                    class="col-10 offset-1 col-lg-8 offset-lg-2 div-wrapper d-flex justify-content-center align-items-center">

               

                    <div class="card" style="width: 100%">

                        <div class="card-body">
                            @if(empty($identity))
                           <form id="verificationForm" method="POST" action="/verifyApi">
                            <input type="hidden" name="csrf_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="shop_id" value="{{Auth::user()->id}}" id="shop_id">
                            <div class="form-inline"> <Label
                                    class="col-md-3 justify-content-left">Api Key:</Label><input
                                    class="form-control form-control-sm col-md-9" type="text" name="strIdentity"
                                    placeholder="" value="<?php echo  $identity; ?>"> </div>
                            <div class="form-inline"> <label
                                    class="col-md-3 justify-content-left">Api Secret:</label><input
                                    class="form-control form-control-sm col-md-9" type="text" name="strAuthentication"
                                    placeholder="" value="<?php echo  $authentication; ?>"></div>
                            {{-- <div class="form-inline"> <label class="col-md-3 justify-content-left">Source:</label><input
                                    class="form-control form-control-sm col-md-9" type="text" name="strSonce"
                                    placeholder="" value="
                                   
                                    "></div> --}}
                            <div class="row">
                                 
                                <div class="col-md-3"></div>
                                <div class="col-md-9">
                                    <button class="btn btn-warning">Verify</button>
                                </div>
                            </div>
                        </form>
                        @else
                        <strong>successfully verified your details.</strong> 
                        @endif
                        </div>
                    </div>
                   

                </div>


            </div>
            <div class="alert alert-success mt-3 text-center" id="successMsg" style="display:none;">
                <strong>successfully verified your details.</strong> 
            </div>
            <div class="row mt-3">
                <div class="col-md-3"></div>
                <div class="col-md-9">
                    <div class="row">
                        <p style="color: #243677">Ready to make it big in e-commerce industry?</p>
                    </div>

                    <div class="row">
                        <h4 style="color: #243677">Let's Start Fulfiling Your E-Commerce Dreams.</h4>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>


@push('scripts')
<script type="text/javascript">

    $(document).ready(function() {
        $('#verificationForm').on('submit', function(event){
            event.preventDefault();

            var formData = {
                "_token": "{{ csrf_token() }}",
                apiKey     : $('input[name=strIdentity]').val(),
                token    : $('input[name=strAuthentication]').val(),

                shop_id: $("#shop_id").val()
            }

            $.ajax({
                type     : "POST",
                // url      : $(this).attr('action') + '/store',
                url      : $(this).attr('action'),
                data     : formData,
                cache    : false,

                success  : function(data) {

                   if(data['response'] == false)
                        alert("there is error in verify your details!");
                    else
                        $("#successMsg").show();
                }
            })

            // console.log(formData);

            return false;

        });
    });

</script>
@endpush
@endsection