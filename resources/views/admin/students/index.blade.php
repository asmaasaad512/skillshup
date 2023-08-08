@extends('admin.layout')
@section('title')
students
@endsection
@section('content')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Students</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Students</li>
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
<h3 class="card-title"> Students</h3>
 <div class="card-tools">



</div>
</div>

<div class="card-body table-responsive p-0">
<table class="table table-hover text-nowrap">
<thead>
<tr>
<th>ID</th>
<th>Name</th>
<th>email </th>
<th>verified</th>
<th>Action</th>
</tr>
</thead>
<tbody>
@foreach($students as $student)
<tr>
<td>{{ $loop->iteration }}</td>
<td>{{$student->name}}</td>
<td>{{$student ->email}}</td>
@if($student -> email_verified_at !== null)
<td><span class="badge badge-success">yes</span></td>
@else
<td><span class="badge badge-danger">no</span></td>
@endif
<td>
<a  class="btn btn-sm btn-success" href="{{url("dashboard/students/show-scor/{$student->id}")}}">
  <i class="fas fa-percent"></i>  
</a>


</td>

</tr>
@endforeach
</tbody>

</table>
<div class="d-flex justify-content-center my-3">{{$students->links()}} </div>
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