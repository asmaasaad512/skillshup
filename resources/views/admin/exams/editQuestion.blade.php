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
            <h1 class="m-0 text-dark">edite for questions </h1>
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
<h3 class="card-title">{{$exam->name('en')}}</h3>
 <div class="card-tools">

<!-- <button type="button" class="btn btn-default" data-toggle="modal" data-target="#add-model">
add new
</button> -->
</div>
</div>
<div class="card-body table-responsive p-0">
<!--start form-->
<form   enctype="multipart/form-data" method="post" action="{{url("dashboard/exams/questions/update/{$exam ->id}/{$question->id}")}}">
  @csrf
<div class="container">

<div class="row">
<div class='col-6'>
 <div class="form-group">
<label>  title</label>
<input type="text" class="form-control" name='title' value="{{$question ->title}}" >
</div>
 </div>
<div class="col-6">
  <div class="form-group">
<label for="category_id"> Right_answer</label>
<input type="number" class="form-control" name='Right_answer'value="{{$question -> Right_answer}}" >
 </div> 
  </div>
 <div class='col-6'>
 <div class="form-group">
<label for="exampleInputEmail1">options_1</label>
<input type="text" class="form-control" name='option_1'value="{{$question -> option_1}}" >
</div>
</div>
 <div class='col-6'>
 <div class="form-group">
<label for="exampleInputEmail1">options_2</label>
<input type="text" class="form-control" name='option_2'value="{{$question ->option_2}}" >
</div>
</div>
 <div class='col-6'>
 <div class="form-group">
<label> options_3</label>
<input type="text" class="form-control" name='option_3' value="{{$question -> option_3}}" >
</div>
</div>
 <div class='col-6'>
 <div class="form-group">
<label>options_4</label>
<input type="text" class="form-control" name='option_4'value="{{$question -> option_4}}" >
</div>
</div>
</div>
<hr>


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