@extends('base') 
@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Update a product</h1>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br /> 
        @endif
        <form method="post" action="{{ route('products.update', $products->id) }}">
            @method('PATCH') 
            @csrf
            <div class="form-group">

                <label for="product_name">Product Name:</label>
                <input type="text" class="form-control" name="product_name" value={{ $products->product_name }} />
            </div>

            <div class="form-group">
                <label for="product_description">Product Description:</label>
                <input type="text" class="form-control" name="product_description" value={{ $products->product_description }} />
            </div>
            <div class="form-group">
                <label for="quantity">Quantity:</label>
                <input type="text" class="form-control" name="quantity" value={{ $products->quantity }} />
            </div>
            <div class="form-group">
                <label for="country">Unit Price:</label>
                <input type="text" class="form-control" name="unit_price" value={{ $products->unit_price }} />
            </div>
           
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection