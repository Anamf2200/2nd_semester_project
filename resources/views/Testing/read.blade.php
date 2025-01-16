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
    <a class="btn btn-primary" href="{{route('testing.create')}}" >Add new testing</a>
    <div class="row mt-2">
        <div class="col-12">
            <table class="table table-bordered table-success table-striped ">
                <tr>
                    <th>Test ID</th>
                    <th>Product Name</th>
                    <th>Test Type</th>
                    <th>Test Date</th>
                    <th>Tested By</th>
                    <th>Test Criteria</th>
                    <th>Test Result</th>
                    <th>Remarks</th>
                    <th>View</th>
                    <th>Update</th>
                    <th>Delete</th>

                   
                </tr>
                @foreach ($testings as $testing )
                <tr>
                <td>{{$testing->Test_id}}</td>
                <td>{{$testing->Product_name}}</td>
                <td>{{$testing->Test_type}}</td>
                <td>{{$testing->Test_date}}</td>
                <td>{{$testing->Tested_by}}</td>
                <td>{{$testing->Test_criteria}}</td>
                <td>{{$testing->Test_result}}</td>
                <td>{{$testing->Remarks}}</td>

                <td><a class="btn btn-warning" href="{{route('testing.show',$testing->Test_id)}}">View</a></td>
                <td> <a class="btn btn-warning" href="{{route('testing.edit',$testing->Test_id)}}">Update</button></td>
                <td>
                    <form action="{{route('testing.delete',$testing->Test_id)}}" method="post">
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