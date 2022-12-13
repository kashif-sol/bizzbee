<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
   <style>
        th {
            font-size: 18px;
            text-align: center;
            color:#9b9b9b;
        }

        td {
            text-align: center;
        }
    </style>
</head>

<body>
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
 
    <div class="container" style="padding: 60px;line-height: 36px;">
        
<form method="get" action="orderid">
        <div class="row">
            <div class="card" style="box-shadow: 0px 0px 16px rgb(0 0 0 / 12%);">
                <div class="card-body">
                    <div class="card-title">
                        <h1 style="font-size: 19px;color: #7a5b74;">Shopify Orders</h1>
                    </div>
                    <div class="row">
                        <input type="submit" style="width:117px" class="btn btn-primary" name="submit" value="Send"/>
                    </div>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>order number</th>
                                <th>email</th>
                                <th>created date</th>
                                <th>total</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><input type="checkbox"  name="order_ids[]'" id="checkbox_id<?php echo e($key); ?>" value="<?php echo e($data['id']); ?>"/>&nbsp;</td>
                                    <td><?php echo e($data['order_number']); ?></td>
                                    <td><?php echo e($data['contact_email']); ?></td>
                                    <td><?php echo e($data['created_at']); ?></td>
                                    <td><?php echo e($data['total_price']); ?></td>
                                    <td><a class="btn btn-primary" href="<?php echo e(route('fulfillmentorder',$data['id'])); ?>">Fulfill</a></td>

                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </form>
    </div>
</body>

</html>
<script>
console.log($('input[name="lang"]:checked').serialize());
</script>
<?php /**PATH C:\laragon\www\bizzbee\resources\views/orders.blade.php ENDPATH**/ ?>