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
            <h1 class="m-0 text-dark">exams</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
              <li class="breadcrumb-item active">exams</li>
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
<h3 class="card-title">all exams</h3>
 <div class="card-tools">

<!-- <button type="button" class="btn btn-default" data-toggle="modal" data-target="#add-model">
add new
</button> -->
</div>
</div>

<div class="card-body table-responsive p-0">
<table class="table table-sm">

<tbody>
<tr>
<td>Name(en)</td>
 <td>{{$exam -> name("en")}}</td>

</tr>
<tr>
<td>Name(ar)</td>
 <td>{{$exam -> name("ar")}}</td>
</tr>
<tr>
<td>desc(en)</td>
<td>{{$exam -> desc('en')}}</td>
</tr>
<tr>
<td>desc(ar)</td>
<td>{{$exam -> desc('ar')}}</td>
</tr>
<tr>
 <td>img</td>
 <td><img height="50" src="{{asset("uploads/$exam->img")}}"  ></td> 
</tr>
<tr>
 <td>Question_num</td>
 <td>{{$exam -> Question_num}}</td> 
</tr>
<tr>
 <td>difficulty</td>
 <td>{{$exam -> difficulty}}</td> 
</tr>
<tr>
 <td>duration_mins</td>
 <td>{{$exam -> duration_mins }}</td> 
</tr>
<tr>
 <td>difficulty</td>
 <td>{{$exam -> difficulty}}</td> 
</tr>
<tr>
 <td>active</td>
 <td>{{$exam -> active}}</td> 
</tr>
<tr>
 <td>created_at</td>
 <td>{{$exam -> created_at}}</td> 
</tr>

</tbody>
</table>


 </div>

          </div>
          <a  class="btn btn-sm btn-info" href="{{url("dashboard/exams/questions/{$exam->id}")}}">
         Read Questions  
        </a>

        <a  class="btn btn-sm btn-primary" href="{{url()->previous()}}">
        Back
            </a>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection