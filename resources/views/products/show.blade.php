<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-3">
    <div class="row mt-2">
        <div class="col-12">
            <table class="table table-bordered table-success table-striped ">
                
            <tr>
<td>{{$emp->Product_Id}}</td>
<td>{{$emp->Product_code}}</td>
<td>{{$emp->Revision_version}}</td>
<td>{{$emp->Manufacturing_number}}</td>
<td>{{$emp->Product_name}}</td>
<td>{{$emp->Manufacturing_date}}</td>
<td>{{$emp->Status}}</td>


                <td> <a class="btn btn-warning" href="">Update</button></td>
                <td>
                    <form action="" method="post">
@csrf
                        <button class="btn btn-danger" type="submit">Delete</button></td>
                    </form>

</tr>
</table>
</div>
</div>
</div>
</body>
</html>