@extends('larasnap::layouts.app', ['class' => 'category-create'])
@section('title','Category Management')
@section('content')
<!-- Page Heading  Start-->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
   <h1 class="h3 mb-0 text-gray-800">Edit Form </h1>
</div>
<!-- Page Heading End-->				  
<!-- Page Content Start-->				  
<div class="row">
   <div class="col-xl-12">
      <div class="card shadow mb-4">
         <div class="card-body">
            <div class="card-body">
               <a href="{{route('list.management')}}" title="Back to Category List" class="btn btn-warning btn-sm"><i aria-hidden="true" class="fa fa-arrow-left"></i> Back to Management List
               </a> 
               <br> <br> 
               <form method="POST" action="{{route('update.management',$user['id'])}}"  class="form-horizontal" autocomplete="off">
                  @csrf
                  @method('put')
                  <div class="row">
                     <div class="col-md-12">
                        <div class="form-group">
                           <label for="name" class="control-label">Name<small class="text-danger required">*</small></label> 
                           <input name="name" type="text" id="name" class="form-control lower-case" value="{{old('name',$user['name'])}}">
                           @error('name')
                           <span class="text-danger">{{ $message }}</span>
                           @enderror 							
                        </div>
                     </div>
                     <div class="col-md-12">
                        <div class="form-group">
                           <label for="email" class="control-label">Email<small class="text-danger required">*</small></label> 
                           <input name="email" type="email" id="email" class="form-control" value="{{old('email',$user['email'])}}">
                           @error('email')
                           <span class="text-danger">{{ $message }}</span>
                           @enderror 							
                        </div>
                     </div>
                     <div class="col-md-12">
                        <div class="form-group">
                           <label for="password" class="control-label">Password<small class="text-danger required">*</small></label> 
                           <input name="password" type="password" id="password" class="form-control" value="">
                           @error('password')
                           <span class="text-danger">{{ $message }}</span>
                           @enderror 							
                        </div>
                     </div>
                     <div class="col-md-12">
                        <div class="form-group">
                           <label for="age" class="control-label">Age<small class="text-danger required">*</small></label> 
                           <input name="age" type="number" id="age" class="form-control" value="{{old('age',$user['age'])}}">
                           @error('age')
                           <span class="text-danger">{{ $message }}</span>
                           @enderror 							
                        </div>
                     </div>
                     <div class="col-md-12">
                        <div class="form-group">
                           <label for="phoneNumber" class="control-label">PhoneNumber<small class="text-danger required">*</small></label> 
                           <input name="phoneNumber" type="number" id="phoneNumber" class="form-control" value="{{old('phoneNumber',$user['phoneNumber'])}}">
                           @error('phoneNumber')
                           <span class="text-danger">{{ $message }}</span>
                           @enderror 							
                        </div>
                     </div>
                     <div class="col-md-12">
                        <div class="form-group">
                           <label for="address" class="control-label">Address<small class="text-danger required">*</small></label> 
                           <input name="address" type="text" id="address" class="form-control" value="{{old('address',$user['address'])}}">
                           @error('address')
                           <span class="text-danger">{{ $message }}</span>
                           @enderror 							
                        </div>
                     </div>
                  
                     <input type="hidden" name="position" value="">
                     @error('position')
                           <span class="text-danger">{{ $message }}</span>
                     @enderror 
                     </div>
                     <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">
                           <input type="submit" value="Update" title = "Update User" class="btn btn-primary">
                        </div>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- Page Content End-->				  
@endsection