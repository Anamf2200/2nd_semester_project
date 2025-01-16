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
    <a class="btn btn-primary" href="{{route('product.create')}}" >Add products</a>
    <div class="row mt-2">
        <div class="col-12">
            <table class="table table-bordered table-success table-striped ">
                <tr>
                    <th>Product_id</th>
                    <th>Product_Code</th>
                    <th>Revision_version</th>
                    <th>Manufacturing_number</th>
                    <th>Product_name</th>
                    <th>Manufacturing_date</th>
                    <th>Status</th>

                    <th>Action</th>
                    <th>Action</th>
                    <th>Action</th>
                </tr>
                @foreach ($data as $emp )
                <tr>
                <td>{{$emp->Product_Id}}</td>
                <td>{{$emp->Product_code}}</td>
                <td>{{$emp->Revision_version}}</td>
                <td>{{$emp->Manufacturing_number}}</td>
                <td>{{$emp->Product_name}}</td>
                <td>{{$emp->Manufacturing_date}}</td>
                <td>{{$emp->Status}}</td>
                <td><a class="btn btn-warning" href="{{route('product.show',$emp->Product_Id)}}">View</a></td>
                <td> <a class="btn btn-warning" href="{{route('product.edit',$emp->Product_Id)}}">Update</button></td>
                <td>
                    <form action="{{route('product.delete',$emp->Product_Id)}}" method="post">
@csrf
                        <button class="btn btn-danger" type="submit">Delete</button></td></tr>
                    </form>

                @endforeach
            </table>
        </div>
    </div>
</div>
</body>
</html>