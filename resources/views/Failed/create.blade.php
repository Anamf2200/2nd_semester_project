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
                <form action="{{ route('failed.store') }}" method="POST">
                    @csrf
                  
                    <div class="mb-3">
                        <label for="product_id" class="form-label">Select Test_type</label>
                        <select name="test_type" id="product_id" class="form-control">
                            <option value="">-- Select Test_type --</option>
                            @foreach ($test_types as $test_type)
                                <option value="{{ $test_type->Test_id }}">{{ $test_type->Test_type }}</option>

                            @endforeach
                        </select>
                    </div>
        

                    <div class="mt-2">
                        <label for="e">Failure_reason</label>
                        <input type="text" name="failure_reason" id="e" class="form-control">
                    </div>

                    <div class="mt-2">
                        <label for="ad">Remanufactured_date</label>
                        <input type="date" name="remanufactured_date" id="ad" class="form-control">
                    </div>

                    <div class="mt-2">
                        <label for="a">Remarks</label>
                        <input type="text" name="remarks" id="a" class="form-control">
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