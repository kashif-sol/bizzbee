<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Shopify Data sync app</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    </head>
    <body style="    margin-bottom: 52px;">
    <?php
    $identity = "";
    $authentication="";
    $sonce="";
        if(!empty($data)){
            $identity = $data->identity;
            $authentication = $data->authentication;
            $sonce = $data->sonce;
        }
    ?>
        <div class="jumbotron text-center">
            <h2>We will sync your shopify store data with our system. You need below details please contact us for details.</h2>
          
            <p></p> 
            </div>
            
            <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-6">
                    <form id="verificationForm" method="POST" action="/verifyApi">
                    <input type="hidden" name="csrf_token" value="<?php echo e(csrf_token()); ?>">
                    <input type="hidden" name="shop_id" value="<?php echo e(Auth::user()->id); ?>" id="shop_id">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Identity</label>
                            <input type="text" class="form-control" id="strIdentity" aria-describedby="" placeholder="" name="strIdentity" value="<?php echo  $identity; ?>">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Authentication</label>
                            <input type="text" class="form-control" id="strAuthentication" placeholder="" name="strAuthentication" value="<?php echo  $authentication; ?>">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Sonce</label>
                            <input type="text" class="form-control" id="strSonce" placeholder="" name="strSonce" value="<?php echo  $sonce; ?>">
                        </div>


                        <div class="alert alert-success" id="successMsg" style="display:none;">
                            <strong>successfully verified your details.</strong> 
                        </div>

                        <button type="submit" class="btn btn-primary" id="verifyDetails">verify</button>
                    </form>
                </div>

            </div>
        </div>

                <script type="text/javascript">

                    $(document).ready(function() {

                    // Ajax for our form
                    $('#verificationForm').on('submit', function(event){
                        event.preventDefault();

                        var formData = {
                            "_token": "<?php echo e(csrf_token()); ?>",
                            strIdentity     : $('input[name=strIdentity]').val(),
                            strAuthentication    : $('input[name=strAuthentication]').val(),
                            strSonce : $('input[name=strSonce]').val(),
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
           
    </body>
</html>
<?php /**PATH /home/747822.cloudwaysapps.com/exddtqhswz/public_html/resources/views/welcome.blade.php ENDPATH**/ ?>