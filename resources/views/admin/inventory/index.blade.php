@extends('admin.layout.master')
@section('content')

<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Inventory</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Admin</li>
              <li class="breadcrumb-item active">View Inventory</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
  </div>

<section class="content">
  <div class="container-fluid">

  <table class="table" id="inventory-table">
    <tr>
      <th>ID</th>
      <th>Item Name</th>
      <th>Category</th>
      <th>Quantity</th>
      <th>Service Date</th>
      <th>Manufacturer</th>
      <th>Manufacurer Contact</th>
      <th>Action</th>
    </tr>
    
    @foreach ($inventory as $inventory)

    <tr>
      <td>{{$inventory->id}}</td>
      <td>{{$inventory->item_name}}</td>
      <td>{{$inventory->category}}</td>
      <td>{{$inventory->quantity}}</td>
      <td>{{$inventory->service_date}}</td>
      <td>{{$inventory->manufacturer}}</td>
      <td>{{$inventory->manufacturer_contact}}</td>
      <td><a href="{{route('admin-inventory.edit',$inventory->id)}}" class="btn btn-primary">Edit</a>
      <button type="submit" class="btn btn-danger remove-user" data-id="{{$inventory->id}}" data-action="{{route('admin-inventory.destroy',$inventory->id)}}">Delete</button>
      <!-- <td>EDIT | DELETE</td> -->
    </tr>

    @endforeach
  
  </table>

  </div>

  <script type="text/javascript">
  $("body").on("click", ".remove-user", function(){
    var current_object = $(this);
    swal({
      title: "Are you sure?",
      type: "error",
      showCancelButton: true,
      dangerMode: true,
      cancelButtonClass: '#DD6B55',
      confirmButtonColor: '#dc3545',
      confirmButtonText: 'Delete',
    }, function (result) {
      if (result) {
        var action = current_object.attr('data-action');
        var token = jQuery('meta[name="csrf-token"]').attr('content');
        var id = current_object.attr('data-id');

        $('body').html("<form class='form-inline remove-form' method='post' action='"+action+"'></form>");
        $('body').find('.remove-form').append('<input name="_method" type="hidden" value="delete">');
        $('body').find('.remove-form').append('<input name="_token" type="hidden" value="'+token+'">');
        $('body').find('.remove-form').append('<input name="id" type="hidden" value="'+id+'">');
        $('body').find('.remove-form').submit();
        

      }
    });
  });
  </script>
</section>

@endsection