@extends('admin.layout')
@section('title')
admin-exams
@endsection
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Exames</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Exames</li>
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
<h3 class="card-title">all Exames</h3>
 <div class="card-tools">
<!-- <div class="input-group input-group-sm" style="width: 150px;">
<input type="text" name="table_search" class="form-control float-right" placeholder="Search">
<div class="input-group-append">
<button type="submit" class="btn btn-default">
<i class="fas fa-search"></i>
</button>
</div>

 </div>  -->

<a href="{{url('dashboard/exams/creat')}}" class="btn btn-default" >
add new
</a>
</div>
</div>

<div class="card-body table-responsive p-0">
<table class="table table-hover text-nowrap">
<thead>
<tr>
<th>ID</th>
<th>Name(en)</th>
<th>Name(ar)</th>
<th>skill</th>
<th>Question_num</th>
<th>image</th>
<th>Active</th>
<th>Action</th>
</tr>
</thead>
<tbody>
@foreach($exams as $exam)
<tr>
<td>{{ $loop->iteration }}</td>
<td>{{$exam->name("en")}}</td>
<td>{{$exam->name("ar")}}</td>
<td>{{$exam->skill->name('en')}}</td>
<td>{{$exam -> Question_num}}</td>
<td><img height="50" src="{{asset("uploads/$exam->img")}}"  ></td>
@if($exam->active == 1)
<td><span class="badge badge-success">yes</span></td>
@endif
@if($exam->active == 0)
<td><span class="badge badge-danger">no</span></td>
@endif
<td>
<a  class="btn btn-sm btn-primary" href="{{url("dashboard/exams/show/{$exam->id}")}}">
  <i class="fas fa-eye"></i>  
</a>
<a  class="btn btn-sm btn-secondary" href="{{url("dashboard/exams/questions/{$exam->id}")}}">
  <i class="fas fa-question"></i>  
</a>
<a  class="btn btn-sm btn-info" href="{{url("dashboard/exams/edit/{$exam->id}")}}">
  <i class="fas fa-edit"></i>  
</a>
<a  class="btn btn-sm btn-secondary" href="{{url("dashboard/exams/toggle/{$exam->id}")}}">
  <i class="fas fa-toggle-on"></i>  
</a>
<a  class="btn btn-sm btn-danger" href="{{url("dashboard/exams/delete/{$exam->id}")}}">
  <i class="fas fa-trash"></i>  
</a>

</a>
</td>

</tr>
@endforeach
</tbody>

</table>
<div class="d-flex justify-content-center my-3">{{$exams->links()}} </div>
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



















