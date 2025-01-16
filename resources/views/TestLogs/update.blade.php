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
                <form action="{{route('testlog.update',$emp->Log_id)}}" method="post">
                    @csrf
                    <div class="mt-2">
                        <label for="a">Log_id</label>
                        <input type="number" name="log_id" id="a" class="form-control"value='{{$emp->Log_id}}'readonly>
                    </div>
                  
                    <div class="mb-3">
                        <label for="product_id" class="form-label">Test_type</label>
                        <select name="test_id" id="product_id" class="form-control">
                            <option value="">-- Select a Test_type --</option>
                            @foreach ($testings as $test)
                                <option value="{{$test ->Test_id }}">{{ $test->Test_type }}</option>

                            @endforeach
                        </select>
                    </div>
        
                    <div class="mb-3">
                        <label for="product_id" class="form-label">Department_name</label>
                        <select name="department_id" id="product_id" class="form-control">
                            <option value="">-- Select a Product --</option>
                            @foreach ($department as $dept)
                                <option value="{{ $dept->Department_id }}">{{ $dept->Department_name }}</option>

                            @endforeach
                        </select>
                    </div>

                    <div class="mt-2">
                        <label for="e">Test_date</label>
                        <input type="date" name="test_date" id="e" class="form-control" value="{{$emp->Test_date}}">
                    </div>

                   

                    <div class="mt-2">
                        <label for="test_result" class="form-label">Status</label>
                        <select name="status" id="test_result" class="form-control" value="{{$emp->Status}}">
                            <option value="">-- Select Result --</option> 
                            <option value="Progress">Progress</option>
                            <option value="Completed">Completed</option>
                        </select>
                        
                    </div>
                        <div class="mt-2">
                            <label for="a">Remarks</label>
                            <input type="text" name="remarks" id="a" class="form-control" value="{{$emp->Remarks}}">
                        </div>
                    <div class="mt-2">
                      <button type="submit" class="btn btn-info">Submit</button>    
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>