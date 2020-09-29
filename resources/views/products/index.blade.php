@extends('base')
<div class="col-sm-12">

  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div>
  @endif
</div>
  <center>
 <div >

    <a style="margin: 19px;" href="{{ route('products.create')}}" class="btn btn-primary">New Product</a>
    </div> 
    <div>
    <a style="margin: 19px;" href="<?= url('csv_file'); ?>" class="btn btn-primary">Add Bulk product</a> 

     </div>  
</center>
@section('main')
<div class="row">
<div class="col-sm-12">
    <h1 class="display-3">Product List</h1>    
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Product Name</td>
          <td>Description</td>
          <td>Quantity</td>
          <td>Unit Price</td>
          <td colspan = 2>Actions</td>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr>
            <td>{{$product->id}}</td>
            <td>{{$product->product_name}} </td>
            <td>{{$product->product_description}}</td>
            <td>{{$product->quantity}}</td>
            <td>{{$product->unit_price}}</td>
            <td>
                <a href="{{ route('products.edit',$product->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('products.destroy', $product->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
</div>
@endsection

