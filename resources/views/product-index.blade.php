<!DOCTYPE html>
<html>
<head>
    <title>Laravel 6 Scout Search</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="mt-5">Laravel 6 Scout Search</h2><br/>
            <form method="POST" action="{{ route('product.add') }}" autocomplete="off">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <input type="text" id="name" name="name" class="form-control" placeholder="Enter Name" value="{{ old('name') }}">
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group {{ $errors->has('quantity') ? 'has-error' : '' }}">
                            <input type="text" id="quantity" name="quantity" class="form-control" placeholder="Enter Quantity" value="{{ old('quantity') }}">
                            <span class="text-danger">{{ $errors->first('quantity') }}</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <button class="btn btn-primary rounded-0">Create New Product</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-12">
            <h5><strong>Product</strong></h5><hr>
            <form method="GET" action="{{ route('product.index') }}">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="search" class="form-control" placeholder="Search" value="{{ Request::get('search') }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <button class="btn btn-primary rounded-0">Search</button>
                        </div>
                    </div>
                </div>
            </form>
            <table class="table table-bordered">
                <thead>
                    <th width="5%">Id</th>
                    <th>Name</th>
                    <th>Quantity</th>
                </thead>
                <tbody>
                    @if($products->count())
                        @foreach($products as $key => $value)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $value->name }}</td>
                                <td>{{ $value->quantity }}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="4">There are no data.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
            {{ $products->links() }}
        </div>
    </div>
</div>
</body>
</html>