@extends('larasnap::layouts.app', ['class' => 'category-index'])
@section('title','Category Management')
@section('content')
<!-- Page Heading  Start-->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
   <h1 class="h3 mb-0 text-gray-800">Category Management</h1>
</div>
<!-- Page Heading End-->				  
<!-- Page Content Start-->				  
<div class="row">
   <div class="col-xl-12">
      <div class="card shadow mb-4">
         <div class="card-body">
            <div class="card-body">
				<form  method="POST" action="" id="list-form" class="form-inline my-2 my-lg-0" autocomplete="off">
                    @method('POST')
                    @csrf
			   <div class="col-md-3 pad-0">
               <a href="{{route('create.management')}}" title="Add New Category" class="btn btn-primary btn-sm"><i aria-hidden="true" class="fa fa-plus"></i> Create Management
               </a>
			   </div>
				<!-- list filters -->
					
				<!-- list filters -->
               <br> <br> 
               <div class="table-responsive">
                  <table class="table">
                     <thead>
                        <tr>
                           <th>Name</th>
                           <th>Email</th>
                           <th>Age</th>
                           <th>PhoneNumber</th>
                           <th>Address</th>
                           <th>Actions</th>
                        </tr>
                     </thead>
                     <tbody>
                     @forelse($users as $user)
                     <tr>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td>{{$user->age}}</td>
        <td>{{$user->phoneNumber}}</td>
        <td>{{$user->address}}</td>
        <td><a href="{{route('edit.management', $user->id)}}" title="Edit User"><button class="btn btn-primary btn-sm" type="button"><i aria-hidden="true" class="fa fa-pencil-square-o"></i></button></a>
        <a onclick="return confirm('Are you sure?')" href="{{route('destroy.management',$user->id)}}" title="Delete User"><button class="btn btn-danger btn-sm" type="button"><i aria-hidden="true" class="fa fa-trash" ></i></button></a>
        </td> 
        </form>
       
    </tr>
    @empty
    <p> no records</p>
@endforelse
</tbody>
</table>
@endsection 

                     
                  
            </div>
         </div>
      </div>
   </div>
</div>
<!-- Page Content End-->				  