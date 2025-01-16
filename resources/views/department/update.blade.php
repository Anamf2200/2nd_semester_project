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
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="{{route('dept.update',$emp->Department_id)}}" method="POST">
                    @csrf
                  
                    <div class="mt-2">
                        <label for="e">Department_id</label>
                        <input type="number" name="department_id" id="e" class="form-control" value="{{$emp->Department_id}}">
                    </div>
        

                    <div class="mt-2">
                        <label for="e">Department_name</label>
                        <input type="text" name="department_name" id="e" class="form-control" value="{{$emp->Department_name }}">
                    </div>

                    <div class="mt-2">
                        <label for="ad">Test_type_handled</label>
                        <input type="text" name="test_type_handled" id="ad" class="form-control"value="{{$emp->Test_type_handled }}">
                    </div>

                  
                    
                    <div class="mt-2">
                      <button type="submit" class="btn btn-info">Update</button>    
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>