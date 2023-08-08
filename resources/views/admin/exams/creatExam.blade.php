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
            <h1 class="m-0 text-dark">exam</h1>
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
<form  action="{{url('dashboard/exams/store')}}" method="POST" enctype="multipart/form-data">
  @csrf
<div class="container">
<div class="row">
<div class='col-6'>
 <div class="form-group">
<label for="exampleInputEmail1">title</label>
<input type="text" class="form-control" name='name_en' id="exampleInputEmail1">
</div>
 </div>
  <div class="col-6">
  <div class="form-group">
<label for="exampleInputPassword1">Name(ar)</label>
<input type="text" class="form-control"name='name_ar' id="exampleInputPassword1">
</div>
  </div>
  <div class='col-6'>
 <div class="form-group">
<label for="desc_en">desc(en)</label>
<textarea name="desc_en" id="desc_en" class="form-control" cols="30" rows="10"></textarea>
</div>
 </div>
 <div class='col-6'>
 <div class="form-group">
<label for="desc_ar">desc(ar)</label>
<textarea name="desc_ar" id="desc_ar" class="form-control" cols="30" rows="10"></textarea>
</div>
 </div>
 <div class="col-6">
  <div class="form-group">
<label for="category_id"> Skill Name</label>
<select class="custom-select form-control-border border-width-2"name='skill_id' id="category_id">
@foreach($skills as $skill)
<option value="{{$skill->id}}">{{$skill->name('en')}}</option>
@endforeach
</select>
 </div> 
  </div>
  <div class="col-6">
  <div class="form-group">
<label for="exampleInputFile">image</label>
<div class="input-group">
<div class="custom-file">
<input type="file" name='img' class="custom-file-input" id="exampleInputFile">
<label class="custom-file-label" for="exampleInputFile">Choose file</label>
</div>
</div>
</div>
</div>
<div class="col-4">
  <div class="form-group">
<label for="Question_num">Question_num	</label>
<input type="text" class="form-control"name='Question_num' id="Question_num">
</div>
  </div>
  <div class="col-4">
  <div class="form-group">
<label for="difficulty">difficulty</label>
<input type="text" class="form-control"name='difficulty' id="difficulty">
</div>
  </div>
  <div class="col-4">
  <div class="form-group">
<label for="duration_mins">duration_mins</label>
<input type="text" class="form-control"name='duration_mins' id="">
</div>
  </div>
<div class="col-6">
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
          </div>
        </div>
      </div>
    </div>
</div>
@endsection