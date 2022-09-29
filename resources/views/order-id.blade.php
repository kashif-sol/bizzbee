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

</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-body">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Order Id</th>
            </tr>
        </thead>
        <tbody>
            @dd($arr)
            @foreach ($result as $key=>$data)
            <tr>
                <td>{{$data}}</td>
            </tr>
            @endforeach
        </tbody>
        <tbody>
            
           
        </tbody>
    </table>
</div>
</div>
</div>
</body>
</html>