@extends('csv_file')

@section('csv_data')

<table class="table table-bordered table-striped">
 <thead>
  <tr>
   <th>Name</th>
   <th>Email Address</th>
   <th>Action</th>
  </tr>
 </thead>
 <tbody>
 @foreach($data as $row)
  <tr>
   <td>{{ $row->name }}</td>
   <td>{{ $row->email }}</td>
   <td>
   	<a href="javascript:void(0)" class="btn btn-success" id="edit-customer" data-toggle="modal" data-id={{ $row->id }}>Edit</a>
   </td>
  </tr>
 @endforeach
 </tbody>
</table>




{!! $data->links() !!}

