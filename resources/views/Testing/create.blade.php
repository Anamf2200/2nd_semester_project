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
                <form action="{{route('testing.store')}}" method="post">
                    @csrf
                  
                    <div class="mb-3">
                        <label for="product_id" class="form-label">Select Product</label>
                        <select name="product_id" id="product_id" class="form-control">
                            <option value="">-- Select a Product --</option>
                            @foreach ($products as $product)
                                <option value="{{ $product->Product_Id }}">{{ $product->Product_name }}</option>

                            @endforeach
                        </select>
                    </div>
        

                    <div class="mt-2">
                        <label for="e">Test_type</label>
                        <input type="text" name="test_type" id="e" class="form-control">
                    </div>

                    <div class="mt-2">
                        <label for="ad">Test_date</label>
                        <input type="date" name="test_date" id="ad" class="form-control">
                    </div>

                    <div class="mt-2">
                        <label for="a">Tested_by</label>
                        <input type="text" name="tested_by" id="a" class="form-control">
                    </div>
                    <div class="mt-2">
                        <label for="a">Test_criteria</label>
                        <input type="text" name="test_criteria" id="a" class="form-control">
                    </div>
                    <div class="mt-2">
                        <label for="test_result" class="form-label">Test Result</label>
                        <select name="test_result" id="test_result" class="form-control">
                            <option value="">-- Select Result --</option> 
                            <option value="Pass">Pass</option>
                            <option value="Fail">Fail</option>
                        </select>
                        
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