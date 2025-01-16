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
<td>{{$test->Failed_id}}</td>
<td>{{$test->Test_id}}</td>
<td>{{$test->Failure_reason}}</td>
<td>{{$test->Remanufactured_date}}</td>
<td>{{$test->Remarks}}</td>


<td> <a class="btn btn-warning" href="{{route('failed.edit',$test->Failed_id)}}">Update</button></td>
<td>
    <form action="{{route('failed.delete',$test->Failed_id)}}" method="post">
@csrf
        <button class="btn btn-danger" type="submit">Delete</button></td>
    </form>

</table>
</div>
</div>
</div>
</body>
</html>