<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Advanced Search</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
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
</body>
</html>
