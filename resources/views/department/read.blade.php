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
    {{-- <a class="btn btn-primary" href="{{route('failed.create')}}" >Add new testing</a> --}}
    <div class="row mt-2">
        <div class="col-12">
            <table class="table table-bordered table-success table-striped ">
                <tr>
                    <th>Department ID</th>
                    <th>Department Name</th>
                    <th>Test_type_handled</th>
                    <th>View</th>
                    <th>Update</th>
                    <th>Delete</th>

                   
                </tr>
                @foreach ($data as $test )
                <tr>
                <td>{{$test->Department_id}}</td>
                <td>{{$test->Department_name}}</td>
                <td>{{$test->Test_type_handled}}</td>
                
             

                <td><a class="btn btn-warning" href="{{route('dept.show',$test->Department_id)}}">View</a></td>
                <td> <a class="btn btn-warning" href="{{route('dept.edit',$test->Department_id)}}">Update</button></td>
                <td>
               
                    <form action="{{route('dept.delete',$test->Department_id)}}" method="post">
@csrf
                        <button class="btn btn-danger" type="submit">Delete</button></td> </tr>
                    </form>

                @endforeach
            </table>
        </div>
    </div>
</div>
</body>
</html>