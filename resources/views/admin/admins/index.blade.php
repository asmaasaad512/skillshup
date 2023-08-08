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
          @include('admin.inc.message')
          <div class="card">
<div class="card-header">
<h3 class="card-title">all Admins</h3>
 <div class="card-tools">
 <a href="{{url('dashboard/admins/create')}}" class="btn btn-default" >
add new
</a>
</div>
</div>

<div class="card-body table-responsive p-0">
<table class="table table-hover text-nowrap">
<thead>
<tr>
<th>ID</th>
<th>Name</th>
<th>email </th>
<td>Role</td>
<th>verified</th>
<th>Action</th>
</tr>
</thead>
<tbody>
@foreach($admins as $admin)
<tr>
<td>{{ $loop->iteration }}</td>
<td>{{$admin->name}}</td>
<td>{{$admin ->email}}</td>
<td>{{$admin ->role -> name}}</td>
@if($admin -> email_verified_at !== null)
<td><span class="badge badge-success">yes</span></td>
@else
<td><span class="badge badge-danger">no</span></td>
@endif
<td>
</td>
<td>
@if($admin -> role->name =='admin')  
<a  class="btn btn-sm btn-danger" href="{{url("dashboard/admins/promote/{$admin ->id}")}}">
  <i class="fas fa-level-up-alt"></i>  
</a>
@else
<a  class="btn btn-sm btn-success" href="{{url("dashboard/admins/depromote/{$admin ->id}")}}">
  <i class="fas fa-level-down-alt"></i>  
</a>
@endif
</td>
</tr>
@endforeach
</tbody>

</table>
<div class="d-flex justify-content-center my-3">{{$admins->links()}} </div>
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