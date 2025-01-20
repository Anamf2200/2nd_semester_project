@extends('Admin.layout');

@section('content')
@section('custom-css')
<style>
.image{
    height: 50px;
    width: 50px;
}

    </style>
    @endsection
  
<div class="row">
    <div class="col-xl-6">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-chart-area me-1"></i>
                Area Chart Example
            </div>
            <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
        </div>
    </div>
    <div class="col-xl-6">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-chart-bar me-1"></i>
                Bar Chart Example
            </div>
            <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
        </div>
    </div>
</div>

<div class="container mt-3">
    <h2>Search Product Details</h2>
    <form action="{{ route('testing.search') }}" method="GET" class="mb-4">
        <div class="row">
            <div class="col-md-6">
                <input type="search" name="search" class="form-control" 
                    placeholder="Enter product name" value="{{ request('search') }}">
            </div>
            <div class="col-md-6">
                <button type="submit" class="btn btn-primary">Search</button>
                <a href="{{ route('testing.search') }}" class="btn btn-secondary">Reset</a>
            </div>
        </div>
    </form>

    @if($testings->isNotEmpty())
        <table class="table table-bordered table-striped mt-4">
            <thead>
                <tr>
                    <th>Test ID</th>
                    <th>Product Name</th>
                    <th>Test Type</th>
                    <th>Test Date</th>
                    <th>Tested By</th>
                    <th>Test Criteria</th>
                    <th>Test Result</th>
                    <th>Remarks</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($testings as $testing)
                    <tr>
                        <td>{{ $testing->Test_id }}</td>
                        <td>{{ $testing->Product_name }}</td>
                        <td>{{ $testing->Test_type }}</td>
                        <td>{{ $testing->Test_date }}</td>
                        <td>{{ $testing->Tested_by }}</td>
                        <td>{{ $testing->Test_criteria }}</td>
                        <td>{{ $testing->Test_result }}</td>
                        <td>{{ $testing->Remarks }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="alert alert-warning mt-4">No testings found for the specified product name.</div>
    @endif
</div>


<div class="container mt-3">
    <a class="btn btn-primary" href="{{route('product.create')}}" >Add products</a>
    <div class="row mt-2">
        <div class="col-12">
            <table class="table table-bordered table-success table-striped text-center item-center">
                <tr>
                    <th>Product_id</th>
                    <th>Product_Code</th>
                    <th>Bar_Code</th>
                    <th>Revision_version</th>
                    <th>Manufacturing_number</th>
                    <th>Product_name</th>
                    <th>Manufacturing_date</th>
                    <th>Product_Image</th>
                    <th>Status</th>

                    <th>Action</th>
                    <th>Action</th>
                    <th>Action</th>
                </tr>
                @foreach ($data as $emp )
                <tr>
                <td>{{$emp->Product_Id}}</td>
                <td>{{$emp->Product_code}}</td>
                <td>{{$emp->Bar_code}}</td>
                <td>{{$emp->Revision_version}}</td>
                <td>{{$emp->Manufacturing_number}}</td>
                <td>{{$emp->Product_name}}</td>
                <td>{{$emp->Manufacturing_date}}</td>
                <td><img src="{{asset('storage/'.$emp->Image)}} " alt=""class='image'></td>
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



@endsection