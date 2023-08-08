@extends('admin.layout')
@section('title')
admins
@endsection
@section('content')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Admins</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Admins</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
  
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
      
          <div class="card">
<div class="card-header">
<h3 class="card-title">all Admins</h3>
 <div class="card-tools">

</div>
</div>

<div class="card-body table-responsive p-0">
@include('admin.inc.errors')
	<!--start form-->
<form  action="{{url('dashboard/admins/store')}}" method="POST">
  @csrf
<div class="container">
<div class="row">
<div class='col-6'>
 <div class="form-group">
<label for="exampleInputEmail1">Name</label>
<input type="text" class="form-control" name="name" placeholder="Name">
</div>
 </div>
  <div class="col-6">
  <div class="form-group">
<label for="exampleInputPassword1">Email</label>
<input type="email" class="form-control" name="email" placeholder="Email">
</div>
  </div>
  <div class="col-6">
  <div class="form-group">
<label>Password</label>
<input type="password" class="form-control" name="password" placeholder="Password">
</div>
</div>

								
<div class="col-6">
  <div class="form-group">
<label>Confirm Password</label>
<input type="password" name="password_confirmation" placeholder="Confirm Password" class="form-control">
</div>
</div>
<div class="col-6">
  <div class="form-group">
<label for="category_id"> Skill Name</label>
<select class="custom-select form-control-border border-width-2"name='role_id'>
@foreach($admins as $admin)
<option value="{{$admin->id}}">{{$admin->name}}</option>
@endforeach
</select>
 </div> 
  </div>


  <div class="col-12">
  <div class="form-group">
  <button type="submit" class="btn btn-sm btn-info">
  Submit 
  </button>
  <a  class="btn btn-sm btn-primary" href="{{url()->previous()}}">
        Back
    </a>
</div>
  </div>

</div>
</div>
</form>
<!--end form-->

 </div>

</div>
<!--end card-->
</div>
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


@endsection