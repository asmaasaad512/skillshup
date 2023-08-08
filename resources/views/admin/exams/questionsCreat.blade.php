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
<!--start form-->
<form   enctype="multipart/form-data" method="post" action="{{url("dashboard/exams/questions/store/$examId")}}">
  @csrf
<div class="container">
@for($i = 1 ; $i <= $Question_num ; $i++)
<div class="row">
  <h5>Question {{$i}}</h5>
<div class='col-6'>
 <div class="form-group">
<label for="exampleInputEmail1">  title</label>
<input type="text" class="form-control" name='titles[]' id="exampleInputEmail1">
</div>
 </div>
<div class="col-6">
  <div class="form-group">
<label for="category_id"> Right_answer</label>
<input type="number" class="form-control" name='Right_answer[]' >
 </div> 
  </div>
 <div class='col-6'>
 <div class="form-group">
<label for="exampleInputEmail1">options_1</label>
<input type="text" class="form-control" name='options_1[]' >
</div>
</div>
 <div class='col-6'>
 <div class="form-group">
<label for="exampleInputEmail1">options_2</label>
<input type="text" class="form-control" name='options_2[]' >
</div>
</div>
 <div class='col-6'>
 <div class="form-group">
<label> options_3</label>
<input type="text" class="form-control" name='options_3[]' >
</div>
</div>
 <div class='col-6'>
 <div class="form-group">
<label>options_4</label>
<input type="text" class="form-control" name='options_4[]' >
</div>
</div>
</div>
<hr>
@endfor

<button type="submit" class="btn btn-sm btn-info">
  Submit 
  </button>

  </div>


</form>
<!--end form-->

 </div>
          </div>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection