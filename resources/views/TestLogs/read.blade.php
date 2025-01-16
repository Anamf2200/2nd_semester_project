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
                    <th>Log_id</th>
                    <th>Test_type</th>
                    <th>Department_name</th>
                    <th>Test_date</th>
                    <th>Status</th>
                    <th>Remarks</th>
                    <th>View</th>
                    <th>Update</th>
                    <th>Delete</th>

                   
                </tr>
                @foreach ($testings as $test )
                <tr>
                    <td>{{$test->Log_id}}</td>
                <td>{{$test->Test_type}}</td>
                <td>{{$test->Department_name}}</td>
                <td>{{$test->Test_date}}</td>
                <td>{{$test->Status}}</td>
                <td>{{$test->Remarks}}</td>
             

                <td><a class="btn btn-warning" href="{{route('testlog.show',$test->Log_id)}}">View</a></td>
                <td> <a class="btn btn-warning" href="{{route('testlog.edit',$test->Log_id)}}">Update</button></td>
                <td>
               
                    <form action="{{route('testlog.delete',$test->Log_id)}}" method="post">
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