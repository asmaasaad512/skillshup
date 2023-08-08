@extends('admin.layout')
@section('title')
message
@endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Message {{$message -> name}}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
              <li class="breadcrumb-item active">Message {{$message -> name}}</li>
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

 <div class="card-tools">


</div>
</div>

<div class="card-body table-responsive p-0">
<table class="table table-sm">

<tbody>
<tr>
<td>Name</td>
 <td>{{$message-> name}}</td>

</tr>
<tr>
<td>Email</td>
 <td>{{$message -> email}}</td>
</tr>
<tr>
<td>Subject</td>
<td>{{$message -> subject ?? "..."}}</td>
</tr>
<tr>
<td>Body</td>
<td>{{$message -> body}}</td>
</tr>
<tr>

 <td>Created_at</td>
 <td>{{$message -> created_at}}</td> 
</tr>

</tbody>
</table>


 </div>
<!--end card-->
          </div>
<!--end  content-->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
          @include('admin.inc.message')
          <div class="card">
<div class="card-header">
<h3 class="card-title"> Send respons</h3>
 <div class="card-tools">


</div>
</div>

<div class="card-body table-responsive p-0">
<!--start form-->
@include('admin.inc.errors')
<form method="POST" action="{{url("dashboard/messages/respone/{$message -> id}")}}" >
  @csrf
<div class="container">
<div class="row">
<div class='col-12'>
 <div class="form-group">
<label for="title">Title</label>
<input type="text" class="form-control" name='title' id="title">
</div>
 </div>

 <div class='col-12'>
 <div class="form-group">
<label for="body">Body</label>
<textarea name="body" id="body" class="form-control" cols="30" rows="10"></textarea>
</div>
 </div>

<div class="col-6">
  <div class="form-group">
  <button type="submit" class="btn btn-sm btn-info">
  Submit 
  </button>
 
</div>
  </div>

</div>
</div>
</form>

<!--end form-->
 </div>
<!--end card-->
          </div>
<!--end  content-->
        <a  class="btn btn-sm btn-primary" href="{{url()->previous()}}">
        Back
            </a>
          </div>
        </div>
      </div>
    </div>
</div>
<!--responsev -->
   
</div>
@endsection