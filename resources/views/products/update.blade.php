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
                <form action="{{route('product.update',$emp->Product_Id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mt-2">
                        <label for="n">Product_id</label>
                        <input type="text" name="product_id" readonly id="n" class="form-control" value="{{$emp->Product_Id}}">
                    </div>
                    <div class="mt-2">
                        <label for="n">Product_Code</label>
                        <input type="text" name="product_code" id="n" class="form-control"value='{{$emp->Product_code}}' readonly>
                    </div>

                    <div class="mt-2">
                        <label for="n">Bar_Code</label>
                        <input type="text" name="product_code" id="n" class="form-control"value='{{$emp->Product_code}}' readonly>
                    </div>

                    <div class="mt-2">
                        <label for="e">Revision_version</label>
                        <input type="text" name="revision_version" id="e" class="form-control"value='{{$emp->Revision_version}}'>
                    </div>

                    <div class="mt-2">
                        <label for="ad">Manufacturing_number</label>
                        <input type="text" name="manufacturing_number" id="ad" class="form-control"value='{{$emp->Manufacturing_number}}'>
                    </div>

                    <div class="mt-2">
                        <label for="a">Product_name</label>
                        <input type="text" name="product_name" id="a" class="form-control"value='{{$emp->Product_name}}'>
                    </div>
                    <div class="mt-2  image">
                        <label for="a">Product_image</label>
                        <input type="file" name="file" id="a" class="form-control">
                    </div>
                    <div class="mt-2">
                        <label for="a">Manufacturing_date</label>
                        <input type="date" name="manufacturing_date" id="a" class="form-control"value='{{$emp->Manufacturing_date}}'>
                    </div>
                    <div class="mt-2">
                        <label for="a">Status</label>
                        <select name="status" id="status">
                            <option value="Pending">Pending</option>
                            <option value="Tested">Tested</option>
                            <option value="Failed">Failed</option>
                            <option value="Remanufactured">Remanufactured</option>
                        </select>
                    <div class="mt-2">
                      <button type="submit" class="btn btn-info">Update</button>    
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>